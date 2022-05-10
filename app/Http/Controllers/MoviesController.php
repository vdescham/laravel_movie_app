<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

use App\Models\Movie;



class MoviesController extends Controller
{

  function index($page=1){
      
        if(!isset($page) || $page<=0 || $page>5){
          $page=1;
        }
        return view('home', ['movies'=>$this->getData($page), 'page'=>$page]);
    }

    

    function getData($page) {
      $api_key = env("API_KEY", "");
      $redisResult = Cache::get('movieRequest_' . $page);
    
      if(isset($redisResult) && !is_null($redisResult)) {    
        //return view('home', ['movies'=>[]]);
        //$full = json_decode($redisResult, true);
        $movieRequest = $redisResult['results'];

        $table = [];
        foreach($movieRequest as $result){
            $movie = new Movie();
            $movie->id = $result['id'];
            $movie->title = $result['title'];
            $movie->img = $result['backdrop_path'];
            $movie->vote_count = $result['vote_count'];
            $table[] = $movie;
        }

      //printf('REDIS FETCH !!!!!');
        return $table;
       
      }else {

      //printf('REDIS NOT FETCH !!!!!');
        $response = Http::get("https://api.themoviedb.org/4/discover/movie?sort_by=vote_count.desc&page=".$page."&api_key=".$api_key);
        $full = json_decode($response, true);
        $movieRequest = $full['results'];

        $table = [];
        foreach($movieRequest as $result){
            $movie = new Movie();
            $movie->id = $result['id'];
            $movie->title = $result['title'];
            $movie->vote_count = $result['vote_count'];
            $table[] = $movie;
        }

        Cache::put('movieRequest_' . $page, $full, 600);
    
        return $table;
          
      }
    }

    
    public function show($id){
        $api_key = env("API_KEY", "");
        $response = Http::get("https://api.themoviedb.org/3/movie/".$id."?api_key=".$api_key);
        $result = json_decode($response, true);
        $movie = new Movie();
        $movie->external_id = $result['id'];
        $movie->title = $result['original_title'];
        $movie->year = substr($result['release_date'], 0,4);   
        $movie->img = $result['poster_path'];  
        $movie->description = $result['overview'];  
        $movie->vote_count = $result['vote_count'];

  
      return view('movies/show', ['movie'=>$movie]);

    }
    
}

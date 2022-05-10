<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($user){
        $user = User::findOrFail($user);

        return view('profiles.index', [
            'user' => $user,
        ]);
    }
}    

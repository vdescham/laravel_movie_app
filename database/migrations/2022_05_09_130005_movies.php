<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {          
            $table->id();
            $table->string('external_id')->unique();
            $table->string('genre_ids');
            $table->string('adult');
            $table->string('backdrop_path');
            $table->string('original_language');
            $table->string('original_title');
            $table->string('overview');
            $table->string('popularity');
            $table->string('poster_path');
            $table->string('release_date');
            $table->string('title');
            $table->string('video');
            $table->string('vote_average');
            $table->string('vote_count');
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();

            /*
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            */  
            
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};

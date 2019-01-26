<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social', function (Blueprint $table) {
            $table->increments('social_id');
            $table->string('facebook') ;
            $table->string('instagram') ;
            $table->string('youtube') ;
            $table->string('twitter') ;
            $table->string('google_plus') ;
            $table->string('linkedIn')->nullable() ;
            $table->string('Pinterest')->nullable() ;
            $table->string('skype')->nullable() ; 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social');
    }
}

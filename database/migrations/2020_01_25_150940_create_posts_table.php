<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content_txt');
            $table->string('content_file');
            $table->string('data');
            $table->boolean('attachment');
            $table->unsignedBigInteger('user_id')->nullable(); /* foreign key - relação one to many*/
            $table->timestamps();
        });


        //Foreign key - relação one to many
        Schema::table('posts', function (Blueprint $table) { 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

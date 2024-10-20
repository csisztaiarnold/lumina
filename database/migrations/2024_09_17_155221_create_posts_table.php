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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parent_id');
            $table->string('title');
            $table->string('title_slug');
            $table->string('subtitle');
            $table->string('introduction');
            $table->string('content');
            $table->boolean('is_home');
            $table->boolean('is_feed');
            $table->boolean('is_feed_item');
            $table->integer('subs_paginated_by');
            $table->boolean('is_published');
            $table->dateTime('published_at');
            $table->timestamps();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('category_id');
            $table->string('slug');
            $table->longText('short_description');
            $table->longText('description');
            $table->integer('price');
            $table->enum('status', ['free', 'paid', 'free for subscribers']);
            $table->string('course_length');
            $table->string('introduction_video');
            $table->string('cover_image');
            $table->enum('feature', ['yes', 'no'])->default('no');
            $table->longText('meta_title');
            $table->longText('meta_description');
            $table->longText('meta_keywords');
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
        Schema::dropIfExists('courses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cover_picture');
            $table->string('who_i_am_picture');
            $table->longText('who_i_am');
            $table->string('qualification_one');
            $table->string('qualification_two')->nullable();
            $table->string('qualification_three')->nullable();
            $table->string('qualification_four')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('coach_infos');
    }
}

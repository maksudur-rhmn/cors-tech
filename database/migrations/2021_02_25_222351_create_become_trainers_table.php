<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBecomeTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('become_trainers', function (Blueprint $table) {
            $table->id();
            $table->string('banner_desc');
            $table->longText('trainer_desc');
            $table->string('benefits_one');
            $table->string('benefits_two');
            $table->string('benefits_three');
            $table->longText('team_helps');
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
        Schema::dropIfExists('become_trainers');
    }
}

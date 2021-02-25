<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('banner_desc');
            $table->longText('our_goal_desc');
            $table->string('just_start_one');
            $table->string('just_start_two');
            $table->string('just_start_three');
            $table->string('benefits_one');
            $table->string('benefits_two');
            $table->string('benefits_three');
            $table->longText('why_cors');
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
        Schema::dropIfExists('abouts');
    }
}

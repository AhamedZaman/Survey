<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pivots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_zone', function (Blueprint $table) {
           $table->unsignedBigInteger('zone_id');
           $table->unsignedBigInteger('survey_id');

           $table->foreign('zone_id')->references('id')->on('zones')->onUpdate('cascade')->onDelete('cascade');
           $table->foreign('survey_id')->references('id')->on('surveys')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('take_survey', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('type');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('survey_id');
            $table->unsignedBigInteger('address_id');
            $table->string('comment')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('survey_id')->references('id')->on('surveys')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('answer_question', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id');

            $table->foreign('question_id')->references('id')->on('questions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('answer_question_survey', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_question_id');
            $table->unsignedBigInteger('take_survey_id');

            $table->foreign('answer_question_id')->references('id')->on('answer_question')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('take_survey_id')->references('id')->on('take_survey')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('category_survey', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('survey_id')->references('id')->on('surveys')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_zone');
        Schema::dropIfExists('take_survey');
        Schema::dropIfExists('answer_question');
        Schema::dropIfExists('answer_question_survey');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function(Blueprint $table) {
          $table->increments('id');
          $table->text('world');
          $table->string('question1');
          $table->tinyInteger('right_answer1');
          $table->text('exp_classic');
          $table->text('exp_dialog');
          $table->string('question2');
          $table->tinyInteger('right_answer2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}

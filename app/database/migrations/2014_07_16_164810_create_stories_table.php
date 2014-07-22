<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('stories', function($table){
            $table->increments('id');
            $table->integer('pivotal_id');
            $table->string('description');
            $table->integer('time')->nullable();
            $table->string('url');
            $table->enum('status', array('DEFAULT','START','PAUSE','CLOSE'))->default('DEFAULT');
            $table->integer('change')->nullable();
            $table->string('current_state')->nullable();
            $table->string('type');
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('stories');
	}

}

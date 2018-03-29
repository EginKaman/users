<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Visitors extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitors', function (Blueprint $table) {
			$table->unsignedInteger('id');
			$table->unsignedInteger('guest_id');
			$table->timestamp('visited_at');
			$table->index(['id', 'guest_id']);
			$table->foreign('id')
				->references('id')->on('users')
				->onDelete('cascade');
			$table->foreign('guest_id')
				->references('id')->on('users')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('visitors');
	}
}

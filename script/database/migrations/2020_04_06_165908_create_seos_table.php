<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('seos', function (Blueprint $table) {
			$table->id();
			$table->text('meta_title')->nullable();
			$table->text('author')->nullable();
			$table->text('meta_tags')->nullable();
			$table->text('meta_description')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('seos');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('plant_stage', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('plant_id');
			$table->unsignedBigInteger('stage_id');
			$table->text('spacing');
			$table->text('duration');
			$table->text('lighting');
			$table->text('watering');
			$table->text('fertilizing');
			$table->timestamps();

			// Foreign key constraints
			$table->foreignId('plant_id')->on('plants')->onDelete('cascade');
			$table->foreignId('stage_id')->on('stages')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('plant_stage');
	}
};

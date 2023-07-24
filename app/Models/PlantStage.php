<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlantStage extends Model
{
	use HasFactory;

	protected $fillable = [
		'spacing',
		'duration',
		'lighting',
		'watering',
		'fertilizing',
	];

	public function plant(): BelongsTo
	{
		return $this->belongsTo(Plant::class);
	}

	public function stage(): BelongsTo
	{
		return $this->belongsTo(Stage::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plant extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'variety',
		'date_planted',
		'days_to_mature',
		'quantity',
		'file_input',
		'harvest_date',
	];

	protected $casts = [
		'date_planted' => 'date',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function stages(): HasMany
	{
		return $this->hasMany(PlantStage::class);
	}
}

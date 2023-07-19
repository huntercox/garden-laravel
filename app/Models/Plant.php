<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
		'stages',
		'harvest_date',
	];

	protected $casts = [
		'date_planted' => 'date',
		'stages' => 'array'
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}

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
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}

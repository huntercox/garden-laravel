<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stage extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function plants()
	{
		return $this->belongsToMany(Plant::class, 'plant_stage')
			->withPivot('spacing', 'duration', 'lighting', 'watering', 'fertilizing')
			->withTimestamps();
	}
}

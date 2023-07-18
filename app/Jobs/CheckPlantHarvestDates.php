<?php

namespace App\Jobs;

use App\Mail\PlantReadyForHarvest;
use App\Models\Plant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckPlantHarvestDates implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * Create a new job instance.
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Execute the job.
	 */
	public function handle(Plant $plant): void
	{
		$today = Carbon::today('America/Vancouver');

		Plant::with('user')->whereDate('harvest_date', '<=', $today)->get()->each(function ($plant) {
			if ($plant->user) {
				Mail::to($plant->user->email)->send(new PlantReadyForHarvest($plant));
			}
		});
	}
}

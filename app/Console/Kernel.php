<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlantReadyForHarvest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use App\Models\Plant;

class Kernel extends ConsoleKernel
{
	/**
	 * Define the application's command schedule.
	 */
	protected function schedule(Schedule $schedule): void
	{
		$schedule->call(function () {

			Plant::with('user')->get()->each(function (Plant $plant) {

				if ($plant->date_planted->addDays($plant->days_to_mature)->isToday()) {
					Mail::to($plant->user->email)->send(new PlantReadyForHarvest($plant));
				}
			});
		})->daily();
	}

	/**
	 * Register the commands for the application.
	 */
	protected function commands(): void
	{
		$this->load(__DIR__ . '/Commands');

		require base_path('routes/console.php');
	}
}

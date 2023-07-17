<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlantReadyForHarvest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{
	/**
	 * Define the application's command schedule.
	 */
	protected function schedule(Schedule $schedule): void
	{
		$schedule->call(function () {

			// Get all plants
			$plants = DB::select('select * from plants');

			$dates = [];

			foreach ($plants as $plant) {
				$date_planted 	= Carbon::createFromDate($plant->date_planted);
				$number_of_days = $plant->days_to_mature;
				$harvest_date 	= $date_planted->addDays($number_of_days);
				$harvest_date 	= Carbon::parse($harvest_date);

				$data = array(
					'user' => $plant->user_id,
					'harvest_date' => $harvest_date
				);

				$dates[] = $data;
			}

			foreach ($dates as $date) {
				$harvest_date = $date['harvest_date']['date'];

				if ($harvest_date->isToday()) {
					$user_id = $date['user'];
					$user_email = DB::select(`select * from users where id = $user_id`);

					Mail::to($user_email)->send(new PlantReadyForHarvest());
				} else {

					$something = $date;
				}
			}
		})->everyMinute();
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

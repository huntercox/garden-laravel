<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Mail\PlantReadyForHarvest;
use App\Jobs\CheckPlantHarvestDates;
use App\Models\Plant;

class Kernel extends ConsoleKernel
{
	/**
	 * Define the application's command schedule.
	 */
	protected function schedule(Schedule $schedule): void
	{
		$schedule->job(new CheckPlantHarvestDates)->everyThirtySeconds();
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

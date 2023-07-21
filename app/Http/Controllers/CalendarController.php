<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Inertia\Inertia;
use Inertia\Response;

class CalendarController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Calendar', [
			'plants' => Plant::with('user:id,name')->latest()->get(),
		]);
	}
}

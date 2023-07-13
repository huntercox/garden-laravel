<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PlantController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): Response
	{
		return Inertia::render('Plants/Index', [
			//
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Plant $plant)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Plant $plant)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Plant $plant)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Plant $plant)
	{
		//
	}
}

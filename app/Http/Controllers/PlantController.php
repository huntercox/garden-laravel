<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\RedirectResponse;
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
			'plants' => Plant::with('user:id,name')->latest()->get(),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return Inertia::render('Plants/Create', [
			//
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'name' => 'required|string|max:40',
		]);

		$request->user()->plants()->create($validated);

		return redirect(route('plants.index'));
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
	public function update(Request $request, Plant $plant): RedirectResponse
	{
		$this->authorize('update', $plant);

		$validated = $request->validate([
			'name' => 'required|string|max:40',
		]);

		$plant->update($validated);

		return redirect(route('plants.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Plant $plant)
	{
		//
	}
}

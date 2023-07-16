<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Storage;

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
			'variety' => 'string|max:80',
			'date_planted' => 'required|date',
			'days_to_mature' => 'required|integer|max_digits:3',
			'quantity' => 'required|integer|max_digits:2',
			'file_input' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$path = $request->file_input->store('', 'public_images');
		$validated['file_input'] = $path;
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

		// dd($request->file_input);

		$validated = $request->validate([
			'name' => 'required|string|max:40',
			'variety' => 'required|string|max:80',
			'date_planted' => 'required|date',
			'days_to_mature' => 'required|integer|max_digits:3',
			'quantity' => 'required|integer|max_digits:2',
			'file_input' => 'image|mimes:jpeg,png,jpg,gif,svg',
		]);

		// Storage::disk('public_images')->delete($plant->file_input);
		$path = $request->file_input->store('', 'public_images');
		$validated['file_input'] = $path;

		$plant->update($validated);

		return redirect(route('plants.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Plant $plant): RedirectResponse
	{
		$this->authorize('delete', $plant);

		$plant->delete();

		return redirect(route('plants.index'));
	}
}

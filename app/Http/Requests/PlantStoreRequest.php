<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlantStoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:40'],
			'variety' => ['string', 'max:80'],
			'date_planted' => ['required', 'date'],
			'days_to_mature' => ['required', 'integer', 'max_digits:3'],
			'quantity' => ['required', 'integer', 'max_digits:2'],
			'file_input' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
			'stages' => ['array']
		];
	}

	/**
	 * Custom message for validation
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.required' => 'The field "name" is required.',
			'name.string' => 'The name must be a string.',
			'name.max' => 'The name must not be longer than 40 characters.',
			'variety.string' => 'The variety must be a string.',
			'variety.max' => 'The variety must not be longer than 80 characters.',
			'date_planted.required' => 'The field "date_planted" is required.',
			'date_planted.date' => 'The planted date must be a valid date.',
			'days_to_mature.required' => 'The field "days_to_mature" is required.',
			'days_to_mature.integer' => 'The days to maturity must be a number.',
			'days_to_mature.max_digits' => 'The days to maturity must not exceed 3 digits.',
			'quantity.required' => 'The field "quantity" is required.',
			'quantity.integer' => 'The quantity must be a number.',
			'quantity.max_digits' => 'The quantity must not exceed 2 digits.',
			'file_input.required' => 'The field "file_input" is required.',
			'file_input.image' => 'The image must be a valid image with one of the follow extensions JPEG, JPG, PNG, GIF or SVG.',
			'file_input.mimes' => 'The image must be a valid image with one of the follow extensions JPEG, JPG, PNG, GIF or SVG.',
			'file_input.max' => 'The file must not be larger than 2048MB.',
			'stages.array' => 'The field "stageName" is invalid.',
		];
	}
}

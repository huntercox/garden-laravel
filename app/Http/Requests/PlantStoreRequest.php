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
			'name' => 'required|string|max:40',
			'variety' => 'string|max:80',
			'date_planted' => 'required|date',
			'days_to_mature' => 'required|integer|max_digits:3',
			'quantity' => 'required|integer|max_digits:2',
			'file_input' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
			'name' => 'The field "name" is empty or it may be invalid.',
			'variety' => 'The field "variety" is invalid..',
			'date_planted' => 'The field "date_planted" is empty or it may be invalid.',
			'days_to_mature' => 'The field "days_to_mature" is empty or it may be invalid.',
			'quantity' => 'The field "quantity" is empty or it may be invalid.',
			'file_input' => 'The field "file_input" is empty or it may be invalid.',
		];
	}
}

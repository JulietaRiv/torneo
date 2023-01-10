<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayersRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'            => 'required',
			'sex'             => 'required',
			'ability'         => 'required|numeric|min:0|max:100',
			'luck'            => 'required|numeric|min:0|max:100',
			'velocity'        => 'sometimes|exclude_unless:sex,male|required|numeric|min:0|max:100',
			'streng'          => 'sometimes|exclude_unless:sex,male|required|numeric|min:0|max:100',
			'reaction_time'   => 'sometimes|exclude_unless:sex,female|required|numeric|min:0|max:100',
		];
	}
}

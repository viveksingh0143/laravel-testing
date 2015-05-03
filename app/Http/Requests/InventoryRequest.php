<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class InventoryRequest extends Request {

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
        $inventory = $this->route('inventories');
        $inventory_id = isset($inventory)? $inventory->id : NULL;
        return [
            'registration' => 'required|min:3',
            'brand'        => 'required|min:3',
            'model'        => 'required|min:3',
            'variant'      => 'sometimes|min:3',
        ];
	}
}

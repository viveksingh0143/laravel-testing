<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class BrandRequest extends Request {

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
        $brand = $this->route('brands');
        $brand_id = isset($brand)? $brand->id : NULL;
        return [
            'name'                  => 'required|min:3',
            'slug'                  => 'required|unique:brands,slug,'.$brand_id,
            'status'                => 'required',
            /*'logo'                  => 'sometimes|image',*/
        ];
	}
}

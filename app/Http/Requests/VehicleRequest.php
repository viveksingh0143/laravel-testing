<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class VehicleRequest extends Request {

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
        $variant = $this->get('variant');
        $brand_id = $this->get('brand_id');
        $vehicle = $this->route('vehicles');
        $vehicle_id = isset($vehicle)? $vehicle->id : NULL;
        return [
            'model'         => "required|unique:vehicles,model,$vehicle_id,id,brand_id,$brand_id,variant,$variant",
            'brand_id'      => 'required|exists:brands,id',
        ];
    }
}

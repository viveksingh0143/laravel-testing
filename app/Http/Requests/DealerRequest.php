<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DealerRequest extends Request {

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
        $dealer = $this->route('dealers');
        $dealer_id = isset($dealer)? $dealer->id : NULL;
        $create_rule = [];
        $user_id = $this->get('user_id');
        if(empty($dealer_id)) {
            $create_rule['email'] = 'required|email|unique:users,email|unique:dealers,email,'.$dealer_id;
        } else {
            $create_rule['email'] = 'required|email|unique:dealers,email,'.$dealer_id;
        }
        return array_merge($create_rule, [
            'slug'                  => 'required|unique:dealers,slug,'.$dealer_id,
            'name'                  => 'required|min:6',
            'contact_person'        => 'required|min:4',
            'state'                 => 'sometimes|min:4',
            'city'                  => 'sometimes|min:4',
            'location'              => 'sometimes|min:4',
            'website'               => 'sometimes|url',
        ]);
	}
}

<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PageRequest extends Request {

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
        $page = $this->route('pages');
        $page_id = isset($page)? $page->id : NULL;
        return [
			'title'        => 'required',
            'slug'         => 'required|unique:pages,slug,'.$page_id,
			/*'thumbnail'    => 'sometimes|image',*/
		];
	}

}

<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request {

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
        $post = $this->route('posts');
        $post_id = isset($post)? $post->id : NULL;
		return [
			'title'        => 'required',
			'status'       => 'required',
            'slug'         => 'required|unique:posts,slug,'.$post_id,
			/*'thumbnail'    => 'sometimes|image',*/
		];
	}

}

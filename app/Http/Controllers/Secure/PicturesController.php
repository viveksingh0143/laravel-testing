<?php namespace App\Http\Controllers\Secure;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PicturesController extends Controller {
	public function destroy($page_id, Request $request)
	{
		$page = Picture::findOrFail($page_id);
		$filePath = 'uploads/'.$page->path;
		File::delete($filePath);
		$page->delete();
        flash()->success("Page has been destroyed successfully");
		return redirect()->back();
	}
}

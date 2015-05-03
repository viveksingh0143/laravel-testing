<?php

namespace App\Repositories\Eloquent;

use App\Page;
use App\Repositories\BaseRepository;
use App\Repositories\PageRepository;
use App\Repositories\PostRepository;
use Validator;

class EloquentPageRepository extends BaseRepository implements PageRepository {

    protected $model;

    function __construct(Page $model) {
        $this->model = $model;
    }

    public function attachThumbnail($page, $thumbnail) {
        if (isset($thumbnail) && $thumbnail->isValid()) {
            $basePath = 'uploads/';
            $destinationPath = 'posts'; // upload path
            $extension = $thumbnail->getClientOriginalExtension(); // getting image extension
            $fileName = 'post-thumbnail-' . str_pad($page->id, 10, '0', STR_PAD_LEFT) . '.' . $extension; // renameing image
            $thumbnail->move($basePath . $destinationPath, $fileName); // uploading file to given path

            $page->thumbnail = "$destinationPath/$fileName";
            $page->save();
        }
        return $page;
    }
}
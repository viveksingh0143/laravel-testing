<?php

namespace App\Repositories\Eloquent;

use App\Post;
use App\Repositories\BaseRepository;
use App\Repositories\PostRepository;
use Validator;

class EloquentPostRepository extends BaseRepository implements PostRepository {

    protected $model;

    function __construct(Post $model) {
        $this->model = $model;
    }

    public function attachThumbnail($post, $thumbnail) {
        if (isset($thumbnail) && $thumbnail->isValid()) {
            $basePath = 'uploads/';
            $destinationPath = 'posts'; // upload path
            $extension = $thumbnail->getClientOriginalExtension(); // getting image extension
            $fileName = 'post-thumbnail-' . str_pad($post->id, 10, '0', STR_PAD_LEFT) . '.' . $extension; // renameing image
            $thumbnail->move($basePath . $destinationPath, $fileName); // uploading file to given path

            $post->thumbnail = "$destinationPath/$fileName";
            $post->save();
        }
        return $post;
    }
}
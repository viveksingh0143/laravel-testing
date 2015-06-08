<?php

namespace App\Repositories\Eloquent;

use App\AppKey;
use App\Repositories\AppKeyRepository;
use App\Repositories\BaseRepository;
use Validator;

class EloquentAppKeyRepository extends BaseRepository implements AppKeyRepository {

    protected $model;

    /**
     * @param AppKey $model
     */
    function __construct(AppKey $model) {
        $this->model = $model;
    }
}
<?php

namespace App\Repositories\Eloquent;

use App\Lead;
use App\Repositories\BaseRepository;
use App\Repositories\LeadRepository;
use Validator;

class EloquentLeadRepository extends BaseRepository implements LeadRepository {

    protected $model;

    function __construct(Lead $model) {
        $this->model = $model;
    }

    public function create($columns, $user = null)
    {
        if(isset($columns['user_id'])) {
            unset($columns['user_id']);
        }
        if(isset($user)) {
            $columns['user_id'] = $user->id;
        }
        return parent::create($columns);
    }

    public function regexSearch($columns, $size, $sorts = null) {
        $model_search = $this->model->regexSearch($columns);
        $model_search->latest();
        if(isset($sorts)) {
            foreach ($sorts as $key => $value) {
                $model_search->orderBy($key, empty($value) ? 'asc' : $value);
            }
        }

        return $model_search->paginate($size);
    }
}
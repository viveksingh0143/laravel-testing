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
}
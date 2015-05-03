<?php

namespace App\Repositories;

use App\User;
use Validator;

abstract class BaseRepository {
    /**
     * Get all the user by searching having regex for string.
     *
     * * @return array(User)
     */
    public function regexSearch($columns, $size, $sorts = null) {
        $model_search = $this->model->regexSearch($columns);
        if(isset($sorts)) {
            foreach ($sorts as $key => $value) {
                $model_search->orderBy($key, empty($value) ? 'asc' : $value);
            }
        }
        return $model_search->paginate($size);
    }

    /**
     * Get all the user by searching columns.
     *
     * * @return array(User)
     */
    public function search($columns, $size) {
        return $this->model->search($columns)->paginate($size);
    }

    /**
     * Get all the user by searching columns.
     *
     * * @return array(User)
     */
    public function destroy($ids) {
        if(isset($ids)) {
            return $this->model->destroy($ids);
        } else {
            return true;
        }
    }

    /**
     * Create resource from the columns.
     *
     * @param array ($columns)
     * @return array(Resource)
     */
    public function create($columns)
    {
        return $this->model->create($columns);
    }

    /**
     * Update resource from the columns.
     *
     * @param $resource
     * @param array ($columns)
     * @return array(Resource)
     */
    public function update($resource, $columns)
    {
        $resource->update($columns);
        return $resource;
    }

    /**
     * Find resource by id
     *
     * @return mixed
     */
    public function find($id, $fail = false)
    {
        if($fail) {
            return $this->model->findOrFail($id);
        } else {
            return $this->model->find($id);
        }
    }

    /**
     * Find list
     * @param $value
     * @param $key
     * @return
     */
    public function lists($value, $key, $columns = null) {
        $model_list = $this->model;
        if(isset($columns)) {
            $model_list = $this->model->search($columns);
        }
        return $model_list->lists($value, $key);
    }

    /**
     * Find by slug
     * @param $slug
     * @return
     */
    public function findBySlug($slug) {
        return $this->model->where('slug', $slug)->first();
    }
}
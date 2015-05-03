<?php

namespace App\Repositories;


trait CommonModelMethods {
    /**
     * Get only active resources
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        $query->where($this->table . '.status', '=', 'ACTIVE');
        return $query;
    }

    /**
     *  Get only inactive resources
     *
     * @param $query
     * @return mixed
     */
    public function scopeInactive($query)
    {
        $query->where($this->table . '.status', '=', 'IN-ACTIVE');
        return $query;
    }
    //'status', ['ACTIVE','IN-ACTIVE','PENDING-APPROVAL'

    /**
     * Get all the resources, whose in scope of given columns with their given value
     *
     * @param $query
     * @param $columns
     * @return mixed
     */
    public function scopeRegexSearch($query, $columns)
    {
        if(isset($columns) && is_array($columns)) {
            $columns = array_filter($columns);
        }

        $ignore_regex = array();
        $searchable = array();
        $boolean_keys = array();
        $integer_keys = array();
        if(isset($this->ignore_regex)) {
            $ignore_regex = $this->ignore_regex;
        }
        if(isset($this->fillable)) {
            $searchable = $this->fillable;
        }
        if(isset($this->searchable)) {
            $searchable = array_merge($searchable, $this->searchable);
        }
        if(isset($this->ignore_search)) {
            $searchable = array_diff($searchable, $this->ignore_search);
        }
        $columns = array_intersect_key($columns, array_flip($searchable));
        if(isset($this->casts)) {
            $boolean_keys = array_keys($this->casts, "boolean");
            $integer_keys = array_keys($this->casts, "integer");
            $integer_keys = array_merge($integer_keys, array_keys($this->casts, "float"));
        }
        if(isset($this->relation_searchable)) {
            $relations = array_keys(array_flip(array_intersect_key($this->relation_searchable, $columns)));
            if(!empty($relations)) {
                $query->select($this->table . '.*');
                foreach($relations as $relation) {
                    $query->join($relation, $this->table . '.vehicle_id', '=', "$relation.id");
                }
            }
        }
        if (isset($columns)) {
            if(is_array($columns)) {
                foreach($columns as $key => $values) {
                    $key_name = $this->table . ".$key";
                    if(isset($this->relation_searchable) && array_key_exists($key, $this->relation_searchable)) {
                        $key_name = $this->relation_searchable[$key] . ".$key";
                    }
                    if(is_array($values)) {
                        if(count($values) > 0) {
                            $query->where(function($query) use ($key, $key_name, $values, $integer_keys, $boolean_keys, $ignore_regex){
                                foreach($values as $value) {
                                    if (in_array($key, $boolean_keys)) {
                                        $value = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                                        $query->orWhere($key_name, '=', $value);
                                    } else if(in_array($key, $integer_keys)){
                                        $query->orWhere($key_name, '=', $value);
                                    } else {
                                        if(in_array($key, $ignore_regex)) {
                                            $query->orWhere($key_name, '=', $value);
                                        } else {
                                            $query->orWhere($key_name, 'LIKE', "%$value%");
                                        }
                                    }
                                }
                            });
                        }
                    } else if($values != '' && in_array($key, $boolean_keys)){
                        $values = filter_var($values, FILTER_VALIDATE_BOOLEAN);
                        $query->where($key_name, '=', $values);
                    } else if($values != '' && in_array($key, $integer_keys)) {
                        $query->where($key_name, '=', $values);
                    } else if($values != ''){
                        if(in_array($key, $ignore_regex)) {
                            $query->where($key_name, '=', $values);
                        } else {
                            $query->where($key_name, 'LIKE', "%$values%");
                        }
                    }
                }
            }
        }
        return $query;
    }

    /**
     * Get all the pages, whose in scope of given columns with their given value
     *
     * @param $query
     * @param $columns
     * @return mixed
     */
    public function scopeSearch($query, $columns)
    {
        $searchable = array();
        if(isset($this->fillable)) {
            $searchable = $this->fillable;
        }
        if(isset($this->searchable)) {
            $searchable = array_merge($searchable, $this->searchable);
        }
        if(isset($this->ignore_search)) {
            $searchable = array_diff($searchable, $this->ignore_search);
        }
        $columns = array_intersect_key($columns, array_flip($searchable));
        if(isset($this->relation_searchable)) {
            $relations = array_keys(array_flip(array_intersect_key($this->relation_searchable, $columns)));
            if(!empty($relations)) {
                $query->select($this->table . '.*');
                foreach($relations as $relation) {
                    $query->join($relation, $this->table . '.vehicle_id', '=', "$relation.id");
                }
            }
        }
        if (isset($columns)) {
            if(is_array($columns)) {
                foreach($columns as $key => $values) {
                    $key_name = $this->table . ".$key";
                    if(isset($this->relation_searchable) && array_key_exists($key, $this->relation_searchable)) {
                        $key_name = $this->relation_searchable[$key] . ".$key";
                    }
                    if(is_array($values)) {
                        if(count($values) > 0) {
                            $query->where(function($query) use ($key, $key_name, $values){
                                foreach($values as $value) {
                                    $query->orWhere($key_name, '=', $value);
                                }
                            });
                        }
                    } else if($values != ''){
                        $query->where($key_name, '=', $values);
                    }
                }
            }
        }
        return $query;
    }
} 
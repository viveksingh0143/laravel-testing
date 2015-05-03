<?php namespace App;

use App\Repositories\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

    use CommonModelMethods;

    protected $searchable = array('id', 'status');
    protected $ignore_regex = array('id', 'status');

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'brands';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug','name','description','status'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = array();

}

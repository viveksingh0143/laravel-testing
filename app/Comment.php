<?php namespace App;

use App\Repositories\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    use CommonModelMethods;
    protected $fillable = ['name', 'body'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = array();

    public function commentable()
    {
        return $this->morphTo();
    }
}
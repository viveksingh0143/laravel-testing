<?php namespace App;

use App\Repositories\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    use CommonModelMethods;

    protected $searchable = array('id', 'status');
    protected $ignore_regex = array('id', 'status');

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug','title','excerpt','body','status'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = array();

    /**
     * Get the comments associated with the given page.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

}

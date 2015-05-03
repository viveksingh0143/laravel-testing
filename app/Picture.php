<?php namespace App;

use App\Repositories\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    use CommonModelMethods;
    protected $fillable = ['path','caption','description'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pictures';


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = array();

    public function picturable()
    {
        return $this->morphTo();
    }
}
<?php namespace App;

use App\Repositories\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;

class AppKey extends Model {

    use CommonModelMethods;

    protected $table = 'app_keys';

    protected $fillable = ['key'];

    /**
     * Get the dealer associated with the given used vehicle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dealer(){
        return $this->belongsTo(Dealer::class);
    }
}

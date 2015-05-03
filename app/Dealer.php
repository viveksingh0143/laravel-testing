<?php namespace App;

use App\Repositories\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model {
    use CommonModelMethods;

    protected $searchable = array('id');
    protected $ignore_regex = array('id', 'status');

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dealers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug','email','name','contact_person','about_us','country','state','city','location','address','pincode','website','mobile_number','office_number','status', 'user_id'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = array();

    /**
     * Get the comments associated with the given dealer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get the new vehicles associated with the given dealer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function newVehicles(){
        return $this->hasMany(NewVehicle::class);
    }

    /**
     * Get the used vehicles associated with the given dealer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usedVehicles(){
        return $this->hasMany(UsedVehicle::class);
    }

    /**
     * Get all the pictures associated with the dealer
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function pictures()
    {
        return $this->morphMany('App\Picture', 'picturable');
    }
}

<?php namespace App;

use App\Repositories\CommonModelMethods;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, CommonModelMethods;

    protected $searchable = array('id', 'status', 'role', 'confirmed');
    protected $ignore_search = array('password');
    protected $ignore_regex = array('id', 'status', 'role');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'role', 'status'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = array(
        'confirmed' => 'boolean'
    );

    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Get the dealers associated with the given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dealers()
    {
        return $this->hasMany(Dealer::class);
    }

    /**
     * Get the inventories associated with the given user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function getIsActiveAttribute()
    {
        return ($this->status == 'ACTIVE');
    }
}

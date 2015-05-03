<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepository;
use App\Repositories\UserRepository;
use App\User;
use Validator;

class EloquentUserRepository extends BaseRepository implements UserRepository {

    protected $model;

    function __construct(User $model) {
        $this->model = $model;
    }

    /**
     * Get a validator for an incoming web user registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function userValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Get a validator for an incoming dealer user registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function dealerValidator(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required|max:255',
            'contact_person' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new web user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function createUser(array $data, $confirmation = true)
    {
        $user = new $this->model;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        if($confirmation) {
            $user->confirmation_code = str_random(60);
            $user->role = 'WEB-USER';
        } else {
            $user->confirmed = true;
            $user->role = $data['role'];
        }
        $user->save();
        return $user;
    }

    /**
     * Create a new dealer user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function createDealer(array $data, $confirmation = true)
    {
        $user = new $this->model;
        $user->name = !empty($data['company_name'])? $data['company_name'] : $data['name'];
        $user->email = $data['email'];
        if($confirmation) {
            $user->password = bcrypt($data['password']);
            $user->confirmation_code = str_random(60);
            $user->status = 'PENDING-APPROVAL';
        } else {
            $user->password = bcrypt(str_random(8));
            $user->confirmed = true;
            $user->status = 'ACTIVE';
        }
        $user->role = 'DEALER';
        $user->save();
        return $user;
    }

    /**
     * Confirm user account after a valid user id and confirmation code.
     *
     * @param $user_id
     * @param $confirmation_code
     * @return User
     */
    public function confirmUserAccount($user_id, $confirmation_code)
    {
        $user = $this->model->where('id', $user_id)->where('confirmation_code', '=', $confirmation_code)->first();
        if(isset($user)) {
            $user->confirmed = true;
            $user->confirmation_code = null;
            $user->save();
        }
        return $user;
    }

    /**
     * Get dealer user list
     *
     * @return mixed
     */
    public function listDealers()
    {
        return $this->model->where('role', 'DEALER')->lists('name', 'id');
    }

    /**
     * Find user by email id
     *
     * @return mixed
     */
    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}
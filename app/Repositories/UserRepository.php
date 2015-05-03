<?php

namespace App\Repositories;


interface UserRepository
{
    /**
     * Get a validator for an incoming web user registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function userValidator(array $data);

    /**
     * Get a validator for an incoming dealer user registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function dealerValidator(array $data);

    /**
     * Create a new web user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function createUser(array $data, $confirmation = true);

    /**
     * Create a new dealer user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function createDealer(array $data, $confirmation = true);

    /**
     * Confirm user account after a valid user id and confirmation code.
     *
     * @param $user_id
     * @param $confirmation_code
     * @return User
     */
    public function confirmUserAccount($user_id, $confirmation_code);

    /**
     * Get all the user with pagination by searching having regex for string.
     *
     * *
     * @param $columns
     * @param $size
     * @return array(User)
     */
    public function regexSearch($columns, $size);

    /**
     * Get all the user with pagination by searching having columns.
     *
     * @param $columns
     * @param $size
     * @return array(User)
     */
    public function search($columns, $size);


    /**
     * Destroy all the user having provided ids.
     *
     * @param array($ids)
     * @return array(User)
     */
    public function destroy($ids);


    /**
     * Get dealer user list
     *
     * @return mixed
     */
    public function listDealers();

    /**
     * Get user by id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Get user by email id
     *
     * @return mixed
     */
    public function findByEmail($email);
}
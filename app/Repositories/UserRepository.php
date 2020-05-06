<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    protected $user;

    /**
     * User Repository construct
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return list of users
     */
    public function getUsers()
    {
        return $this->user->whereNotIn('id', [Auth::id()])->get();
    }

    /**
     * Update user record
     * @param array $attributes
     * @param integer $id
     * @return object
     */
    public function update(array $attributes, int $id) 
    {
        $object = $this->user->findOrFail($id);
        $object->name = $attributes['name'];
        $object->email = $attributes['email'];
        $object->role = $attributes['role'];
        $object->save();

        return $object;
    }

    /*
     * Destroy user by id
     * @param integer $id
     * @return integer $id
     */
    public function delete(int $id)
    {
        $obj = $this->user->findOrFail($id);
        $obj->delete();

        return $id;
    }
}
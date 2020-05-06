<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\User;
use Auth;

class UserService
{
    protected $userRepository;

    /**
     * User Service construct
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all users
     * @return list of users
     */
    public function getUsers()
    {
        return $this->userRepository->getUsers();
    }

    /**
     * @param array $data
     * @param integer $id
     */
    public function update(array $data, int $id)
    {
        return  $this->userRepository->update($data, $id);
    }

    /**
     * @param integer $id
     */
    public function destroy(int $id)
    {
        return $this->userRepository->destroy($id);
    }

}
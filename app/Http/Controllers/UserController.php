<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Services\UserService;
use App\User;

class UserController extends Controller
{
    protected $userService;

    /**
     * User Controller construct
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get all users in database
     */
    public function getUsers()
    {
        $users = $this->userService->getUsers();

        return json_encode($users);
    }

    /**
     * Upadte user record
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $user = $this->userService->update($params, $id);

        return json_encode($user);
    }

    /**
     * Delete user by id
     */
    public function destroy($id)
    {
        User::destroy($id);
        return json_encode($id);
    }
}

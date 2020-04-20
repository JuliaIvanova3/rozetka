<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Get all users in database
     */
    public function getUsers()
    {
        $users = User::whereNotIn('id', [Auth::id()])->get();
        return json_encode($users);
    }
}

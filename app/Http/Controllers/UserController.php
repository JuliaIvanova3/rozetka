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

    /**
     * Upadte user record
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

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

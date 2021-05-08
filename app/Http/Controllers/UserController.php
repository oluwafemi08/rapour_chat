<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');




        if ($this->checkIfUserExist($username)) {
            return response()->json(
                [
                    'message' => 'User already exists'
                ],
                500
            );
        } else {
            $password = bcrypt($password);
            User::create([
                'username' => $username,
                'password' => $password
            ]);
            return response()->json(true);
        }
    }

    private function checkIfUserExist($username)
    {
        $user = User::where('username', $username)->first();
        if ($user) {
            return $user;
        } else {
            return false;
        };
    }

    /*
    Authenticate the user within the application Now add the login()
    to handle the authentication of users within the application:
  */

    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $user =  $this->checkIfUserExist($username);


        if ($user) {
            $confirmPassword = Hash::check($password, $user->password);
            return response()->json([
                'status' => $confirmPassword,
                'token' => $user->authToken
            ]);
        } else {
            return response()->json([
                'message' => 'invalid credentials'
            ],       500);
        }
    }

    public function updateToken(Request $request)
    {
        $username = $request->get('uid');
        $token = $request->get('token');

        User::where('username', $username)->update([
            'authToken' => $token
        ]);
    }
}

<?php

require "App/Model/user.php";


class UserController
{
    // 
    public function index()
    {
        // 
    }

    public function readone($session_id)
    {
        $user = new User();
        $result = $user->user($session_id);
        return $result;
    }

    public function users()
    {
        $user = new User();
        $users = $user->readAll();
        return $users;
    }

    public function login($request)
    {
        $user = new User();

        $email = $request['email'];
        $password = $request["password"];

        $result = $user->login($email, $password);

        if ($result['status'] == 'success') {
            // process your session
            $_SESSION['id'] = $result['session_id'];
            return [
                'status' => 'success',
                'redirect' => 'ochu'
            ];
        } else {
            // error message.
            return ['message' => $result['message']];
        }
    }

    public function register($request)
    {
        $user = new User();

        $name = $request['username'];
        $email = $request['email'];
        $password = $request['password'];

        $result = $user->register($name, $email, $password);

        if ($result['status'] == 'success') {
            // just message and redirect url
            return [
                'status' => 'success',
                // 'message' => $result['message'],
                'redirect' => 'login' //callback url where to go after registration
            ];
        }
        
        // if ($result['status'] == 'warning') {
            // error message
            return ['message' => $result['message']];
        // }
    }

    public function delete($data)
    {
        $user = new User();

        $token = $data['token'];
        $response = $user->delete($token);

        if ($response['status'] == 'success') {
            return [
                'status' => 'success',
                'redirect' => 'logout'
            ];
        } 
    }
}

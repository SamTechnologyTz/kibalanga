<?php

require "App/Model/user.php";


class BossController
{
    // 
    public function index()
    {
        // 
    }

    public function user($session_id)
    {
        $user = new User();

        $result = $user->user($session_id);

        if ($result['status'] == 'fail') {
            return $result['message'];
        }

        // user info
        return $result;
        
    }

    public function users()
    {
        $user = new User();

        // $user = $user->paginate(10);
        $users = $user->readAll();

        // 
        return $users;

    }

    public function login($request)
    {
        $user = new User();

        $email = $request['username'];
        $password = $request["password"];

        $result = $user->login($email, $password);

        if ($result['status'] == 'success') {
            // process your session
            // session_start();
            // $_SESSION['id'] = $result['session_id'];
            // return $result['session_id'];
        } else {
            // error message.
            return $result['message'];
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
            // just message
            return $result['message'];
        } else {
            // error message
            return $result['message'];
        }
    }
}

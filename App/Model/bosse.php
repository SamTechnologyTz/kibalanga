<?php

require 'core/db.php';
require 'core/EshodSecurity.php';

use PDO;

class User 
{
    private $table;

    public function __construct() {
        $f = dirname(__FILE__);
        $p = strrpos($f, '.');
        $t = substr($f, 0, $p);
        $this->table = $t;
    }

    public function time() {
        return date('H:i:s');
    }

    public function user($user_id)
    {
        $sam = new Database();
        $kibalanga = $sam->connect();
        $Eshod = new Security();

        $session = $Eshod->guard($user_id);

        $sql = "SELECT * FROM `{$this->table}` WHERE id=:user_id";
        $stmt = $kibalanga->prepare($sql);
        $stmt->bindParam(":user_id", $session, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else {
            return ['status' => 'fail', 'message' => 'Invalid session id'];
        }
    }

    public function readAll() {
        $sam = new Database();
        $kibalanga = $sam->connect();

        $query = "SELECT * FROM ". $this->table;
        $stmt = $kibalanga->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function login($email, $password)
    {
        $conn = new Database();
        $sam = $conn->connect();

        $eshod = new Security();

        $_email = $eshod->guard($email);
        $_password = $eshod->guard($password);
        $time = $this->time();

        $query = "SELECT * FROM `{$this->table}` WHERE email=:email";
        $stmt = $sam->prepare($query);
        $stmt->bindParam(":email", $_email, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $mtu = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (password_verify($_password, $mtu['password'])) {
                $session = bin2hex(random_bytes(8));
                $query = "INSERT INTO `sessions` SET uid=:uid, session_id=:session_id, time=:time";
                $stmt = $sam->prepare($query);
                $stmt->bindParam(":uid", $mtu['uid']);
                $stmt->bindParam(":session_id", $session);
                $stmt->bindParam(":time", $time);

                if ($stmt->execute()) {
                    return [
                        'status' => 'success',
                        'session_id' => $session,
                    ];
                } else {
                    return [
                        'status' => 'fail',
                        'message' => 'error'.$stmt->execute()
                    ];
                }
                
            } else {
                return ['status' => 'warning', 'message' => "Incorrect password"];
            }
            
        } else {
            return ['status' => 'warning', 'message' => "Incorrect email"];
        }

    }

    public function register($name, $email, $password) {
        $sam = new Database();
        $kibalanga = $sam->connect();
        $eshod = new Security();

        $jina = $eshod->guard($name);
        $pepe = $eshod->guard($email);
        $pass = $eshod->guard($password);
        $msimbo = password_hash($pass, PASSWORD_DEFAULT);

        $query = "SELECT * FROM `{$this->table}` WHERE email=:email";
        $stmt = $kibalanga->prepare($query);
        $stmt->bindParam(":email", $pepe, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $query = "INSERT INTO ". $this->table . "SET name=:name, email=:email, password=:password, time=:time";
            $stmt = $kibalanga->prepare($query);
            $stmt->bindParam(":name", $jina, PDO::PARAM_STR);
            $stmt->bindParam(":email", $pepe, PDO::PARAM_STR);
            $stmt->bindParam(":password", $msimbo, PDO::PARAM_STR);
            $stmt->bindParam(":time", $time);

            if ($stmt->execute()) {
                return [
                    'status' => 'success',
                    'message' => 'Register success!'
                ];
            } else {
                return [
                    'status' => 'fail',
                    'message' => 'Error: ' .$stmt->execute(),
                ];
            }
        } else {
            return [
                'status' => 'warning',
                'message' => 'Email was Taken!',
            ];
        }
        
    }

    public function update($session_id, $name, $email) {
        $sam  = new Database();
        $kibalanga = $sam->connect();

        $eshod = new Security();
        $time  = $this->time();

        $jina = $eshod->guard($name);
        $pepe = $eshod->guard($email);
        
        $sql = "SELECT * FROM `{$this->table}`";

        $query = "UPDATE INTO ". $this->table . " SET name=:name, email=:email time=:time WHERE id=:id";
        $stmt = $kibalanga->prepare($query);
        $stmt->bindParam(":name", $jina, PDO::PARAM_STR);
        $stmt->bindParam(":email", $pepe, PDO::PARAM_STR);
        $stmt->bindParam(":time", $time);

        if ($stmt->execute()) {
            return [
                'status' => 'success',
                'message' => 'update successful',
            ];
        } else {
            return [
                'status' => 'fail',
                'message' => 'update fail',
            ];
        }
    }

    public function delete($session_id) {
        $sam = new Database();
        $kibalanga = $sam->connect();
        $eshod = new Security();

        $uid = $eshod->guard($session_id);

        $query = "SELECT * FROM `sessions` WHERE session_id=:session_id";
        $stmt = $kibalanga->prepare($query);
        $stmt->bindParam(":session_id", $session_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "DELETE FROM `{$this->table}` WHERE id=:id";
            $stmt = $kibalanga->prepare($sql);
            $stmt->bindParam(":id", $user['id'], PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return [
                    'status' => 'success',
                    'message' => 'Delete successful'
                ];
            } else {
                return [
                    'status' => 'fail',
                    'message' => 'Delete fail'
                ];
            }

        } else {
            return [
                'status' => 'fail',
                'message' => 'Invalid session id'
            ];
        }
    }

}
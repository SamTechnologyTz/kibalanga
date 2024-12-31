<?php
require 'core/EshodSecurity.php';

class User 
{
    private $table;

    public function __construct() {

        $f = dirname(__FILE__);
        $p = strrpos($f, '.');
        $t = substr($f, 0, $p);
        // 
        $this->table = "users";
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
        $queri = "SELECT * FROM `sessions` WHERE session_id=:se";
        $stmt = $kibalanga->prepare($queri);
        $stmt->bindParam(":se", $session,PDO::PARAM_INT);
        $stmt->execute();

        $rere = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT * FROM `{$this->table}` WHERE id=:ui";
        $stmt = $kibalanga->prepare($sql);
        $stmt->bindParam(":ui", $rere['uid'], PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function readAll() {
        $sam = new Database();
        $kibalanga = $sam->connect();

        $query = "SELECT * FROM {$this->table}";
        $stmt = $kibalanga->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function login($email, $password)
    {
        $conn = new Database();
        $sam = $conn->connect();

        $eshod = new Security();

        $email1 = $eshod->guard($email);
        $password1 = $eshod->guard($password);
        $time = $this->time();

        $query = "SELECT * FROM `{$this->table}` WHERE email=:email";
        $stmt = $sam->prepare($query);
        $stmt->bindParam(":email", $email1, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $mtu = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($mtu && password_verify($password1, $mtu['password'])) {
                $session = date('Dymhsi');
                $query = "INSERT INTO `sessions` (uid, session_id) VALUES (:uid, :session_id)";
                $stmt = $sam->prepare($query);
                $stmt->execute([":uid" => $mtu['id'], ":session_id" => $session]);

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

    //     $sql = 'CREATE TABLE IF NOT EXISTS users (
    //         `id` int(11) NOT NULL AUTO_INCREMENT,
    //         `username` VARCHAR(255) NOT NULL,
    //         `email` VARCHAR(255) NOT NULL,
    //         `password` VARCHAR(255) NOT NULL,
    //         `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    //         PRIMARY KEY (id)
    //    );';

    //    $sql = "CREATE TABLE IF NOT EXISTS users ( `id` int(11) NOT NULL AUTO_INCREMENT, `username` VARCHAR(255) NOT NULL, `email` VARCHAR(255) NOT NULL, `password` VARCHAR(255) NOT NULL, `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id) );";

    //    $kibalanga->exec($sql);

        $query = "SELECT * FROM `{$this->table}` WHERE email=:email";
        $stmt = $kibalanga->prepare($query);
        $stmt->bindParam(":email", $pepe, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // if($stmt->fetchColumn() !== 1) {
            //     return [
            //         'status' => 'warning',
            //         'message' => 'email was taken'
            //     ];
            // }

            $query = "INSERT INTO {$this->table} SET username=:name, email=:email, password=:password";
            $stmt = $kibalanga->prepare($query);
            $stmt->bindParam(":name", $jina, PDO::PARAM_STR);
            $stmt->bindParam(":email", $pepe, PDO::PARAM_STR);
            $stmt->bindParam(":password", $msimbo, PDO::PARAM_STR);

            if ($stmt->execute([':name' => $jina, ':email' => $pepe, ':password' => $msimbo])) {
                return [
                    'status' => 'success',
                    'message' => 'Register success!'
                ];
            } else {
                return [
                    'status' => 'fail',
                    'message' => 'Registration fail!',
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

        $query = "UPDATE INTO {$this->table} SET name=:name, email=:email time=:time WHERE id=:id";
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

        // $uid = $eshod->guard($session_id);

        $query = "SELECT * FROM `sessions` WHERE session_id=:session_id";
        $stmt = $kibalanga->prepare($query);
        $stmt->bindParam(":session_id", $session_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "DELETE FROM `{$this->table}` WHERE id=:id";
            $stmt = $kibalanga->prepare($sql);
            $stmt->bindParam(":id", $user['uid'], PDO::PARAM_INT);
            
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
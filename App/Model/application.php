<?php

require 'core/db.php';
require 'core/EshodSecurity.php';

use PDO;

class User 
{
    private $table; //= "users";

    public function __construct() {

        $f = dirname(__FILE__);
        $p = strrpos($f, '.');
        $t = substr($f, 0, $p);
        // 
        $this->table = $t;
    }

    public function time() {
        return date('H:i:s');
    }

    public function readOne($user_id)
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

    public function create($name, $description) {
        $sam = new Database();
        $kibalanga = $sam->connect();
        $eshod = new Security();

        $jina = $eshod->guard($name);
        $mada = $eshod->guard($description);

        $query = "INSERT INTO `{$this->table}` SET name=:name, description=:description, time=:time";
        $stmt = $kibalanga->prepare($query);
        $stmt->bindParam(":name", $jina, PDO::PARAM_STR);
        $stmt->bindParam(":email", $mada, PDO::PARAM_STR);
        $stmt->bindParam(":time", $time, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return [
                'status' => 'success',
                'message' => 'Sent Success!'
            ];
        } else {
            return [
                'status' => 'fail',
                'message' => 'Error: ' .$stmt->execute(),
            ];
        }        
    }

    public function update($name, $description) {
        $sam  = new Database();
        $kibalanga = $sam->connect();

        $eshod = new Security();
        $time  = $this->time();

        $jina = $eshod->guard($name);
        $mada = $eshod->guard($description);

        $query = "UPDATE INTO `{$this->table}` SET name=:name, description=:description time=:time WHERE id=:id";
        $stmt = $kibalanga->prepare($query);
        $stmt->bindParam(":name", $jina, PDO::PARAM_STR);
        $stmt->bindParam(":description", $mada, PDO::PARAM_STR);
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
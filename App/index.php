<?php

// require 'config/bd.php';
// require 'core/EshodSecurity.php';

// class {$name} 
// {
//     private $table;

//     public function __construct() {
//         $f = dirname(__DIR__);
//         $p = strrpos($f, '.');
//         $t = substr($f, 0, $p);

//         if (empty($t)) {
//             $t = {$name};
//         }

//         $this->table = $t;
//     }

//     public function readAll()
//     {
//         $sam = new Database();
//         $kibalanga = $sam->connect();
        
//         try {
//             $SQL = "SELECT * FROM `{$this->table}`";
//             $stmt = $kibalanga->prepare($SQL);
            
//             if ($stmt->execute()) {
//                 $jb = $stmt->fetchAll(PDO::FETCH_ASSOC);
//                 return $jb;
//             } else {
//                 return [
//                     'status' => 'fail',
//                     'message' => 'fail to get user data'
//                 ];
//             }

//         } catch (PDOException $e) {
//             return $e->getMessage();
//         }
//     }

//     public function create()
//     {}
// }
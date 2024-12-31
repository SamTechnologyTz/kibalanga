<?php
require 'core/bd.php';

class Auth 
{
    public function check()
    {
        $sam = new Database();
        $kibalanga = $sam->sqlite();

        $key = $_ENV['APP_KEY'];

        if (empty($key)) {
            return ["status" => "fail", "message" => "APP KEY not found!"];
        }

        try {
            $sql = "SELECT * FROM `jobs` WHERE app_key=:tempsession";
            $stmt = $kibalanga->prepare($sql);
            if ($stmt->execute([':tempsession' => $key])) {
                $app = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($app['tempsession'] !== $key) {
                    return ['status' => 'fail', 'message' => 'Invalid APP_KEY Renstall cmd run: php sam run:installer'];
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
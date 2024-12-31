<?php
// $response =  $action->$function($_SESSION['id']);

// echo $response['username'];

// $sam = new Database();
// $kibalanga = $sam->sqlite();

// $sql = 'SELECT * FROM `jobs` WHERE app_key=:app';
// $stmt = $kibalanga->prepare($sql);
// $stmt->bindParam(':app', $_ENV['APP_KEY'], PDO::PARAM_INT);
// $stmt->execute();

// $s = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo $s['app_key'];
echo $_SESSION['id'];
?>
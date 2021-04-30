<?php
header("Access-Control-Allow-Origin:http://localhost:8000");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, OPTIONS");
session_start();

if(isset($_POST)) {
    require_once './Model/DB.php';
    if(!isset($_POST['email']) || !isset($_POST['password'])) {
      //Missing parameter, sending Bad request error code
        http_response_code(400);
        die();
    }
    list($result, $idUser) = (new user()->isValidCredentials($_POST['email'],$_POST['password']);
    if($result) {
        $_SESSION['id-user'] = $idUser;
        http_response_code(200);
        echo json_encode(['session' => session_id()]);
        die();
    }
}

http_response_code(401);
die();

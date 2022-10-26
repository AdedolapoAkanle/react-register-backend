<?php

require("user.php");
        
$json = file_get_contents('php://input');

$body = json_decode($json, true); 
$id = $body['id'];

$user = new User;

$rlt = $user->updateUserInfo("", "$id='id'");
echo json_encode($rlt);
<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-with");
    
    $json = file_get_contents('php://input');
    $body = json_decode($json, true);

    // $firstName = $body['firstName'];
    // $lastName = $body['lastName'];
    // $age = $body['age'];

    // if(empty($firstName)) {
    //     echo json_encode("First name cannot be empty");
    //     exit;
    // }

    // save into db
    echo json_encode("Response");
    exit;
?>
<?php
    // require("db.php");
  require("user.php");
        
    $json = file_get_contents('php://input');
    
    $body = json_decode($json, true); 
    $firstName = $body['firstName'];
    $lastName = $body['lastName'];
    $address = $body['address'];
    $age =(int)$body['age'];
    $gender = $body['gender'];


    $user = new User;
    
    $user->processUser($firstName, $lastName, $address, $age, $gender);
    echo json_encode("saved successfully");
    
   
?>
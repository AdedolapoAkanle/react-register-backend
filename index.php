<?php
    // require("db.php");
  require("user.php");
        
    $json = file_get_contents('php://input');
    
     $body = json_decode($json, true); 
     
    //  $col =  $body['col'];
    //  $value =  $body['value'];
    $name = $body['name'];
    $email = $body['email'];
    $address = $body['address'];
    $age =(int)$body['age'];
    $gender = $body['gender'];


     $user = new User;

    $user->processUser($name, $email, $address, $age, $gender);
    echo json_encode("saved successfully");
    
   
?>
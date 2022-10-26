<?php 
    require("user.php");
        
    $json = file_get_contents('php://input');
 
    $body = json_decode($json, true); 
  
    
    // $col =  $_REQUEST['searchType'];
    // $value =  $_REQUEST['search'];
    
    $col =  $body['searchType'];
    $value =  $body['search'];
    

     if(!empty($col) && !empty($value)){
        $condition = "$col like '%$value%'";
     } else{
        $condition = "";
     }
;
     $user = new User;
     $rlt = $user->userInfo($condition);
     echo json_encode($rlt);
     exit;


     
      
    
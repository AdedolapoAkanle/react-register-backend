<?php
require("db.php");
require("config.php");

class User extends Database
{

    public $name;
    public $email;
    public $address;
    public $age;
    public $gender;
    public $status;
    public $table = "user";
    public $result = "";


    public function userInfo($condition = "", $field = "*", $column = "")
    {
        return $this->lookUp($this->table, $field, $condition, $column);
    }

    
    public function singleUserInfo($userId) {
        $this->result = $this->userInfo("id = '$userId'")[0];
        $this->name = $this->result['name'];
        $this->gender = $this->result['gender'];
        $this->age = $this->result['age'];
        $this->address = $this->result['address'];
        $this->status = $this->result['status'];

     }

   

   public function userResult($userId) {
     $this->singleUserInfo($userId);
     return $this->result;

   }
    public function userName($userId) {
        $this->singleUserInfo($userId);
        return $this->name;
     }
     
     public function userGender($userId) {
        $this->singleUserInfo($userId);
        return $this->gender;
     }
     
     public function userAge($userId) {
        $this->singleUserInfo($userId);
        return $this->age;
     }
     public function userAddress($userId) {
        $this->singleUserInfo($userId);
        return $this->address;
     }
     
    public function countUserRows($conditions)
    {
        return $this->countRows($this->table, "*", $conditions);
    }

    public function isExists($conditions)
    {
        $rlt = $this->countUserRows($conditions);
        if ($rlt > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function validateUser()
    {
        $newAge = (int)$this->age;
        if (empty($this->name) || empty($this->email) || empty($this->address) || empty($this->age) || empty($this->gender)) {
            echo json_encode ("None of the fields must be empty!");
            exit;
        }
        
        if (is_numeric($this->name) || is_numeric($this->email) ) {
            echo json_encode("Name must be in text only!");
            exit;
        }

        if (!is_numeric($newAge)) {
            
            echo json_encode("Age must not contain letters!");
            exit;
        }

        if (($this->isExists("email = '$this->email'"))) {
            echo json_encode("This entry already exists!");
            exit;
        }

        
    }
    public function processUser( $name, $email, $address, $age, $gender)
    {

        // echo json_encode("$name, $email, $address, $gender, $age"); exit;

        $this->name = $this->escape($name);
        $this->email = $this->escape($email);
        $this->address = $this->escape($address);
        $this->age = $this->escape($age);
        $this->gender = $this->escape($gender);

        $this->validateUser();
        $this->saveUser();

    }

    
    public function saveUser()
    {

        $newAge = (int)$this->age;
        return $this->save($this->table, 
        "name = '$this->name', 
        email = '$this->email', 
        address = '$this->address', 
        age = $newAge,
        gender = '$this->gender'");
    }

    public function eraseUser($userId)
    {
        return $this->erase($this->table, "id = '$userId'"
        );
    }
}
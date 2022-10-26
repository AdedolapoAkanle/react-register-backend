<?php
require("db.php");
require("config.php");

class User extends Database
{

    public $id;
    public $name;
    public $email;
    public $address;
    public $age;
    public $gender;
    public $table = "user";
    public $result = "";


    public function userInfo($condition = "", $field = "*", $column = "")
    {
        return $this->lookUp($this->table, $field, $condition, $column);
    }

    public function updateUserInfo() {
        $newAge = (int)$this->age;
        return $this->saveChanges($this->table, "name = '$this->name', 
        email = '$this->email', 
        address = '$this->address', 
        age = $newAge,
        gender = '$this->gender'", "id='$this->id'");
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

        if (($this->isExists("name = '$this->name'"))  && ($this->isExists("email = '$this->email'")) && ($this->isExists("address = '$this->address'"))) {
            echo json_encode("This entry already exists!");
            exit;
        }

        
    }
    public function processUser($name, $email, $address, $age, $gender)
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
}
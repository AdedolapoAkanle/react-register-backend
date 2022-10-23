<?php
// require ("init.php");

// class User extends Database
// {

//     public $firstName;
//     public $lastName;
//     public $address;
//     public $age;
//     public $gender;
//     public $table = "user";
//     public $result = "";


//     public function UserInfo($condition = "", $field = "*", $column = "")
//     {
//         return $this->lookUp($this->table, $field, $condition, $column);
//     }

//     public function countUserRows($conditions)
//     {
//         return $this->countRows($this->table, "*", $conditions);
//     }

//     public function isExists($conditions)
//     {
//         $rlt = $this->countUserRows($conditions);
//         if ($rlt > 0) {
//             return true;
//         } else {
//             return false;
//         }
//     }


//     public function validateUser()
//     {
//         if (Functions::checkEmptyInput([$this->firstName, $this->lastName, $this->address, $this->age, $this->gender])) {
//             echo json_encode("None of the fields must be empty!");
//         }

//         if (($this->isExists("first_name = '$this->firstName'"))  && ($this->isExists("last_name = '$this->lastName'")) && ($this->isExists("address = '$this->address'"))) {
//             echo json_encode("This entry already exists!");
//         }

//         if (is_numeric($this->firstName) || is_numeric($this->lastName) ) {
//             echo json_encode("Name must be in text only!");
//         }

//         if (!is_numeric($this->age)) {
//             echo json_encode("Age must not contain letters!");
//         }
//     }
//     public function processUser($firstName, $lastName, $address, $gender, $age)
//     {

//         $this->firstName = $this->escape($firstName);
//         $this->lastName = $this->escape($lastName);
//         $this->address = $this->escape($address);
//         $this->age = $this->escape($age);
//         $this->gender = $this->escape($gender);

//         $this->validateUser();
//         $this->saveUser();
//     }

//     public function saveUser()
//     {

//         return $this->save($this->table, 
//         "first_name = '$this->firstName', 
//         last_name = '$this->lastName', 
//         address = '$this->address', 
//         age = '$this->age',
//         gender = '$this->gender'");
//     }
// }
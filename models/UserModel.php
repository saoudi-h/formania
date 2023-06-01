<?php


namespace Formania\Models;

require_once 'BaseModel.php';

use Formania\Models\BaseModel;

class UserModel extends BaseModel
{
    protected $table = "user";
    protected $fields = ['id', 'firstname', 'lastname', 'username', 'email', 'password', 'status', 'birthdate', 'gender', 'phone', 'created_at', 'updated_at'];
    protected $uniques = ['email'];

    // public $id;

    // public $username;
    // public $email;
    // public $password;
    // public $firstName;
    // public $lastName;
    // public $phone;
    // public $birthdate;
    // public $gender;
    // public $createdAt;
    // public $updatedAt;

}

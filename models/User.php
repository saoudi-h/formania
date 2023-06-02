<?php

namespace Formania\Models;

require_once 'UserModel.php';

use Formania\Models\UserModel;

use PDOException;

class User
{
    public $id;
    public $firstName;
    public $lastName;
    public $userName;
    public $email;
    public $password;
    public $role;
    public $phone;
    public $birthdate;
    public $gender;
    public $createdAt;
    public $updatedAt;

    public function __construct($data)
    {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->firstName = isset($data['firstname']) ? $data['firstname'] : null;
        $this->lastName = isset($data['lastname']) ? $data['lastname'] : null;
        $this->userName = isset($data['username']) ? $data['username'] : null;
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->password = isset($data['password']) ? $data['password'] : null;
        $this->role = isset($data['role']) ? $data['role'] : null;
        $this->phone = isset($data['phone']) ? $data['phone'] : null;
        $this->birthdate = isset($data['birthdate']) ? $data['birthdate'] : null;
        $this->gender = isset($data['gender']) ? $data['gender'] : null;
        $this->createdAt = isset($data['created_at']) ? $data['created_at'] : null;
        $this->updatedAt = isset($data['updated_at']) ? $data['updated_at'] : null;
    }
    public function toArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->userName,
            'email' => $this->email,
            'password' => $this->password,
            'firstname' => $this->firstName,
            'lastname' => $this->lastName,
            'role' => $this->role,
            'phone' => $this->phone,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
    public function validate()
    {
        $errors = [];

        // Validation des attributs
        if (empty($this->firstName)) {
            $errors[] = "Le prénom est obligatoire.";
        }
        if (empty($this->lastName)) {
            $errors[] = "Le nom est obligatoire.";
        }

        if (empty($this->email)) {
            $errors[] = "L'adresse e-mail est obligatoire.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse e-mail n'est pas valide.";
        }

        if (empty($this->password)) {
            $errors[] = "Le mot de passe est obligatoire.";
        } elseif (strlen($this->password) < 6) {
            $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
        }

        if (empty($this->birthdate)) {
            $errors[] = "La date de naissance est obligatoire.";
        } else {

            $birthdateParts = explode('-', $this->birthdate);
            if (
                count($birthdateParts) !== 3
                || !checkdate($birthdateParts[1], $birthdateParts[2], $birthdateParts[0])
            ) {
                $errors[] = "La date de naissance n'est pas valide.";
            }
        }

        if (empty($this->phone)) {
            $errors[] = "Le numéro de téléphone est obligatoire.";
        } elseif (!preg_match("/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/", $this->phone)) {
            $errors[] = "Le numéro de téléphone n'est pas valide.";
        }

        return $errors;
    }

    public function register()
    {
        //traitement avant enregistreement
        $this->hashPassword();
        $this->generateUserName();
        $userModel = new UserModel();
        $userData = $this->toArray();
        try {
            $this->id = $userModel->create($userData);
        } catch (PDOException $e) {
            return false;
        }
        return true;
    }

    private function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }
    public function generateUserName()
    {
        $this->userName = strtolower($this->firstName . $this->lastName) . rand(1000, 9999);
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    public function getGravatar($s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array())
    {
        $email = $this->email;
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
}

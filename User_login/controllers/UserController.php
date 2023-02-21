<?php
require_once './classes/User.php';
require_once './Database/DBTransaction.php';

class UserController {
    public $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($id,$name, $email,$gender, $dob, $password) {
        if ($this->db->emailExists($email)) {
            return false;
        }

        $user_id = $this->db->createUser($name, $email,$gender, $dob, $password);
        $user = new User($id, $name, $email, $gender, $dob, $password);

        return $user;
    }

    public function login($email, $password) {
        $user = $this->db->getUserByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        return new User($user['id'], $user['name'], $user['email'], $user['gender'], $user['dob'], $user['password']);
    }
}
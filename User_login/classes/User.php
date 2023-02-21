<?php
class User {
    public $id;
    public $name;
    public $email;
    public $gender;
    public $dob;
    public $password;

    public function __construct($id, $name, $email, $gender, $dob, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getDob() {
        return $this->dob;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}
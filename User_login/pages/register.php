<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once './Database/DBTransaction.php';
    $db = new Database();

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $errors = array();
    if (empty($username)) {
        $errors['username'] = 'Username is required';
    }
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    } elseif ($db->emailExists($email)) {
        $errors['email'] = 'Email already exists';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    }
    if ($password != $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    if (empty($errors)) {
        $db->createUser($username, $email, $gender, $dob ,$password);
        $_SESSION['success'] = 'Registration successful. Please login.';
        header('Location: login.php');
        exit();
    }
}

require 'views/RegisterView.php';
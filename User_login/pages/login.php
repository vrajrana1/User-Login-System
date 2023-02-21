<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once './Database/DBTransaction.php';
    $db = new Database();

    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $errors = array();
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    } elseif (!$db->emailExists($email)) {
        $errors['email'] = 'Email does not exist';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    if (empty($errors)) {
        $user = $db->getUserByEmail($email);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: login.php');
            exit();
        } else {
            $errors['password'] = 'Incorrect password';
        }
    }
}

include 'views/LoginView.php';
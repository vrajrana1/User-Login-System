<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'controllers/UserController.php';
require_once 'views/LoginView.php';

$user_controller = new UserController();

$login_view = new LoginView();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   // $result = $user_controller->createUser($name, $email, $password);
    if ($result === true) {
        header('Location: login.php');
        exit;
    } else {
        $register_view->showRegisterForm($result);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
   // $result = $user_controller->createUser($name, $email, $password); 
    if ($result === true) {
        header('Location: login.php');
        exit;
    } else {
        $login_view->showLoginForm($result);
    }
}

$login_view->showLoginForm();
?>
<?php
require_once('connect_bd.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = 'SELECT `id`, `fullname`, `login`, `email`, `password` FROM `users` WHERE email = :email AND password = :password';
$usr = $pdo->prepare($sql);


$usr->execute(['email' => $email, 'password' => $password]);
$user = $usr->fetch();

if($user) {
    session_start();
    $_SESSION['user'] = [
    "id" => $user['id'],
    "fullname" => $user['fullname'],
    "login" => $user['login'],
    "email" => $user['email']
];
    header('Location: ../index.php');

    echo "Вы вошли";
} else {
    echo "Вы ввели неправильный логин или пароль";
}
?>
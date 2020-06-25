<?php
require_once('connect_bd.php');

$fullname = $_POST['fullname'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordReplay = $_POST['password-replay'];

$sqlFindId = "SELECT MAX(id) + 1 FROM `users`";
$find = $pdo->prepare($sqlFindId);
$find->execute();

$findId = $find->fetch()['MAX(id) + 1'];
if(empty($findId)) {
    $findId = 1;
}

$sql = "SELECT * FROM `users`";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$res = $stmt->fetchAll();
for($i = 0; $i < count($res); $i++) {
    if($res[$i]['email'] == $email) {
        echo 'Электронная почта занята';
        die();
    }
}

$sql = "INSERT INTO `users` (`id`, `fullname`, `login`, `email`, `password`) VALUES ('$findId', '$fullname', '$login', '$email', '$password')";

if(empty($fullname) or empty($login) or empty($email) or empty($password) or empty($passwordReplay)) {
    echo 'Вы ввели неполную иноформацию';
    die();
}

if($password === $passwordReplay) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $add = $pdo->prepare($sql);
    $add->execute(); 
    $adduser = $add->fetch();
} else {
    echo "Введённые пароли не совпадают";
}

session_start();
header('Location: ../index.php');

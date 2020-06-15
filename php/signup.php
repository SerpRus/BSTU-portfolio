<?php
require_once('connect_bd.php');

$fullname = $_POST['fullname'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_replay = $_POST['password-replay'];

$sql_find_id = "SELECT MAX(id) + 1 FROM `users`";
$find = $pdo->prepare($sql_find_id);
$find->execute();

$find_id = $find->fetch()['MAX(id) + 1'];
if(empty($find_id)) {
  $find_id = 1;
}



$sql = "INSERT INTO `users` (`id`, `fullname`, `login`, `email`, `password`) VALUES ('$find_id', '$fullname', '$login', '$email', '$password')";


if(empty($fullname) or empty($login) or empty($email) or empty($password) or empty($password_replay)) {
  echo "Вы ввели неполную иноформацию";
}

if($password === $password_replay) {
  $password = password_hash($password, PASSWORD_DEFAULT);
  $add = $pdo->prepare($sql);
  $add->execute(); 
  $adduser = $add->fetch();
} else {
  echo "Введённые пароли не совпадают";
}

session_start();
header('Location: ../index.php');
?>
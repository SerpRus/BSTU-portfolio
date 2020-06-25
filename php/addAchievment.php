<?php
require_once('connect_bd.php');
session_start();

$userId = $_SESSION['user']['id'];
$kindOfActivity = $_POST['modalAddAchievement__activity'];
$criterion = $_POST['criterion'];
$typeOfParticipation = $_POST['modalAddAchievement__kind'];
$description = $_POST['modalAddAchievement__textarea'];
$data = $_POST['modalAddAchievement__data'];

$imgName = $_FILES['pictures']['name'];
$uploadsDir = '../img/bd_img/users/' . $userId . '/';
$imgDir = $uploadsDir . $imgName;
if(!file_exists($uploadsDir)) {
    mkdir($uploadsDir, 0777, true);
}

move_uploaded_file($_FILES['pictures']['tmp_name'], $imgDir);

$sqlFindId = "SELECT MAX(id) + 1 FROM `achievements`";
$find = $pdo->prepare($sqlFindId);
$find->execute();

$findId = $find->fetch()['MAX(id) + 1'];
if (empty($findId)) {
    $findId = 1;
}

$point;

switch($kindOfActivity ) {
    case '0':
        $point = 50;
        break;
    case '1':
        $point = 20;
        break;
    case '2':
        $point = 5;
        break;
    case '3':
        $point = 15;
        break;
    case '4':
        $point = 25;
        break;
    case '5':
        $point = 30;
        break;
    case '6':
        $point = 100;
        break;
}

$sql = "INSERT INTO `achievements` (`id`, `user_id`, `kind_of_activity`, `criterion`, `type_of_participation`, `description`, `data`, `img`, `point`) 
VALUES ('$findId', '$userId', '$kindOfActivity', '$criterion', '$typeOfParticipation', '$description', '$data', '$imgDir', '$point')";
if (empty($criterion) or $description == '') {
    echo 'Вы не заполнили всю информацию';
    die();
}
$add = $pdo->prepare($sql);
$add->execute();
$addAchievement = $add->fetch();

$summPoints = 0;

$sql = "SELECT * FROM `achievements` WHERE `user_id` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$res = $stmt->fetchAll();

for($i = 0; $i < count($res); $i++) {
    $summPoints += $res[$i]['point'];
}

$sql = "UPDATE `users` SET `points` = '$summPoints' WHERE `id` = '$userId'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$res = $stmt->fetch();
header('Location: ../portfolio.php');
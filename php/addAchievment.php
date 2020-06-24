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
$uploadsDir = '../img/bd_img/users/' . $_SESSION['user']['id'] . '/' . $imgName;
if(!file_exists($uploadsDir)) {
    mkdir($uploadsDir, 0777, true);
}

echo move_uploaded_file($_FILES['pictures']['tmp_name'], $uploadsDir);

move_uploaded_file($_FILES['pictures']['tmp_name'], $uploadsDir);

$sqlFindId = "SELECT MAX(id) + 1 FROM `achievements`";
$find = $pdo->prepare($sqlFindId);
$find->execute();

$findId = $find->fetch()['MAX(id) + 1'];
if (empty($findId)) {
    $findId = 1;
}

$point;

switch($_POST['modalAddAchievement__activity']) {
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
VALUES ('$findId', '$userId', '$kindOfActivity', '$criterion', '$typeOfParticipation', '$description', '$data', '$uploadsDir', '$point')";

if (empty($criterion) or $description == '') {
    die();
}

$add = $pdo->prepare($sql);
$add->execute();
$addAchievement = $add->fetch();
header('Location: ../portfolio.php');
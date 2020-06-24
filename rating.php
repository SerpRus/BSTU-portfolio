<?php
session_start();
require_once('header.php');
require_once('php/connect_bd.php');

$sql = "SELECT * FROM `achievements` ORDER BY `user_id`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll();

$userPoints = [];

for($i = 0; $i < count($res); $i++) {
    // echo $res;
    $userPoints[$res[$i]['user_id']] += $res[$i]['point'];
    echo '<pre>';
    print_r($userPoints);
    echo '</pre>';
}

echo '<pre>';
print_r($res);
echo '</pre>';
?>

<section class="rating">
    <div class="container">
        <div class="rating content">
            <table class="rating__table">
                
                
            </table>
        </div>
    </div>
</section>
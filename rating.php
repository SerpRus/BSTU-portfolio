<?php
session_start();
require_once('header.php');
require_once('php/connect_bd.php');

$sql = "SELECT * FROM `achievements` ORDER BY `user_id`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll();

$points = [];

for($i = 0; $i < count($res); $i++) {
    $points[$res[$i]['user_id']] += $res[$i]['point'];
}

$sql = "SELECT * FROM `users` ORDER BY `points` DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll();
?>

<section class="rating">
    <div class="container">
        <div class="rating content">
            <table class="rating__table">
                <tr>
                    <th class="rating__title">ФИО</th>
                    <th class="rating__title">Рейтинг</th>
                </tr>
                <?php
                    for ($i = 0; $i < count($res); $i++) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo $res[$i]['fullname'];
                        ?>
                    </td>
                    <td class="rating__points">
                        <?php
                        echo $res[$i]['points'];
                        ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</section>
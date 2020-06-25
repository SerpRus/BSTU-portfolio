<?php
session_start();
require_once('header.php');
require_once('php/connect_bd.php');

$sql = "SELECT * FROM `achievements` WHERE `user_id` = ? ORDER BY `kind_of_activity`";

$stmt = $pdo->prepare($sql);

if ($stmt->execute([$_SESSION['user']['id']])) {
    $res = $stmt->fetchAll();
}

$achievements = [];
foreach ($res as $item) {
    array_push($achievements, $item);
}

$kindOfActivityList = ['Научно-исследовательская деятельность', 'Учебная деятельность', 'Общественная деятельность', 'Культурно-творческая деятельность', 'Спортивная деятельность', 'Курсовые работы (проекты)', 'Дипломная работа (проект)'];
$typeOfParticipation = ['Организатор', 'Участник'];
?>

<section class="portfolio">
    <div class="container">
        <div class="portfolio__content">
            <?php if (isset($_SESSION['user'])) { ?>
                <h1 class="portfolio__title">Портфолио студента</h1>
                <div class="portfolio__username"><?php echo $_SESSION['user']['fullname'] ?></div>
                <button class="portfolio__addAchievement">+ Добавить достижение</button>
                <?php require_once('modalAddAchievement.html'); ?>
            <?php } else { ?>
                <?php require_once('modalSignup.html'); ?>
                <?php require_once('modalSignin.html'); ?>
                <div class="portfolio__error">Данный раздел доступен только после авторизации!</div>
            <?php } ?>
        </div>

        <div class="achievementList">
            <div class="achievementList__item">
            <?php
                for ($i = 0; $i < count($kindOfActivityList); $i++) {
                    $flag = true;
                    for ($j = 0; $j < count($achievements); $j++) {
                        if ($i == $achievements[$j]['kind_of_activity'] and $flag) {
                            $flag = false;
            ?>
                <h2 class="achievementList__title"><?php echo $kindOfActivityList[$i]; ?></h2>
                <table class="achievementList__table">
                    <tr>
                        <th>Название и краткое описание мероприятия</th>
                        <th>Дата мероприятия</th>
                        <th>Вид участия</th>
                        <th>Документы</th>
                    </tr>

                    <?php 
                        } if ($i == $achievements[$j]['kind_of_activity'] ) {
                    ?>
                    <tr>
                        <td><?php echo $achievements[$j]['description'] ?></td>
                        <td><?php echo $achievements[$j]['data'] ?></td>
                        <td><?php echo $typeOfParticipation[$achievements[$j]['type_of_participation']] ?></td>
                        <td>
                            <a href="<?php echo $achievements[$j]['img'] ?>">
                            <?php
                                $test = explode( '/', $achievements[$j]['img']);
                                $imgName = $test[count($test)-1];
                                echo $imgName 
                            ?>
                            </a>
                        </td>
                    </tr> 
                <?php
                        }               
                    }    
                ?>
                </table>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
</section>

</body>

</html>
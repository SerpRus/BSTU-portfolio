<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Портфолио</title>
  <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/main.css">
  <script src="js/script.js" defer></script>
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="header__content">
        <div class="header__logo">
          <a href="index.php"><img src="img/header/logo.svg" alt=""></a>
        </div>
        <?php
        if (basename($_SERVER['SCRIPT_FILENAME']) != 'portfolio.php') {
        ?>
          <div>
            <a class="header__portfolioLink" href="portfolio.php">Портфорило студента</a>
          </div>
        <?php
        }
        if (empty($_SESSION['user'])) {
        ?>
          <nav class="header__menu">
            <ul class="header__list">
              <li><button id="buttonSignup" class="button">Регистрация</button></li>
              <li><button id="buttonSignin" class="button">Вход</button></li>
            </ul>
          </nav>
        <?php
        } else {
        ?>
          <nav class="header__menu">
            <ul class="header__list">
              <li>
                <form action="php/logout.php" method="GET">
                  <button class="button">Выйти</button>
                </form>
              </li>
            </ul>
          </nav>
        <?php
        }
        ?>
      </div>
    </div>
  </header>
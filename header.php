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
          if(basename($_SERVER['SCRIPT_FILENAME']) != 'portfolio.php') {
        ?>
        <div>
          <a class="header__portfolio-link" href="portfolio.php">Портфорило студента</a>
        </div>
        <?php  
          }
          if(empty($_SESSION['user'])) {
        ?>
        <nav class="header__menu">
          <ul class="header__list">
            <li><button id="button-signup" class="button">Регистрация</button></li>
            <li><button id="button-signin" class="button">Вход</button></li>
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

  <section id="modal-signup" class="modal-sign">
    <div id="modal-signup__content" class="modal-sign__content">
      <header class="modal-sign__header">
        <h2 class="modal-sign__title">Регистрация</h2>
        <span id="close-singup" class="modal-sign__close"></span>
      </header>
      <form action="php/signup.php" class="modal-sign__form" method="POST">
        <div class="modal-sign__item">
          <label for="fullname-signup">ФИО:</label>
          <input id="fullname-signup" name="fullname" type="text">
        </div>
        <div class="modal-sign__item">
          <label for="login-signup">Логин:</label>
          <input id="login-signup" name="login" type="text">
        </div>
        <div class="modal-sign__item">
          <label for="email">Email:</label>
          <input id="email" name="email" type="email" value="<?php echo @$data['email']; ?>">
        </div>
        <div class="modal-sign__item">
          <label for="password-signup">Пароль:</label>
          <input id="password-signup" name="password" type="password">
        </div>
        <div class="modal-sign__item">
          <label for="password-replay-signup">Повторите Пароль:</label>
          <input id="password-replay-signup" name="password-replay" type="password">
        </div>
        <button class="modal-signup__button button button--blue" type="submit">Зарегистрироваться</button>
      </form>
    </div>
  </section>

  <section id="modal-signin" class="modal-sign">
    <div id="modal-signin__content" class="modal-sign__content">
      <header class="modal-sign__header">
        <h2 class="modal-sign__title">Авторизация</h2>
        <span id="close-singin" class="modal-sign__close"></span>
      </header>
      <form action="php/signin.php" class="modal-sign__form" method="POST">
        <div class="modal-sign__item">
          <label for="email-signin">Email:</label>
          <input id="email-signin" type="email" name="email">
        </div>
        <div class="modal-sign__item">
          <label for="password-signin">Пароль:</label>
          <input id="password-signin" type="password" name="password">
        </div>
        <button class="modal-signup__button button button--blue" type="submit" name="do-login">Войти</button>
      </form>
    </div>
  </section>

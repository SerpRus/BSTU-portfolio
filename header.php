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

  <section id="modalSignup" class="modalSign hide">
    <div id="modalSignup__content" class="modalSign__content">
      <header class="modalSign__header">
        <h2 class="modalSign__title">Регистрация</h2>
        <span id="closeSingup" class="modalSign__close"></span>
      </header>
      <form action="php/signup.php" class="modalSign__form" method="POST">
        <div class="modalSign__item">
          <label for="fullname-signup">ФИО:</label>
          <input id="fullname-signup" name="fullname" type="text">
        </div>
        <div class="modalSign__item">
          <label for="login-signup">Логин:</label>
          <input id="login-signup" name="login" type="text">
        </div>
        <div class="modalSign__item">
          <label for="email">Email:</label>
          <input id="email" name="email" type="email" value="<?php echo @$data['email']; ?>">
        </div>
        <div class="modalSign__item">
          <label for="password-signup">Пароль:</label>
          <input id="password-signup" name="password" type="password">
        </div>
        <div class="modalSign__item">
          <label for="password-replay-signup">Повторите Пароль:</label>
          <input id="password-replay-signup" name="password-replay" type="password">
        </div>
        <button class="modalSignup__button button button--blue" type="submit">Зарегистрироваться</button>
      </form>
    </div>
  </section>

  <section id="modalSignin" class="modalSign hide">
    <div id="modalSignin__content" class="modalSign__content">
      <header class="modalSign__header">
        <h2 class="modalSign__title">Авторизация</h2>
        <span id="closeSingin" class="modalSign__close"></span>
      </header>
      <form action="php/signin.php" class="modalSign__form" method="POST">
        <div class="modalSign__item">
          <label for="emailSignin">Email:</label>
          <input id="emailSignin" type="email" name="email">
        </div>
        <div class="modalSign__item">
          <label for="passwordSignin">Пароль:</label>
          <input id="passwordSignin" type="password" name="password">
        </div>
        <button class="modalSignup__button button button--blue" type="submit" name="doLogin">Войти</button>
      </form>
    </div>
  </section>
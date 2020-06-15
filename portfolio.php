<?php 
  session_start();
?>
<?php require_once('header.php'); 
?>


  <section class="portfolio">
    <div class="container">
      <div class="portfolio__content">
        <?php if(isset($_SESSION['user'])) { ?>
        <h1 class="portfolio__title">Портфолио студента</h1>
        <div><?php $_SESSION['user']['fullname'] ?></div>
        <?php } else { ?>
        <div class="portfolio__error">Данный раздел доступен только после авторизации!</div>
        <?php } ?>
      </div>
    </div>
  </section>



</body>
</html>
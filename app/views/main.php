<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Striply</title>
  <meta name="description" content="">
  <base href="<?php echo $BASE; ?>/" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="./dist/assets/css/main.css">

</head>
<body>
  <nav>
    <h1 class="logo">Striply</h1>
    <ul class="menu">
      <li><a class="menu--active" href="home">Home</a></li>
      <li><a href="gallery">Gallery</a></li>
      <li><a href="contests">Contests</a></li>
      <li><a href="expos">Expos</a></li>
      <li><a href="jobs">Jobs</a></li>
    </ul>
    <span></span>
    <ul class="menu--more">
      <li><a href="#">About us</a></li>
      <li><a href="#">Facebook</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Google +</a></li>
      <li><a href="#">RSS</a></li>
    </ul>
    <?php if(!isset($SESSION) || empty($SESSION)): ?>
        <ul>
          <li><a href="signin">Sign Up</a></li>
          <li><a href="login" class="btn-cta">Log In</a></li>
        </ul>
      <?php endif; ?>

  </nav>
  <div class="main-container">
    <section class="featured-event">

    </section>

    <div class="wrapper-home-content">
      <div class="filters">
        <span>Categories</span>
        <form action="search/" method="post" id='search-form'>
            <input type="text" name="name" placeholder="Recherche" autocomplete="off" id="search-content"/>
          </form>
      </div>
      <div class="top-content">
        <section class="most-liked">
          <h2>Most liked</h2>
          <div class="boards-container-home">
            <div class="single-board-home"></div>
            <div class="single-board-home"></div>
            <div class="single-board-home"></div>
            <div class="single-board-home"></div>
          </div>
        </section>
        <section class="most-liked">
          <h2>Most commented</h2>
          <div class="boards-container-home">
            <div class="single-board-home"></div>
            <div class="single-board-home"></div>
            <div class="single-board-home"></div>
            <div class="single-board-home"></div>
          </div>
        </section>
          <?php

          $f3=\Base::instance();

          if(isset($SESSION) && !empty($SESSION)){
            echo "Salut ".$SESSION['name'];
          }

          ?>
          <br/>

          <?php if(isset($SESSION) && !empty($SESSION)): ?>
            <a href="logout">Logout</a>
            <a href="new-board">New Board</a>
            <a href="user/<?php echo $f3->get('SESSION.id') ?>">View Profil</a>
          <?php endif; ?>



          <?php require('partials/homeBoards.php'); ?>

        </section>

      </div>
    </div>
  </div>
  <script type="text/javascript" src="dist/assets/scripts/main.js"></script>
</body>
</html>
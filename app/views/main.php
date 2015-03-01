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
    <div class="container-menu">
      <h1 class="logo">Striply</h1>
      <ul class="menu">
        <li><a class="menu--active" href="home">Home</a></li>
        <li><a href="gallery">Gallery</a></li>
        <li><a href="contests">Contests</a></li>
        <li><a href="shows">Shows</a></li>
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
    </div>
    <?php if(empty($SESSION)): ?>
        <div class="menu--footer">
          <!-- NOT CONNECTED -->
          <ul class="disconnected">
            <li><a href="signin"><i class="flaticon-user148"></i><span>Sign Up</span><i class="flaticon-right11"></i></a></li>
            <li class="btn-cta">
              <a href="login">
                <span></span>
                <strong>Log In</strong>
                <i class="flaticon-plus3"></i>
              </a>
            </li>
          </ul>
      <?php endif; ?>

      <?php if(!empty($SESSION)): ?>

          <!-- CONNECTED -->
          <ul class="connected">
            <li id="feature-profile-menu">
              <a href="home">
                <img src="./dist/assets/img/profile.jpg">
                <div class="username"><p><?php echo $SESSION['name'] ?></p></div>
              </a>
            </li>

            <li class="feature-menu-hover">
              <a href="logout"><i class="flaticon-logout11"></i></a>
              <span></span>
              <a href="user/<?php echo $SESSION['id'] ?>"><p>See profile</p></a>
            </li>

            <li class="btn-cta">
              <a href="login">
                <span></span>
                <strong>Add strip</strong>
                <i class="flaticon-plus3"></i>
              </a>
            </li>
          </ul>
        <?php endif; ?>
        </div>
      
  </nav>
  
  <!-- <section class="page-search">
    <h1>Search anything by tiping here</h1>
    <i class="flaticon-right11"></i>
    <form action="search/" method="post" id='search-form'>
        <input type="text" name="name" placeholder="Search" autocomplete="off" id="search-content"/>
    </form>
  </section> -->

  <div class="main-container">
    <section class="featured-event">
      <p>The contest #<strong>18</strong></p>
      <p>is finally launched !</p>
      <a href="#"><span>Read more</span><i class="flaticon-right11"></i></a>
    </section>

    <div class="wrapper-home-content">
      <div class="filters">
        <a href="board/selectCategory">
          <span>Categories</span>
          <i class="flaticon-telephone106"></i>
        </a>
        <a href="#" id="search">
          <span>Search</span>
          <i class="flaticon-magnifier52"></i>
        </a>
      </div>


      <div class="top-content">
        <section class="most-liked">
          <h2>Most liked</h2>
          <div class="boards-container-home">
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a href="landing" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <img src="./dist/assets/img/landing.jpg">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>

            </a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a href="#">See all</a>
          </div>
        </section>
        <section class="most-liked">
          <h2>Most commented</h2>
          <div class="boards-container-home">
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a href="#">See all</a>
          </div>
        </section>
        <section class="most-liked">
          <h2>Most controversial</h2>
          <div class="boards-container-home">
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a class="single-board-home"></a>
            <a href="#">See all</a>
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
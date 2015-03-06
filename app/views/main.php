<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Striply</title>
  <meta name="description" content="">
  <base href="<?php echo $BASE; ?>/" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="icon" type="image/ico" href="favicon.ico" />
  <link rel="stylesheet" type="text/css" href="./dist/assets/css/main.css">

</head>
<body>

  <!-- POP UP SEARCH -->
  <?php
  include('partials/search-popup.php');
  ?>

  <!-- POP UP CATEGORY -->
  <?php
  include('partials/categories-popup.php')
  ?>

  <?php
  include('partials/nav.php');
  ?>

  <div id="mainContent" class="main-container">
    <section class="featured-event">
      <p>The contest #<strong>18</strong></p>
      <p>is finally launched !</p>
      <a href="#" class="btn-little"><span>Read more</span><i class="flaticon-right11"></i></a>
    </section>

    <div class="wrapper-home-content">
      <div class="filters">
        <a href="logout"><i class="flaticon-logout11"></i></a>
        <a href="#" id="category">
          <span>Categories</span>
          <i class="flaticon-telephone106"></i>
        </a>
        <a href="#" id="search">
          <span>Search</span>
          <i class="flaticon-magnifier52"></i>
        </a>
      </div>

      <div class="top-content">

        <!-- MOST LIKED -->
        <section class="most-liked">
          <h2>Most liked</h2>

          <div class="boards-container-home">
          <?php
          $i = 0;
          foreach ($mostLikedBoards as $board):
          ?>
            <!-- Single board 1 -->
            <a href="board/<?php echo $board->id ?>" class="single-board-home">
              <div class="board-hover">
                <h3><?php echo $board->name ?></h3>
                <p><?php echo $board->author ?></p>
                <em> <i class="flaticon-right11"></i>
                  <?php foreach ($mostLikedCategories[$i] as $cate): ?>
                    <?php echo $cate['categorie']; ?>
                  <?php endforeach; ?>
                </em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="<?php echo $board->filepath ?>">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span><?php echo $board->likes ?></span></i>
                  <i class="flaticon-comment21"><span><?php echo $board->commentNumber; ?></span></i>
                </div>
              </div>
            </a>
            <?php
            $i += 1;
            endforeach;
            ?>

          </div>
          <a href="gallery?category=all&sortby=likes&page=1">See all</a>
        </section>


        <!-- MOST COMMENTED -->
        <section class="most-liked">
          <h2>Most commented</h2>

          <div class="boards-container-home">
            <?php
            $i = 0;
            foreach ($mostCommentedBoards as $board):
            ?>
              <!-- Single board 1 -->
              <a href="board/<?php echo $board->id ?>" class="single-board-home">
                <div class="board-hover">
                  <h3><?php echo $board->name ?></h3>
                  <p><?php echo $board->author ?></p>
                  <em> <i class="flaticon-right11"></i>
                    <?php foreach ($mostCommentedCategories[$i] as $cate): ?>
                      <?php echo $cate['categorie']; ?>
                    <?php endforeach; ?>
                  </em>
                </div>
                <!-- <img src="./dist/assets/img/landing.jpg"> -->
                <img src="<?php echo $board->filepath ?>">
                <div class="banner">
                  <div class="banner-content">
                    <i class="flaticon-label36"><span><?php echo $board->likes ?></span></i>
                    <i class="flaticon-comment21"><span><?php echo $board->commentNumber; ?></span></i>
                  </div>
                </div>
              </a>
              <?php
              $i += 1;
              endforeach;
              ?>
          </div>
          <a href="#">See all</a>
        </section>


        <!-- MOST CONTROVERSIAL -->
        <section class="most-liked">
          <h2>Less liked</h2>

          <div class="boards-container-home">
            <?php
            $i = 0;
            foreach ($mostUnlikedBoards as $board):
            ?>
              <!-- Single board 1 -->
              <a href="board/<?php echo $board->id ?>" class="single-board-home">
                <div class="board-hover">
                  <h3><?php echo $board->name ?></h3>
                  <p><?php echo $board->author ?></p>
                  <em> <i class="flaticon-right11"></i>
                    <?php foreach ($mostUnlikedCategories[$i] as $cate): ?>
                      <?php echo $cate['categorie']; ?>
                    <?php endforeach; ?>
                  </em>
                </div>
                <!-- <img src="./dist/assets/img/landing.jpg"> -->
                <img src="<?php echo $board->filepath ?>">
                <div class="banner">
                  <div class="banner-content">
                    <i class="flaticon-label36"><span><?php echo $board->likes ?></span></i>
                    <i class="flaticon-comment21"><span><?php echo $board->commentNumber; ?></span></i>
                  </div>
                </div>
              </a>
              <?php
              $i += 1;
              endforeach;
              ?>
          </div>
          <a href="#">See all</a>
        </section>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="dist/assets/scripts/main.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/actionMenu.js"></script>
</body>
</html>
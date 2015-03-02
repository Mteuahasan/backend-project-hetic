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
        </div>
      <?php endif; ?>
      <?php if(!empty($SESSION)): ?>
          <!-- CONNECTED -->
        <div class="menu--footer">
          <ul class="connected">
            <div class="profilHover">
                <li id="feature-profile-menu">
                  <a href="home">
                    <img src="./dist/assets/img/profile.jpg">
                    <div class="username"><p><?php echo $SESSION['name'] ?></p></div>
                  </a>
                </li>
                <li id="test" class="feature-menu-hover">
                  <a href="logout"><i class="flaticon-logout11"></i></a>
                  <span></span>
                  <a href="user/<?php echo $SESSION['id'] ?>"><p>See profile</p></a>
                </li>
              </div>
              <li class="btn-cta">
                <a href="#">
                  <span></span>
                  <strong>Add strip</strong>
                  <i class="flaticon-plus3"></i>
                </a>
              </li>
            </ul>
          </div>
        <?php endif; ?>
  </nav>

  <!-- POP UP SEARCH -->
  <section class="page-filters">
    <div class="page-search">
      <i class="flaticon-cancel22"></i>
      <h1>Search anything by tiping here</h1>
      <i class="flaticon-information32" title="Category, people or tag"></i>
      <form action="search/" method="post" id='search-form'>
          <input type="text" name="name" placeholder="" autocomplete="off" id="search-content"/>
      </form>
    </div>
  </section>

  <!-- POP UP CATEGORY -->
  <section class="page-filters">
    <div class="page-category">
      <i class="flaticon-cancel22"></i>
      <h1>Set up a maximum of <strong>3</strong> categories</h1>
      <form autocomplete="off">
        <ul>
          <li><input type="checkbox" id="cat1"><label for="cat1">Comics</label></li>
          <li><input type="checkbox" id="cat2"><label for="cat2">Humor</label></li>
          <li><input type="checkbox" id="cat3"><label for="cat3">Politic</label></li>
        </ul>
        <ul>
          <li><input type="checkbox" id="cat4"><label for="cat4">Celebrities</label></li>
          <li><input type="checkbox" id="cat5"><label for="cat5">Dark Humor</label></li>
          <li><input type="checkbox" id="cat6"><label for="cat6">Gore</label></li>
          <li><input type="checkbox" id="cat7"><label for="cat7">Sensual</label></li>
        </ul>
        <ul>
          <li><input type="checkbox" id="cat8"><label for="cat8">Religious</label></li>
          <li><input type="checkbox" id="cat9"><label for="cat9">For kids</label></li>
          <li><input type="checkbox" id="cat10"><label for="cat10">Daily</label></li>
        </ul>
      </form>
      <input type="submit" value="Let's go" class="btn-little">
      <a href="#" class="btn-little"><span>Let's go</span><i class="flaticon-right11"></i></a>
    </div>
  </section>

  <div id="mainContent" class="main-container">
    <section class="featured-event">
      <p>The contest #<strong>18</strong></p>
      <p>is finally launched !</p>
      <a href="#" class="btn-little"><span>Read more</span><i class="flaticon-right11"></i></a>
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

        <!-- MOST LIKED -->
        <section class="most-liked">
          <h2>Most liked</h2>
          <div class="slider-btn slider-left"></div>
          <div class="slider-btn slider-right"></div>

          <div class="boards-container-home">
            <!-- Single board 1 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 2 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 3 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 4 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 5 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 6 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 7 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
          </div>
          <a href="#">See all</a>
        </section>


        <!-- MOST COMMENTED -->
        <section class="most-liked">
          <h2>Most commented</h2>
          <div class="slider-btn slider-left"></div>
          <div class="slider-btn slider-right"></div>

          <div class="boards-container-home">
            <!-- Single board 1 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 2 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 3 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 4 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 5 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 6 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 7 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
          </div>
          <a href="#">See all</a>
        </section>


        <!-- MOST CONTROVERSIAL -->
        <section class="most-liked">
          <h2>Most controversial</h2>
          <div class="slider-btn slider-left"></div>
          <div class="slider-btn slider-right"></div>
          
          <div class="boards-container-home">
            <!-- Single board 1 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 2 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 3 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 4 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 5 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 6 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
            <!-- Single board 7 -->
            <a href="#" class="single-board-home">
              <div class="board-hover">
                <h3>Nabila's phone</h3>
                <p>Patrick Rodrigues</p>
                <em> <i class="flaticon-right11"></i>Dark Humor, Celebrities, Caricature</em>
              </div>
              <!-- <img src="./dist/assets/img/landing.jpg"> -->
              <img src="http://lorempixel.com/230/300">
              <div class="banner">
                <div class="banner-content">
                  <i class="flaticon-label36"><span>120</span></i>
                  <i class="flaticon-view28"><span>380</span></i>
                </div>
              </div>
            </a>
          </div>
          <a href="#">See all</a>
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
  <script type="text/javascript" src="public/script/home.js"></script>
</body>
</html>
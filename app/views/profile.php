<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Striply</title>
	<meta name="description" content="">
	<base href="<?php echo $BASE; ?>/" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
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
	    <section class="header-profile">
        <div class="name"><?php echo $profilUser[0]->name ?></div class="name">
        <img src="<?php echo (!empty($profilUser[0]->filepath)) ? $profilUser[0]->filepath : 'http://lorempixel.com/400/200/'; ?>">
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
	        <?php if($session_id == $id): ?>
            <a href="user/<?php echo $SESSION['id'] ?>/settings" id="setting">
  	          <span>Settings</span>
  	          <i class="flaticon-screwdriver26"></i>
  	        </a>
          <?php endif; ?>
	        <a href="user/<?php echo $id ?>/about" id="about">
	          <span>About</span>
	          <i class="flaticon-information32"></i>
	        </a>
	      </div>
	      <div class="top-content">
	      	<div class="selection">
	      		<span class="portfolio color">PORTFOLIO</span>
	      		<span class="liked">LIKED</span>
	      	</div>
	      	<div class="separation"></div>
	      	<section class="most-liked">
		      	<div class="boards-container-profile">
					<?php
						include("partials/usersBoards.php")
					?>
					<?php
						include("partials/likedBoards.php")
					?>
				</div>
			</section>
		  </div>
		</div>
	</div>


  <script type="text/javascript" src="dist/assets/scripts/main.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/actionMenu.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/profile.js"></script>
</body>
</html>







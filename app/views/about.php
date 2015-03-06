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
	      <img src="./dist/assets/img/profile.jpg">
	    </section>

	    <div class="wrapper-home-content">
	      <div class="filters">
	        <a href="#" id="category">
	          <span>Categories</span>
	          <i class="flaticon-telephone106"></i>
	        </a>
	        <a href="#" id="search">
	          <span>Search</span>
	          <i class="flaticon-magnifier52"></i>
	        </a>
	        <a href="user/<?php echo $users[0]->id ?>/settings" id="setting">
	          <span>Settings</span>
	          <i class="flaticon-screwdriver26"></i>
	        </a>
	        <a href="user/<?php echo $users[0]->id ?>/about" id="about">
	          <span>About</span>
	          <i class="flaticon-information32"></i>
	        </a>
	      </div>
	      <div id="settings-content" class="top-content">
	      	<div class="selection">
	      		<span class="liked color">SETTINGS</span>
	      	</div>
	      	<div class="separation"></div>
          <div class="container-about">
            
          <?php echo $users[0]->name ?>
          <?php echo $users[0]->email ?>
          <?php echo $users[0]->name ?>
          <?php echo $users[0]->name ?>
          <?php echo $users[0]->name ?>


          </div>



   <script type="text/javascript" src="dist/assets/scripts/main.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/actionMenu.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/profile.js"></script>
</body>
</html>
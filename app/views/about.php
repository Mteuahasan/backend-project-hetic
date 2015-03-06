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
        <div class="name">Bonjour <?php echo $users[0]->name ?></div class="name">
	      <img src="<?php echo (!empty($users[0]->filepath)) ? $users[0]->filepath : 'http://lorempixel.com/400/200/'; ?>">
	      
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
	      		<span class="liked color">ABOUT</span>
	      	</div>
	      	<div class="separation"></div>
            <section class="settings">
              <div class="container-settings">
                <div class="settings-content container-settings-left">  
                  <section class="content">
                
                  <label for="username"><span>Username</span></label>
                  <div><?php echo $users[0]->name; ?></div>
                  
                  </section>

                <section class="content">
                  
                  <label for="description"><span>Description</span></label>
                  <div><?php echo $users[0]->description ?></div>

                </section>  

                <section class="content">

                  <label for="city"><span>Current City</span></label>
                  <div><?php echo $users[0]->city ?></div>
                </section>            
                                      
              </div>
              <div class="settings-content container-settings-right">
                <section class="content">
                    <label for="mail"><span>Mail adresse</span></label>
                    <div><a href="mailto:<?php echo $users[0]->email ?>"> <?php echo $users[0]->email ?></a></div>
                </section>

                <section class="content">
                    <label for="category"><span>Catégorie of interest (3 max).</span></label>
                    <div></div>
                </section> 

                <section class="content">         
                    <label for="site"><span>Portefolio URL</span></label>
                    <div><a href="<?php echo $users[0]->website ?>"><?php echo $users[0]->website ?></a></div>
                </section>      
              </div>
              <div class="container-about-bottom">
                <section class="about">
                    <label for="twitter"><a href="<?php echo $users[0]->url_twitter ?>"><i class="flaticon-twitter44"></i></a></label>
                    <label for="facebook"><a href="<?php echo $users[0]->url_facebook ?>"><i class="flaticon-facebook51"></i></a></label>
                    <label for="linkdin"><a href="<?php echo $users[0]->url_linkdin ?>"><i class="flaticon-social123"></i></a></label>
                </section> 

              </div>
              
            </div>
          </section>         
      </div>



   <script type="text/javascript" src="dist/assets/scripts/main.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/actionMenu.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/profile.js"></script>
</body>
</html>
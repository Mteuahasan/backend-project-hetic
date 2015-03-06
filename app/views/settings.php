<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Document</title>
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

  <?php include('partials/nav.php') ?>


	<div id="mainContent" class="main-container">
	    <section class="header-profile">
	      <div class="name">Bonjour <?php echo $users[0]->name ?></div class="name">
	      <img src="<?php echo (!empty($users[0]->filepath)) ? $users[0]->filepath : 'http://lorempixel.com/400/200/'; ?>">
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
	      	<section class="settings">
	      		<div class="container-settings">
	      		<form enctype="multipart/form-data" action="" method="post">
	      			<div class="settings-content container-settings-left">
	      				<section class="content">

							<div class="information"><?php echo $users[0]->name; ?></div>
							<label for="username"><span>Username</span></label>
							<input type="text" name="name">


						</section>

						<section class="content">

							<div class="information"><?php echo $users[0]->description ?></div>
							<label for="description"><span>Description</span></label>
							<input type="text" name="description">


						</section>

						<section class="content">

							<div class="information"></div>
							<label for="city"><span>Current City</span></label>
							<input type="text" placeholder="<?php echo $users[0]->city ?>" name="city">

						</section>

					</div>
					<div class="settings-content container-settings-right">
						<section class="content">
								<div class="information"></div>
								<label for="mail"><span>Mail adresse</span></label>

								<input type="text" placeholder="<?php echo $users[0]->email ?>" name="mail">

						</section>

						<section class="content">
								<div class="information"></div>
								<label for="category"><span>Catégorie of interest (3 max).</span></label>
								<input type="text" name="categorie">

						</section>

						<section class="content">
								<div class="information"><?php echo $users[0]->website ?></div>
								<label for="site"><span>Portefolio URL</span></label>
								<input type="text" name="site">

						</section>
					</div>
					<div class="settings-content container-settings-bottom">
						<section class="bottom">
								<div class="information"><?php echo $users[0]->url_twitter ?></div>
								<label for="twitter"><span>Twitter</span></label>
								<input type="text" name="twitter">
						</section>

						<section class="bottom">
								<div class="information"><?php echo $users[0]->url_facebook ?></div>
								<label for="facebook"><span>Facebook</span></label>
								<input type="text" name="facebook">
						</section>

						<section class="bottom">
								<div class="information"><?php echo $users[0]->url_linkdin ?></div>
								<label for="linkdin"><span>Linkedin</span></label>
								<input type="text" name="linkdin">
						</section>

					</div>

					<div class="btn-upload-settings">
					  <input type="file" name="userfile" class="input-file" value="Add a profil picture" accept=".png,.jpg">
			          <span>Add a profil picture</span>
			        </div>

					<div class="btn--submit-form">
			          <input type="submit" value="Add">
			          <i class="flaticon-right11"></i>
			        </div>

					</form

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
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
  <section id="searchFilter" class="page-filters-search">
    <div id="pageSearch" class="page-search">
      <i id="closeSearch" class="flaticon-cancel22"></i>
      <h1>Search anything by tiping here</h1>
      <i class="flaticon-information32" title="Category, people or tag"></i>
      <form action="search/" method="post" id='search-form'>
          <input type="text" name="name" placeholder="" autocomplete="off" id="search-content"/>
      </form>
    </div>
  </section>

  <!-- POP UP CATEGORY -->
  <section id="categoryFilter" class="page-filters-category">
    <div id="pageCategory" class="page-category">
      <i id="closeCategory" class="flaticon-cancel22"></i>
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
	        <a href="#" id="category">
	          <span>Categories</span>
	          <i class="flaticon-telephone106"></i>
	        </a>
	        <a href="#" id="search">
	          <span>Search</span>
	          <i class="flaticon-magnifier52"></i>
	        </a>
	        <a href="user/<?php echo $SESSION['id'] ?>/profile" id="setting">
	          <span>Settings</span>
	          <i class="flaticon-screwdriver26"></i>
	        </a>
	        <a href="#" id="about">
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







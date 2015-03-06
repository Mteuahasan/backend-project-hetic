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
    	</div>

      <!-- GALLERY -->
      <div class="top-gallery">
        <h1><i class="flaticon-right11"></i>
        <form action="">
        I'm looking for projects in
        <select name="category" id="category-select">
          <option value="all">All</option>
          <?php foreach ($allCategories as $cat): ?>
            <option value="<?php echo $cat->id; ?>" <?php echo $cat->id=$_GET['category'] ? 'selected':'' ?>><?php echo $cat->name; ?></option>
          <?php endforeach ?>
        </select> categories

        , and I want to classify them by
        <select name="sortby" id="sortby-select">
          <option value="date" <?php echo $_GET['sortby']=="date" ? 'selected':'' ?>>date</option>
          <option value="commentNumber" <?php echo $_GET['sortby']=="commentNumber" ? 'selected':'' ?>>most commented</option>
          <option value="likes" <?php echo $_GET['sortby']=="likes" ? 'selected':'' ?>>most liked</option>
          <option value="unliked" <?php echo $_GET['sortby']=="unliked" ? 'selected':'' ?>>less liked</option>
        </select>
        <input type="hidden" value="1" name="page">
        <input type="submit">
        </form></h1>

        <h2>Related / <span>28</span> matches found</h2>
        <p> <strong>Comics</strong> found for categories: <span>Comics, heroes, fantastic</span></p>
      </div>

        <div class="top-content">
        <section class="most-liked">
            <div class="boards-container">
            <?php
          $i = 0;
          foreach ($boards as $board):
          ?>
            <!-- Single board 1 -->
            <a href="board/<?php echo $board->id ?>" class="single-board-home">
              <div class="board-hover">
                <h3><?php echo $board->name ?></h3>
                <p><?php echo $board->author ?></p>
                <em> <i class="flaticon-right11"></i>
                  <?php foreach ($categories[$i] as $cate): ?>
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
      </section>
    </div>

	  </div>
	</div>
  <script type="text/javascript" src="dist/assets/scripts/main.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/actionMenu.js"></script>
</body>
</html>
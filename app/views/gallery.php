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

  <?php
  include('partials/search-popup.php');
  ?>
  <?php
  include('partials/categories-popup.php');
  ?>
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
        <form action="" style="display: inline-block">
        I'm looking for projects in
        <select name="category" id="category-select">
          <option value="all">All</option>
          <?php foreach ($allCategories as $cat): ?>
            <option value="<?php echo $cat->id; ?>" <?php echo $cat->id==$_GET['category'] ? 'selected':'' ?>><?php echo $cat->name; ?></option>
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

        <?php
          foreach ($allCategories as $cat){
            if($cat->id==$_GET['category']){
              $currentCate = $cat->name;
            } else if ($_GET['category'] === "all") {
              $currentCate = "all";
            }
          }

        ?>

        <h2>Related / <span><?php echo $count ?></span> matches found</h2>
        <p> <strong>Comics</strong> found for categories: <span><?php echo $currentCate ?></span></p>
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
        Page
        <?php
          for ($i=1; $i <= $pageNumber; $i++) {
            echo "<a href='gallery?category=".$_GET['category']."&sortby=".$_GET['sortby']."&page=".$i."' style='display: inline-block;'>".$i."</a>";
          }
        ?>
      </section>
    </div>

	  </div>
	</div>
  <script type="text/javascript" src="dist/assets/scripts/main.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/actionMenu.js"></script>
</body>
</html>
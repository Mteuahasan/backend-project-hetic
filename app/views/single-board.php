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
  <link rel="stylesheet" type="text/css" href="./dist/assets/css/main.css">
</head>
<body>

  <nav>
    <h1 class="logo">Striply</h1>
    <ul class="menu">
      <li><a class="menu--active" href="home">Home</a></li>
      <li><a href="gallery">Gallery</a></li>
      <li><a href="contests">Contests</a></li>
      <li><a href="expos">Expos</a></li>
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
    <?php if(!isset($SESSION) || empty($SESSION)): ?>
        <ul>
          <li><a href="signin">Sign Up</a></li>
          <li><a href="login" class="btn-cta">Log In</a></li>
        </ul>
      <?php endif; ?>

  </nav>

  <section class="container-single-board">
    <div class="content-single-board">
      <h1><?php echo $board[0]->name ?></h1>
      by  <span class="author"><?php echo $board[0]->author ?></span>
      <span class="date"> - <?php echo $board[0]->date; ?></span>
      <?php foreach ($boardCategories as $categorie): ?>
        <span> - <a href="categories/<?php echo $categorie->id; ?>"><?php echo $categorie->name; ?></a></span>
      <?php endforeach; ?>
      <div class="tags">Tags:
          <span><?php echo $board[0]->tags; ?></span>
      </div>

      <div class="top-informations">
        <span class="likes"><span class="plus" style="font-size:28px">+</span><span class="likes-number"><?php echo $board[0]->likes ? $board[0]->likes : '0' ?></span><span class="minus" style="font-size:28px">-</span></span>
        <span class="social-share">
          <span class="facebook-share">Facebook</span>
          <span class="twitter-share">Twitter</span>
        </span>
      </div>



      <div class="content-description">
        <?php echo $board[0]->description ?>
      </div>


      <div class="container-imgs">
        <?php if(!empty($board[0]->filepath)): ?>
        <img src="<?php echo $board[0]->filepath; ?>" alt="<?php echo $board[0]->name ?>">
        <?php endif; ?>
        <?php if(!empty($board[0]->filepath2)): ?>
        <img src="<?php echo $board[0]->filepath2; ?>" alt="<?php echo $board[0]->name ?>">
        <?php endif; ?>
        <?php if(!empty($board[0]->filepath3)): ?>
        <img src="<?php echo $board[0]->filepath3; ?>" alt="<?php echo $board[0]->name ?>">
        <?php endif; ?>
        <?php if(!empty($board[0]->filepath4)): ?>
        <img src="<?php echo $board[0]->filepath4; ?>" alt="<?php echo $board[0]->name ?>">
        <?php endif; ?>
        <?php if(!empty($board[0]->filepath5)): ?>
        <img src="<?php echo $board[0]->filepath5; ?>" alt="<?php echo $board[0]->name ?>">
        <?php endif; ?>
      </div>


      <?php
      $f3 = \Base::instance();
      $session = $f3->get('SESSION');
      if(!empty($session)):
      ?>
      <div class="post-comments">
        <h2>Comments</h2>
        <form enctype="multipart/form-data" action="board/<?php echo $board[0]->id ?>/new-comment" method="post">
          <textarea name="description" id="comment-content" cols="30" rows="10"></textarea>
          <input type="submit" value="Submit comment" class="submit-comment">
        </form>
      </div>
      <?php endif; ?>
        <div class="display-comments">
          <?php foreach ($comments as $comment): ?>
            <div class="single-comment" style="border: 1px solid black; width: 100px; margin: 20px 20px">
              <div class="author-comment"><?php echo $comment->author; ?></div>
              <div class="content-comment"><?php echo $comment->content; ?></div>
              <div class="date-comment"><?php echo $comment->date; ?></div>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
  </section>


  <script type="text/javascript" src="dist/assets/scripts/board.js"></script>
</body>
</html>
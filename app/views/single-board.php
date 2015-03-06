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
  <?php
  include('partials/nav.php');
  ?>

  <section class="container-single-board">
    <div class="content-single-board">
      <div class="top-informations">
        <h1><?php echo $board[0]->name ?></h1>
        by  <span class="author"><?php echo $board[0]->author ?></span>
        <span class="date"> - <?php echo $board[0]->date; ?></span>
        <?php foreach ($boardCategories as $categorie): ?>
          <span> - in <a href="category/<?php echo $categorie->id; ?>/1" style="color:#00b3c6;"><?php echo $categorie->name; ?></a></span>
        <?php endforeach; ?>
        <div class="tags">Tags:
            <span><?php echo $board[0]->tags; ?></span>,
        </div>

        <div class="banner">
          <span class="likes-number"><i class="flaticon-label36"></i><?php echo $board[0]->likes ? $board[0]->likes : '0' ?></span>
          <span class="comments-number"><i class="flaticon-comment21"></i><?php echo $board[0]->likes ? $board[0]->likes : '0' ?></span>
          <span class="likes"><span class="plus flaticon-like29"></span><span class="minus flaticon-dont2"></span></span>
          <!-- <span class="flaticon-flag86"></span> -->
          <span class="social-share">
            <a href="https://www.facebook.com/sharer/sharer.php?u=http://http://striply.fr//" class="facebook-share flaticon-facebook51" onclick="open('https://www.facebook.com/sharer/sharer.php?u=http://striply.fr/', 'Popup', 'scrollbars=1,resizable=1, height=360,width=570, display=block, margin=0 auto, position=relative');return false;"></a>
            <a href="https://twitter.com/share//http://striply.fr/" class="twitter-share flaticon-twitter44" onclick="open('https://twitter.com/share?url=http://striply.fr/&text=Discover the social network of comics&hashtags=striply,cartoons, comics', 'Popup', 'scrollbars=1,resizable=1,height=360,width=570, display=block');return false;"></a>
          </span>
        </div>
      </div>

      <div class="single-strip">
        <div class="content-description">
          <?php echo $board[0]->description ?>
        </div>

        <div class="container-imgs">
          <i class="flaticon-arrows115"></i>
          <?php if(!empty($board[0]->filepath)): ?>
          <i class="flaticon-arrows115"></i>
          <img src="<?php echo $board[0]->filepath; ?>" alt="<?php echo $board[0]->name ?>">
          <?php endif; ?>
          <?php if(!empty($board[0]->filepath2)): ?>
          <i class="flaticon-arrows115"></i>
          <img src="<?php echo $board[0]->filepath2; ?>" alt="<?php echo $board[0]->name ?>">
          <?php endif; ?>
          <?php if(!empty($board[0]->filepath3)): ?>
          <i class="flaticon-arrows115"></i>
          <img src="<?php echo $board[0]->filepath3; ?>" alt="<?php echo $board[0]->name ?>">
          <?php endif; ?>
          <?php if(!empty($board[0]->filepath4)): ?>
          <i class="flaticon-arrows115"></i>
          <img src="<?php echo $board[0]->filepath4; ?>" alt="<?php echo $board[0]->name ?>">
          <?php endif; ?>
          <?php if(!empty($board[0]->filepath5)): ?>
          <i class="flaticon-arrows115"></i>
          <img src="<?php echo $board[0]->filepath5; ?>" alt="<?php echo $board[0]->name ?>">
          <?php endif; ?>
        </div>


        <?php
        $f3 = \Base::instance();
        $session = $f3->get('SESSION');
        if(!empty($session)):
        ?>
        <div class="post-comments">
          <h3>Discuss about this strip</h3>
          <form enctype="multipart/form-data" action="board/<?php echo $board[0]->id ?>/new-comment" method="post">
            <textarea name="description" id="comment-content" cols="30" rows="10"></textarea>
            <em>Characters left : <span>800</span></em>
            <input type="submit" value="Submit comment" class="submit-comment btn-cta">
          </form>
        </div>
        <?php endif; ?>
          <div class="display-comments">
            <?php foreach ($comments as $comment): ?>
              <div class="single-comment">
                <div class="author-comment"><?php echo $comment->author; ?></div>
                <div class="content-comment"><?php echo $comment->content; ?></div>
                <div class="date-comment">About <?php echo $comment->date; ?> ago</div>
              </div>
            <?php endforeach; ?>
          </div>

      </div>
    </div>
  </section>


  <script type="text/javascript" src="dist/assets/scripts/board.js"></script>
</body>
</html>
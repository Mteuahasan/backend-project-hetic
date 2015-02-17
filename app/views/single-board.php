<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Striply</title>
  <meta name="description" content="">
  <base href="<?php echo $BASE; ?>/" />
  <meta name="viewport" content="width=device-width,initial-scale=1">

</head>
<body>
  <header>

  </header>
  <section>
    <h1><?php echo $board[0]->name ?></h1>

    <div class="content">
      <?php echo $board[0]->description ?>
    </div>

    <div class="author">
      <i><?php echo $board[0]->author ?></i>
    </div>

    <ul class="categories">
      <?php foreach ($boardCategories as $categorie): ?>
          <li>
          <?php echo $categorie->name; ?>
          </li>
      <?php endforeach; ?>
    </ul>

    <?php if(!empty($board[0]->filepath)): ?>
    <img src="<?php echo $board[0]->filepath; ?>" alt="<?php echo $board[0]->name ?>">
    <?php endif; ?>

    <div class="date">
      <?php echo $board[0]->date; ?>
    </div>

    <div class="tags"><?php echo $board[0]->tags; ?></div>

    <div class="likes"><span class="plus" style="font-size:28px">+</span><span class="likes-number"><?php echo $board[0]->likes ? $board[0]->likes : '0' ?></span><span class="minus" style="font-size:28px">-</span></div>
  </section>

  <?php
  $f3 = \Base::instance();
  echo "<pre>";
  var_dump($f3->get('SESSION'));
  echo "</pre>";
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
    <?php
      foreach ($comments as $comment):
    ?>
      <div class="single-comment" style="border: 1px solid black; width: 100px; margin: 20px 20px">
        <div class="author-comment"><?php echo $comment->author; ?></div>
        <div class="content-comment"><?php echo $comment->content; ?></div>
        <div class="date-comment"><?php echo $comment->date; ?></div>
      </div>
    <?php
      endforeach;
    ?>
  </div>

  <script type="text/javascript" src="public/scripts/board.js"></script>
</body>
</html>
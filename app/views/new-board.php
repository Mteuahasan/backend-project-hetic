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
  <link rel="stylesheet" type="text/css" href="./dist/assets/css/medium-editor.min.css">
  <link rel="stylesheet" type="text/css" href="./dist/assets/css/flat.min.css">

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

  <div class="main-container">
    <div class="contain-form">
      <form enctype="multipart/form-data" action="new-board" method="post">
        <input type="text" name="name" placeholder="Add a title">
        <?php foreach ($categories as $categorie): ?>
          <input type="checkbox" name="categories[]" value="<?php echo $categorie->id ?>"><label for="<?php echo $categorie->slug ?>"><?php echo $categorie->name ?></label>
        <?php endforeach ?>
        <input type="text" name="tags" placeholder="Add tags">
        <hr style="width:100%; color:#AAA">
        <textarea name="description" id="board-description" cols="30" rows="10" placeholder="Write here the strip's description"></textarea>
        <input type="file" name="userfile">
        <input type="file" name="userfile2">
        <input type="file" name="userfile3">
        <input type="file" name="userfile4">
        <input type="file" name="userfile5">
        <input type="submit" value="Submit board">
      </form>
    </div>
  </div>

  <script type="text/javascript" src="dist/assets/scripts/medium-editor.min.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/new-board.js"></script>
</body>
</html>
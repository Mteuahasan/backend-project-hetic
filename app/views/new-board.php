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
  include('partials/nav.php');
  ?>

  <div class="main-container">
    <div class="contain-form">
      <form enctype="multipart/form-data" action="new-board" method="post">
        <input type="text" name="name" placeholder="Add a title">
        <h1>Add 3 categories</h1>
        <?php foreach ($categories as $categorie): ?>
          <input type="checkbox" name="categories[]" value="<?php echo $categorie->id ?>" id="<?php echo $categorie->slug ?>"><label for="<?php echo $categorie->slug ?>"><?php echo $categorie->name ?></label>
        <?php endforeach ?>
        <input type="text" name="tags" placeholder="Add tags">
        <hr style="width:100%; color:##9b9a9a; margin-bottom:20px;">
        <textarea name="description" id="board-description" cols="30" rows="10" placeholder="Write here your description"></textarea>
        <div class="btn--file-upload">
          <span>Add a strip</span>
          <input type="file" name="userfile" class="input-file">
        </div>
        <div class="btn--file-upload">
          <span>Add a strip</span>
          <input type="file" name="userfile2" class="input-file">
        </div>
        <div class="btn--file-upload">
          <span>Add a strip</span>
          <input type="file" name="userfile3" class="input-file">
        </div>
        <div class="btn--file-upload">
          <span>Add a strip</span>
          <input type="file" name="userfile4" class="input-file">
        </div>


        <input type="file" name="userfile5" class="input-file">
        <input type="submit" value="Submit board">
      </form>
    </div>
  </div>

  <script type="text/javascript" src="dist/assets/scripts/new-board.js"></script>
  <script type="text/javascript" src="public/script/home.js"></script>
</body>
</html>
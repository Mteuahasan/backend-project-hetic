<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Dpict</title>
  <meta name="description" content="">
  <base href="<?php echo $BASE; ?>/" />
  <meta name="viewport" content="width=device-width,initial-scale=1">

</head>
<body>
  <header>
  <form action="search/" method="post" id='search-form'>
    <input type="text" name="name" placeholder="Recherche" autocomplete="off" id="search-content"/>
  </form>
  </header>
  <section>
    <h1>Hello world</h1>
    <?php

    $f3=\Base::instance();

    if(isset($SESSION) && !empty($SESSION)){
      echo "Salut ".$SESSION['name'];
    }


    ?>
    <br/>

    <?php if(isset($SESSION) && !empty($SESSION)): ?>
      <a href="logout">Logout</a>
      <a href="new-board">New Board</a>
    <?php endif; ?>

    <?php if(!isset($SESSION) || empty($SESSION)): ?>
      <a href="signin">Signin</a><br />
      <a href="login">Login</a><br/>
    <?php endif; ?>

    <?php require('partials/homeBoards.php'); ?>

  </section>
  <script type="text/javascript" src="public/scripts/main.js"></script>
</body>
</html>
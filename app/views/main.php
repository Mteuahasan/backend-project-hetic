<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Dpict</title>
  <meta name="description" content="">
  <base href="<?php echo $BASE; ?>/" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700|Arapey" rel="stylesheet" type="text/css" />
  <link href="public/stylesheet/style.css" rel="stylesheet" type="text/css" />
  <link href="public/stylesheet/mfglabs_iconset.css" rel="stylesheet"  type="text/css" />
  <link href="public/stylesheet/wtfay.css" rel="stylesheet" type="text/css" />

</head>
<body>
  <header>

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
      <a href="user/<?php echo $f3->get('SESSION.id') ?>">View Profil</a>
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
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Striply</title>
  <meta name="description" content="">
  <base href="<?php echo $BASE; ?>/" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700|Arapey" rel="stylesheet" type="text/css" />
  <link href="public/stylesheet/style.css" rel="stylesheet" type="text/css" />
  <link href="public/stylesheet/mfglabs_iconset.css" rel="stylesheet"  type="text/css" />
  <link href="public/stylesheet/wtfay.css" rel="stylesheet" type="text/css" />

</head>
<body>

  <?php
  $f3 = \Base::instance();
  echo "<pre>";
  var_dump($f3->get('error_permissions'));
  echo "</pre>";
  if(!empty($f3->get('error_permissions')) && $f3->get('error_permissions')):

  ?>

  Attention, vous devez vous inscrire pour accéder à cette page

  <?php endif; ?>

  <h1>Signin</h1>
  <form action="signin" method="POST">
    <label for="name">Nom</label><input type="text" name="name" id="signin-name">
    <label for="email">Email</label><input type="email" name="email" id="signin-email">
    <label for="password">Password</label><input type="password" name="password">
    <label for="password-2">Repeat password</label><input type="password" name="password-2">
    <input type="submit" value="Signin">
  </form>

  <script type="text/javascript" src="public/scripts/signin.js"></script>
</body>
</html>
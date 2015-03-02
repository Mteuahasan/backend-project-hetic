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
  <div class="landing container">
  	<h1 class='logo'>Striply</h1>
  	<div class="content-landing">
  		<p class="subtitle">Comics creators have Their place now</p>
  		<p class="title">Welcome to Striply</p>

  		<a href="signup" class="btn-members">
        <span></span>
  			<div class="btn-members--content">Become a cartoonist member</div>

        <?php 
          $count = 0;
          foreach ($allUsers as $allUser) {
            $count++;
          }
        ?>
  			<div class="btn-members--nbr"><?php echo $count ?></div>
  		</a>
      <div class="btn-start">
  		  <a href="home">Discover the site</a>
        <div class="ease"></div>
      </div>

  	</div>
  </div>
</body>
</html>
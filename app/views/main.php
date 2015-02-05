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

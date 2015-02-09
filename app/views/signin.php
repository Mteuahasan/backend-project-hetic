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
<form action="#" method="post">
  <label for="name">Nom</label><input type="text" name="name">
  <label for="email">Email</label><input type="email" name="email">
  <label for="password">Password</label><input type="password" name="password">
  <label for="password-2">Repeat password</label><input type="password" name="password-2">
  <input type="submit" value="Signin">
</form>
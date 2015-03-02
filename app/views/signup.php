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

  <section class="page-register">
    <div class="signup">
    <?php
      $f3 = \Base::instance();
      echo "<pre>";
      var_dump($f3->get('error_permissions'));
      echo "</pre>";
      if(!empty($f3->get('error_permissions')) && $f3->get('error_permissions')):
    ?>

    Attention, vous devez vous inscrire pour accéder à cette page

    <?php endif; ?>
      <h1><i class="flaticon-user148"></i>Sign Up</h1>
      <form action="signup" method="POST" class="ac-custom ac-checkbox ac-checkmark">
        <!-- NAME -->
        <span class="input input--kaede">
          <input class="input__field input__field--kaede" type="text" id="input-3" name="name"/>
          <label class="input__label input__label--kaede" for="input-3">
            <span class="input__label-content input__label-content--kaede">Name</span>
          </label>
        </span>
        <!-- SURNAME -->
        <span class="input input--kaede">
          <input class="input__field input__field--kaede" type="text" id="input-4" name="surname"/>
          <label class="input__label input__label--kaede" for="input-4">
            <span class="input__label-content input__label-content--kaede">Surname</span>
          </label>
        </span>

        <!-- EMAIL -->
        <span class="input input--kaede">
          <input class="input__field input__field--kaede" type="email" id="input-1" name="email"/>
          <label class="input__label input__label--kaede" for="input-1">
            <span class="input__label-content input__label-content--kaede">Email</span>
          </label>
        </span>

        <!-- PASSWORD -->
        <span class="input input--kaede">
          <input class="input__field input__field--kaede" type="password" id="input-2" name="password"/>
          <label class="input__label input__label--kaede" for="input-2">
            <span class="input__label-content input__label-content--kaede">Password</span>
          </label>
        </span>

        <!-- REPEAT PASSWORD -->
        <!-- <label for="password-2">Repeat password</label><input type="password" name="password-2"> -->
        <span class="input input--kaede">
          <input class="input__field input__field--kaede" type="password" id="input-5" name="password-2"/>
          <label class="input__label input__label--kaede" for="input-5">
            <span class="input__label-content input__label-content--kaede">Repeat password</span>
          </label>
        </span>

        <ul class="btn-login-signup">
          <li><a href="login">Log In</a></li>
          <li><span></span><input type="submit" value="Register"></li>
        </ul>
      </form>
    </div>

  </section>

  <script type="text/javascript" src="dist/assets/scripts/signup.js"></script>
  <script type="text/javascript" src="dist/assets/scripts/register.js"></script>
</body>
</html>
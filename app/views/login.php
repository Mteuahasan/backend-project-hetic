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
		<div class="login">
			<h1><i class="flaticon-user148"></i>Log In</h1>
			<form action="" method="post" class="ac-custom ac-checkbox ac-checkmark">
			 	<!-- <label for="email"></label><input type="email" name="email" placeholder="Login"> -->
			 	<span class="input input--kaede">
					<input class="input__field input__field--kaede" type="email" id="input-1" name="email"/>
					<label class="input__label input__label--kaede" for="input-1">
						<span class="input__label-content input__label-content--kaede">Email</span>
					</label>
				</span>

			 	<!-- <label for="password"></label><input type="password" name="password" placeholder=""> -->
			 	<span class="input input--kaede">
					<input class="input__field input__field--kaede" type="password" id="input-2" name="password"/>
					<label class="input__label input__label--kaede" for="input-2">
						<span class="input__label-content input__label-content--kaede">Password</span>
					</label>
				</span>
				<ul class="btn-login-signup">
					<li><input type="submit" value="Log In"></li>
					<li><a href="signup">Sign Up</a></li>
				</ul>
				<em><a href="#">Forgot password?</a></em>
			</form>
		</div>
	</section>

	<script type="text/javascript" src="dist/assets/scripts/signup.js"></script>
	<script type="text/javascript" src="dist/assets/scripts/register.js"></script>
</body>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Account change</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

 <!-- Test connexion à la base de données -->
 <?php
 try
 {
   $bdd = new PDO('mysql:host=localhost;dbname=odp_site;charset=utf8', 'root', '');
 } catch (PDOException $e) {
   die('Erreur lors de la connexion :' .$e->getMessage());
 }
 ?>

<!-- Header -->
<header class="header">
  <div class="container">
    <a href="index.php">Return to home</a>
    <ul>
      <li><a href="login-ad_form.php">Admin</a></li>
    </ul>
  </div>
</header>
<!-- End -->

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form method="POST" action="modify-account.php" class="login100-form validate-form">
					<span class="login100-form-title p-b-40">

					</span>

					<div class="text-center p-t-55 p-b-30">
						<span class="txt1">
							Account information change
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your name">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter your lastname">
						<input class="input100" type="text" name="lastname" placeholder="Lastname">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

          <div class="text-center p-t-55 p-b-30">
            <span class="txt2">
              Want to change password ?
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter old password">
            <span class="btn-show-pass">
              <i class="fa fa fa-eye"></i>
            </span>
            <input class="input100" type="password" name="old_pass" placeholder="Password">
            <span class="focus-input100"></span>
          </div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter new password">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

          <div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter new password again">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="checkpass" placeholder="Password confirmation">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							OK ! Lest's go !
						</button>
					</div>

					<div class="flex-col-c p-t-224">
						<span class="txt2 p-b-10">
							Already have an account?
						</span>

						<a href="login_form.php" class="txt3 bo1 hov1">
							Login now
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

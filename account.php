<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>My account</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="The Venue template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link href="plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="plugins/jquery-timepicker/jquery.timepicker.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

	<!-- Test connexion à la base de données -->
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=odp_site;charset=utf8', 'root', '');
	} catch (PDOException $e) {
		die('Erreur lors de la connexion :' .$e->getMessage());
	}
	 ?>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo">
							<a href="index.php">
								<div>The Venue</div>
								<div>restaurant</div>
							</a>
						</div>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<?php if(empty($_SESSION)) {?>
								<li><a href="index.php">home</a></li>
								<li><a href="about.php">about us</a></li>
								<li><a href="menu.php">menu</a></li>
								<li><a href="#">delivery</a></li>
								<li><a href="blog.php">blog</a></li>
								<li><a href="contact.php">contact</a></li>
								<li><a href="login_form.php">login</a></li>
							<?php }
								 if(isset($_SESSION['email'])) {?>
									 <li><a href="index.php">home</a></li>
									 <li><a href="about.php">about us</a></li>
									 <li><a href="menu.php">menu</a></li>
									 <li><a href="contact.php">contact</a></li>
									 <li><a href="account.php">my account</a></li>
									 <li><a href="log-out.php">Log out</a></li>
								 <?php } ?>
							</ul>
						</nav>
						<div class="reservations_phone ml-auto">Reservations: +34 586 778 8892</div>
					</div>
				</div>
			</div>
		</div>
	</header>

  <!-- Hamburger -->

	<div class="hamburger_bar trans_400 d-flex flex-row align-items-center justify-content-start">
		<div class="hamburger">
			<div class="menu_toggle d-flex flex-row align-items-center justify-content-start">
				<span>menu</span>
				<div class="hamburger_container">
					<div class="menu_hamburger">
						<div class="line_1 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
						<div class="line_2 hamburger_lines" style="visibility: inherit; opacity: 1;"></div>
						<div class="line_3 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Menu -->

	<div class="menu trans_800">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<ul>
				<?php if(empty($_SESSION)) {?>
				<li><a href="index.php">home</a></li>
				<li><a href="about.php">about us</a></li>
				<li><a href="menu.php">menu</a></li>
				<li><a href="#">delivery</a></li>
				<li><a href="blog.php">blog</a></li>
				<li><a href="contact.php">contact</a></li>
				<li><a href="login_form.php">login</a></li>
			<?php }
			if(isset($_SESSION['email'])) {?>
			<li><a href="index.php">home</a></li>
			<li><a href="about.php">about us</a></li>
			<li><a href="menu.php">menu</a></li>
			<li><a href="contact.php">contact</a></li>
			<li><a href="account.php">my account</a></li>
			<li><a href="log-out.php">Log out</a></li>
		<?php } ?>
			</ul>
		</div>
		<div class="menu_reservations_phone ml-auto">Reservations: +34 586 778 8892</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/contact.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_subtitle page_subtitle">The Venue</div>
							<div class="home_title"><h1>My account</h1></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Account info -->

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="contact_title">Account information</div><br/>
					<div class="contact_text">
            <div class="text">Informations personnelles</div>
						<?php
						$req = $bdd->prepare('SELECT name, lastname, email FROM compte WHERE email=:email');
						$req->execute(array(
							$_SESSION['name'],
							$_SESSION['lastname'],
							$_SESSION['email']
						));
						$data = $req->fetchall();
						foreach($data as $value)
						{
							echo '<tr>
							       <td>'.$value['name'].'</td>
										 <td>'.$value['lastname'].'</td>
										 <td>'.$value['email'].'</td>
							      </tr>';
						}
							?>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus. Ut non justo eleifend, facilisis nibh ut, interdum odio. Suspendisse potenti.</p>
						<p><a href="modify-account_form.php">Want to modify ? Click here !</a></p>
					</div>
				</div>
				<div class="col-xl-5 col-lg-6">
					<div class="contact_list_container d-flex flex-column align-items-lg-center justify-content-start">
						<div class="contact_list_content">
							<ul class="contact_list">
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Address</div></div>
									<div>1481 Creekside Lane Avila Beach, CA 931</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Phone</div></div>
									<div>+53 345 7953 324</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>E-mail</div></div>
									<div>yourmail@gmail.com</div>
								</li>
							</ul>
							<div class="contact_social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row google_map_row">
				<div class="col">

					<!-- Contact Map -->

					<div class="contact_map">

						<!-- Google Map -->

						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2508.283479465823!2d-114.08416778417909!3d51.04785325201946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53716fa8c950fe47%3A0x5357045e7e4a1073!2sKorean%20Fried%20%26%20Bbq%20Chicken!5e0!3m2!1sfr!2sfr!4v1593523952993!5m2!1sfr!2sfr" width="1100" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
									<div id="map"></div>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Reservations -->

	<div class="reservations text-center">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/reservations.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="reservations_content d-flex flex-column align-items-center justify-content-center">
						<?php if(isset($_SESSION['email'])) {?>
						<div class="res_stars page_subtitle">5 Stars</div>
						<div class="res_title">Make a Reservation</div>
						<div class="res_form_container">
							<form method="POST" action="booktable.php" id="res_form" class="res_form">
								<div class="d-flex flex-sm-row flex-column align-items-center justify-content-start">
									<input type="text" id="datepicker" class="res_input" required="required">
									<input type="text" class="res_input timepicker" required="required">
									<select class="res_select">
										<option disabled="" selected="">2 person</option>
										<option>3 person</option>
										<option>4 person</option>
										<option>5 person</option>
										<option>6 person</option>
										<option>7 persson</option>
									</select>
								</div>
								<button class="res_button">Make a Reservation</button>
							</form>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- Footer Logo -->
				<div class="col-lg-3 footer_col">
					<div class="footer_logo">
						<div class="footer_logo_title">The Venue</div>
						<div class="footer_logo_subtitle">restaurant</div>
					</div>
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<p style="line-height: 1.2;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
				</div>

				<!-- Footer About -->
				<div class="col-lg-6 footer_col">
					<div class="footer_about">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus. Ut non justo eleifend, facilisis nibh ut, interdum odio.</p>
					</div>
				</div>

				<!-- Footer Contact -->
				<div class="col-lg-3 footer_col">
					<div class="footer_contact">
						<ul>
							<li class="d-flex flex-row align-items-start justify-content-start">
								<div><div class="footer_contact_title">Address:</div></div>
								<div class="footer_contact_text">481 Creekside Lane Avila CA 93424</div>
							</li>
							<li class="d-flex flex-row align-items-start justify-content-start">
								<div><div class="footer_contact_title">Address:</div></div>
								<div class="footer_contact_text">+53 345 7953 32453</div>
							</li>
							<li class="d-flex flex-row align-items-start justify-content-start">
								<div><div class="footer_contact_title">Address:</div></div>
								<div class="footer_contact_text">yourmail@gmail</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/jquery-datepicker/jquery-ui.js"></script>
<script src="plugins/jquery-timepicker/jquery.timepicker.js"></script>
<script src="js/contact.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Perfil - AEI </title>
	<meta charset="UTF-8">
	<meta name="description" content="Unica University Template">
	<meta name="keywords" content="event, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="../img/logo-AEI" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/themify-icons.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.css"/>
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/estilos.scss"/>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<?php
		include "../sesiones.php";
		$host="localhost";
    $user="postgres";
    $pass="123456";
    $dbname="postgres";
    $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

    if (!$dbconn) {
      echo "Ocurrió un error con la conexion .\n";
      exit;
    }

		$usuario = $_SESSION['usuario'];
	?>

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a href="perfil.php" class="site-logo"><img src="../img/alfabetizacion.png" alt=""></a>
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-info">
				<form class="newsletter" action= "logout.php">
					<button class="site-btn">Cerrar Sesión</button>
				</form>
			</div>
		</div>
	</header>
	<!-- header section end-->


	<!-- Header section  -->
	<nav class="nav-section">
		<div class="container">
			<ul class="main-menu">
				<li class="active"><a href="perfil.php">Inicio</a></li>
				<li><a href="../modulos.php">Curso</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header section end -->


	<div class="section-title text-center">
		<br>
		<br>
		<h3>BIENVENIDO</h3>
		<?php
			$sql_dpi = "SELECT nombre FROM usuario WHERE usuario = '$usuario'";
			$result = pg_query($dbconn, $sql_dpi);
			if (!$result) {
				echo "Ocurrió un error con query (Archivo: perfil.php, nombre).\n";
				exit;
			}

			$row1 = pg_fetch_array($result);
			$nombre = $row1['nombre'];
		?>
		<p><?php echo $nombre ?></p>
	</div>
	<!--
	########################################################### LINEA DE TIEMPO ############################################################################
-->
			<center>
				<img src='../img/services-icons/usuario.png' class='imgRedondaBig'/>
			</center>
	<!--
	########################################################################################################################################################
	-->
<br>
<br>


<!-- Footer section -->
<footer class="footer-section">
	<div class="container footer-top">
		<div class="row">
			<!-- widget -->
			<div class="col-sm-6 col-lg-3 footer-widget">
				<div class="about-widget">
					<img src="../img/logo-AEI.png" alt="">
					<div class="social pt-1">
						<a href="https://twitter.com/leiusa"><i class="fa fa-twitter-square"></i></a>
						<a href="https://www.facebook.com/LEIUSA"><i class="fa fa-facebook-square"></i></a>
						<a href="https://www.instagram.com/literacy_evangelism/"><i class="fa fa-camera-retro"></i></a>
					</div>
				</div>
			</div>
			<!-- widget -->
			<div class="col-sm-6 col-lg-3 footer-widget">
				<h6 class="fw-title">LINKS ÚTILES</h6>
				<div class="dobule-link">
					<ul>
						<li><a href="perfil.php">Inicio</a></li>
						<li><a href="../modulos.php">Curso</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			&copy;<script>document.write(new Date().getFullYear());</script> Literacy & Evangelism International
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
		</div>
	</div>
</footer>
<!-- Footer section end-->



	<!--====== Javascripts & Jquery ======-->
	<script src="../js/timeline.js"></script>
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.countdown.js"></script>
	<script src="../js/masonry.pkgd.min.js"></script>
	<script src="../js/magnific-popup.min.js"></script>
	<script src="../js/main.js"></script>

</body>
</html>

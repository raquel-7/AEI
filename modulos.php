<!DOCTYPE html>
<html lang="en">
<head>
	<title>Módulos - AEI</title>
	<meta charset="UTF-8">
	<meta name="description" content="Unica University Template">
	<meta name="keywords" content="event, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/logo-AEI" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/themify-icons.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<?php
		include "sesiones.php";
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
			<a href="usuario/perfil.php" class="site-logo"><img src="img/alfabetizacion.png" alt=""></a>
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<div class="header-info">
				<form class="newsletter" action= "usuario/logout.php">
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
				<li><a href="usuario/perfil.php">Inicio</a></li>
				<li class="active"><a href="modulos.php">Curso</a></li>
				<li><a href="usuario/faq.php">Preguntas</a></li>
				<li><a href="usuario/material.php">Material y Libros</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header section end -->


	<!-- Breadcrumb section -->
	<div class="site-breadcrumb">
		<div class="container">

		</div>
	</div>
	<!-- Breadcrumb section end -->

	<?php
		$sql_grupo = "SELECT * FROM modulo";
		$result = pg_query($dbconn, $sql_grupo);
		if (!$result) {
			echo "Ocurrió un error con query (modulos.php).\n";
			exit;
		}
	?>


	<!-- Courses section -->
	<section class="full-courses-section spad pt-0">
		<div class="container">
			<div class="row">
				<?php
				while ($row2 = pg_fetch_array($result)) {
					$idmod = $row2['idmod'];
					$titulo = $row2['titulo'];
					$descripcion = $row2['descripcion'];
					$imagen = $row2['imagen'];
				?>
				<!-- course item -->
				<div class="col-lg-4 col-md-6 course-item">
					<div class="course-thumb">
						<img src=<?php echo $imagen?> alt="">
						<div class="course-cat">
							<a href="usuario/moduloUsuario.php?modulo=<?php echo $idmod ?>"><span>Ver</span></a>
						</div>
					</div>
					<div class="course-info">
						<h4>Módulo <?php echo $idmod ?> <br> <?php echo $titulo ?></h4>
					</div>
				</div>
				<?php
				}
				?>

	</section>
	<!-- Courses section end-->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.countdown.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>

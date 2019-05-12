<!DOCTYPE html>
<html lang="en">
<head>
	<title>Módulo 1 - AEI</title>
	<meta charset="UTF-8">
	<meta name="description" content="Unica University Template">
	<meta name="keywords" content="event, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="../img/logo-AEI" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../css/themify-icons.css"/>
	<link rel="stylesheet" href="../css/owl.carousel.css"/>
	<link rel="stylesheet" href="../css/style.css"/>


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
		$modulo = $_GET['modulo'];
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
				<li><a href="perfil.php">Home</a></li>
				<li class="active"><a href="../modulos.php">Curso</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header section end -->

	<div class="container">
		<img src="../img/modulo/modulo<?php echo $modulo?>.jpg">
	</div>

	<center>
		<br>
		<h2 class="hs-title">Contenido</h2>
		<br>
	</center>

	<?php
		$sql_lecciones = "SELECT * FROM Lecciones WHERE idmod = $modulo ORDER BY idl";
		$result = pg_query($dbconn, $sql_lecciones);
		if (!$result) {
			echo "Ocurrió un error con query (modulosUsuario.php, lecciones).\n";
			exit;
		}

		while ($row = pg_fetch_array($result)) {
			$titulo = $row['titulo'];
			$idl = $row['idl'];

			$sql_material = "SELECT * FROM material WHERE idl = $idl";
			$result2 = pg_query($dbconn, $sql_material);
			if (!$result2) {
				echo "Ocurrió un error con query (modulosUsuario.php, material).\n";
				exit;
			}
	?>

	<div class="container">
		<?php
			$row2 = pg_fetch_array($result2);
			$tipo = $row2['tipo'];

			if ($tipo === 'V') {
		?>
				<img src='../img/services-icons/video.png' class='imgRedonda'/>
		<?php
			}else if ($tipo === 'E') {
		?>
				<img src='../img/services-icons/lapiz.png' class='imgRedonda'/>
		<?php
			}else if($tipo === 'L'){
		?>
				<img src='../img/services-icons/libro.png' class='imgRedonda'/>
		<?php
			}
		?>
		<a href="leccion.php?modulo=<?php echo $modulo ?>&idl=<?php echo $idl ?>"><span>
			<div class="site-btn">
				<?php
					echo $titulo;
				?>
			</div>
		</span></a>
	</div>

	<br>
	<?php
		}
	?>

	<br>

	<!-- Newsletter section -->
	<section class="newsletter-section">

	</section>
	<!-- Newsletter section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.countdown.js"></script>
	<script src="../js/masonry.pkgd.min.js"></script>
	<script src="../js/magnific-popup.min.js"></script>
	<script src="../js/main.js"></script>

</body>
</html>

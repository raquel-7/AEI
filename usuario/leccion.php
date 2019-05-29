<!DOCTYPE html>
<html lang="en">
<head>
	<title>Leccion - AEI</title>
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
		$idl = $_GET['idl'];

		$disabled = "";

	?>

	<!-- Page Preloder-->
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
				<li><a href="perfil.php">Inicio</a></li>
				<li class="active"><a href="../modulos.php">Curso</a></li>
				<li><a href="faq.php">Preguntas</a></li>
				<li><a href="material.php">Material y Libros</a></li>
			</ul>
		</div>
	</nav>
	<!-- Header section end -->

	<br>

	<?php
		$sql_leccion = "SELECT Lecciones.titulo, Lecciones.contenido, Material.tipo, Material.secuencia, Material.url
										FROM Lecciones, Material
										WHERE Lecciones.idmod = $modulo AND Lecciones.idl = $idl AND Material.idl = $idl";

		$result = pg_query($dbconn, $sql_leccion);
		if (!$result) {
			echo "Ocurrió un error con query (leccion.php, leccion).\n";
			exit;
		}

		$row1 = pg_fetch_array($result);

		$titulo_leccion = $row1['titulo'];
		$contenido_leccion = $row1['contenido'];
		$tipo_material = $row1['tipo'];
		$secuencia_material = $row1['secuencia'];
		$url_material = $row1['url'];
	?>

	<!-- Breadcrumb section -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="moduloUsuario.php?modulo=<?php echo $modulo; ?>"><i class="fa fa-home"></i> Modulo</a> <i class="fa fa-angle-right"></i>
			<span>Leccion</span>
		</div>
	</div>
	<!-- Breadcrumb section end -->

	<!-- Blog page section  -->
	<div class="section-title text-center">
		<br>
		<h3><?php echo $titulo_leccion ?></h3>
	</div>

	<section class="blog-page-section spad pt-0">
		<div class="container">
			<div class="row">
					<div class="post-item">

						<!--
						<h5 class="pt-4">Objetivos</h5>
						<ul class="about-list">
							<i class="fa fa-check-square-o"></i> Aprender por qué estamos participando en la capacitación de maestros de AEI
							<br>
							<i class="fa fa-check-square-o"></i> Aprender sobre las situación actual de analfabetismo de nuestro país
							<br>
						</ul>
						<br>
					-->

						<p ALIGN="justify">
							<?php
								echo $contenido_leccion;
							?>
						</p>
						<br>

						<?php
							if ($tipo_material === 'V') {
						?>
							<video src="<?php echo $url_material; ?>" height="640" controls></video>
						<?php
							}else if($tipo_material === 'E'){

								if (isset($_POST['subir'])) {
									$comentario = $_POST['comentarios'];
									$sql_subir = "INSERT INTO Escritura VALUES('$usuario',$idl,$modulo,'$comentario')";
									$result_subir = pg_query($dbconn, $sql_subir);
									if (!$result_subir) {
										echo "Ocurrió un error con query (leccion.php, subir escritura).\n";
										exit;
									}
								}

								$sql_escritura = "SELECT * FROM Escritura	WHERE idmod = $modulo AND idl = $idl AND usuario = '$usuario'";
								$result_e = pg_query($dbconn, $sql_escritura);
								if (!$result_e) {
									echo "Ocurrió un error con query (leccion.php, escritura).\n";
									exit;
								}

								$num_rows = pg_num_rows($result_e);
								if ($num_rows == 0) {
									$disabled = "disabled";
									?>
									<form class="newsletter" action= "leccion.php?modulo=<?php echo $modulo;?>&idl=<?php echo $idl; ?>" method="post">
											<textarea name="comentarios" rows="10" cols="40"></textarea>
											<br>
											<br>
											<input type="submit" name="subir" value="Subir respuesta" class="site-btn">
									</form>
									<?php
								}else{
									$row_com = pg_fetch_array($result_e);
									$escri = $row_com['comentario'];
									echo $escri;
								}
						?>

						<?php
						}else if($tipo_material == 'I'){
						?>
								<img src=<?php echo $url_material?> alt="">
						<?php
						}else if($tipo_material == 'Q'){
								echo $url_material;
						}
						?>

					</div>

					<?php
					$sql_select = "SELECT * FROM Completado WHERE usuario = '$usuario' AND idl = $idl AND idmod = $modulo AND completado = 'completado'";
					$result_select = pg_query($dbconn, $sql_select);
					if (!$result_select) {
						echo "Ocurrió un error con query (leccion.php, insert).\n";
						exit;
					}

					$select_num_rows = pg_num_rows($result_select);
					if ($select_num_rows == 0) {
						?>
						<form class="newsletter" action= "completado.php?idl=<?php echo $idl; ?>&idmod=<?php echo $modulo; ?>" method="post">
								<input type="submit" name="completado" value="Completado" class="site-btn" <?php echo $disabled;?>>
						</form>
					<?php
					}
					?>

			</div>
		</div>
	</section>
	<!-- Blog page section end -->


	<!-- Newsletter section -->
	<section class="newsletter-section">

	</section>
	<!-- Newsletter section end -->


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
					<h6 class="fw-title">USEFUL LINK</h6>
					<div class="dobule-link">
						<ul>
							<li><a href="">Home</a></li>
							<li><a href="">About us</a></li>
							<li><a href="">Services</a></li>
							<li><a href="">Events</a></li>
							<li><a href="">Features</a></li>
						</ul>
						<ul>
							<li><a href="">Policy</a></li>
							<li><a href="">Term</a></li>
							<li><a href="">Help</a></li>
							<li><a href="">FAQs</a></li>
							<li><a href="">Site map</a></li>
						</ul>
					</div>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">CONTACT</h6>
					<ul class="contact">
						<li><p><i class="fa fa-map-marker"></i> 40 Baria Street 133/2, NewYork City,US</p></li>
						<li><p><i class="fa fa-phone"></i> (+88) 111 555 666</p></li>
						<li><p><i class="fa fa-envelope"></i> infodeercreative@gmail.com</p></li>
						<li><p><i class="fa fa-clock-o"></i> Monday - Friday, 08:00AM - 06:00 PM</p></li>
					</ul>
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
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.countdown.js"></script>
	<script src="../js/masonry.pkgd.min.js"></script>
	<script src="../js/magnific-popup.min.js"></script>
	<script src="../js/main.js"></script>

</body>
</html>

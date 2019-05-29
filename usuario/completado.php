<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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

    $usuario= $_SESSION['usuario'];
    $completado= $_POST['completado'];
    $idl = $_GET['idl'];
    $modulo = $_GET['idmod'];

			$sql_insert = "INSERT INTO Completado (usuario, idl, idmod, completado) VALUES('$usuario', $idl, $modulo, 'completado')";
			$result_insert = pg_query($dbconn, $sql_insert);
			if (!$result_insert) {
				echo "Ocurrió un error con query (completado.php, insert).\n";
				exit;
			}else{
      ?>
        <script type="text/javascript"> window.open("moduloUsuario.php?modulo=<?php echo $modulo;?>","_self");</script>
      <?php
      }

     ?>
  </body>
</html>

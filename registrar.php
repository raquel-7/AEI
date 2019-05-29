<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">

  .alert {
      padding: 20px;
      background-color: #f44336;
      color: white;
  }
  .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
  }

  .closebtn:hover {
      color: black;
  }
  </style>
  <body>
    <?php
    session_start();

    //include "../sesiones.php";
		$host="localhost";
    $user="postgres";
    $pass="123456";
    $dbname="postgres";
    $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

    if (!$dbconn) {
      echo "Ocurrió un error con la conexion .\n";
      exit;
    }
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    //$email = $_POST['email'];
    $passw = $_POST['contrasena'];
    $validateEmail = "SELECT * FROM usuario WHERE usuario='$usuario'";
    $emailcheckindb = pg_query($dbconn, $validateEmail);

    if(pg_num_rows($emailcheckindb) > 0){

      echo "<div class='alert'>";
       echo "<span class='closebtn' onclick='this.parentElement.style.display='none';''>&times;</span> ";
          echo "Ya existe una cuenta con este usuario";
         echo "</div>";
         echo '<script type="text/javascript"> window.open("inicio.php","_self");</script>';
    }else{

      $query = "INSERT INTO usuario (nombre, usuario, contrasena) VALUES ('$nombre', '$usuario' ,'$passw') ";
      $send = pg_query($dbconn, $query);
      if(!$send){
        echo "Error al enviar campos";
      }else {
        echo "Registrado!";
          echo '<script type="text/javascript"> window.open("index.html","_self");</script>';
      }
    }
     ?>


  </body>
</html>

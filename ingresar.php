<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();

    //include "sesiones.php";
    $host="localhost";
    $user="postgres";
    $pass="123456";
    $dbname="postgres";

    $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

    if (!$dbconn) {
      echo "Ocurrió un error con la conexion .\n";
      exit;
    }

    $usuario= $_POST['usuario'];
    $passw = $_POST['contrasena'];
    //$entrar = $_POST['entrar'];
    //$registro = $_POST['registro'];

    if (isset($_POST['registro'])) {
      echo '<script type="text/javascript"> window.open("index.html","_self");</script>';
    }

    /*echo "USUARIO:";
    echo $usuario;
    echo "CONTRASEÑA:";
    echo $passw;*/

    if ($usuario == "admin" && $passw == "123"){

          header('Location: modulos.html');

    }
    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contrasena = '$passw'";
    //print_r($r);
   $r = pg_query($dbconn, $sql);
    if (!$r) {
      echo "Ocurrió un error con query.\n";
      exit;
    }

   $login_check = pg_num_rows($r);
   #echo $login_check;

   if($login_check == 1){
         $_SESSION['usuario']=$usuario;
         echo '<script type="text/javascript"> window.open("usuario/perfil.php","_self");</script>';
         #echo $usuario;
       }else{
           echo "invalid UserName or Password";
           echo '<script type="text/javascript"> window.open("index.html","_self");</script>';
       }

     ?>
  </body>
</html>

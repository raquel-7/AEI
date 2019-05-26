<html>
    <head> <link rel='stylesheet' href='main.css'>
        <title>Proyecto</title>
        
    </head>
    <body>
   <center>
        <?php
            include 'funciones.php';
            $table = $_GET["tabla"];
            opcionesTabla($table);
        ?>
    </body>
    </center>
</html>

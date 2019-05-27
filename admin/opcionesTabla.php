<html>
    <head> <link rel='stylesheet' href='main.css'>
        <title>Proyecto</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
   <center>
        <?php
            include 'header.php';
            $table = $_GET["tabla"];
            opcionesTabla($table);
        ?>
    </body>
    </center>
</html>

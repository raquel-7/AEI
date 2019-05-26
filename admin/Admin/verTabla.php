<html>
    <head> <link rel='stylesheet' href='main.css'>
        <title>Proyecto</title>

    </head>

    <body>
    <!-- verTabla -->
    <center>

        <?php
            include 'funciones.php';
            $table = $_GET["tabla"];


                displayTable($table);



        ?>
    </center>


    </body>
</html>

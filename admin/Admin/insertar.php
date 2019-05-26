<html>
    <head> <link rel='stylesheet' href='main.css'>

    </head>
    <body>
        <!-- insertar -->
        <?php

            include 'funciones.php';

                insertarFila($_POST, $_FILES);

        ?>
        <a href="index.php">menu principal</a>
    </body>
</html>

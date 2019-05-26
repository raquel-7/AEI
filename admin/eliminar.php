<html>
    <head> <link rel='stylesheet' href='main.css'>
        <title>Proyecto</title>
    </head>
    <body>
        eliminar
        <?php 
            include 'funciones.php';
            switch($_GET['tabla']){
                case 'Alcalde':
                deleteAlcalde($_GET);
                break;
                case 'Presidencia':
                deletePresidencia($_GET);
                break;
                case 'Diputados':
                deleteDiputados($_GET);
                break;
                default:
                deleteFila($_GET); 
            }
     
            
        ?>
    </body>
</html>
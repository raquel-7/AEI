<html>
    <head> <link rel='stylesheet' href='main.css'>
        <title>Proyecto</title>

    </head>
    <style media="screen">

    th, td {
text-align: left;
padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
background-color: #f6783a;
color: white;
}
    </style>
    <body>
    <!-- verTabla -->
    <center>

        <?php
            include 'header.php';
            $table = $_GET["tabla"];


                displayTable($table);



        ?>
    </center>


    </body>
</html>

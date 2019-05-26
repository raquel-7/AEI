<html>
    <head> <link rel='stylesheet' href='main.css'>
        <title>Proyecto</title>
    </head>
    <style >

    @font-face {
    font-family: Harmony;
    src: url('img/icons/harmony.ttf')  format('truetype');
    }
    titulo {
      font-family: Harmony;
    }
    /*
    Basic input element using psuedo classes
    */
    .login {
      margin: 20px auto;
      width: 450px;
      padding: 30px 25px;
      background: white;


    }
    html,
    body {
      height: 100%;
    }
    body {

      font-family: Avenir;
      -webkit-text-size-adjust: 100%;
      -webkit-font-smoothing: antialiased;
    }

    .inp {
      position: relative;
      margin: auto;
      width: 100%;
      max-width: 500px;
    }
    .inp .label {
      position: absolute;
      top: 16px;
      left: 0;
      font-size: 16px;
      color: #9098a9;
      font-weight: 500;
      transform-origin: 0 0;
      transition: all 0.2s ease;
    }
    .inp .border {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 2px;
      width: 100%;
      background: #07f;
      transform: scaleX(0);
      transform-origin: 0 0;
      transition: all 0.15s ease;
    }
    .inp input {
      -webkit-appearance: none;
      width: 100%;
      border: 0;
      font-family: inherit;
      padding: 12px 0;
      height: 48px;
      font-size: 16px;
      font-weight: 500;
      border-bottom: 2px solid #c8ccd4;
      background: none;
      border-radius: 0;
      color: #223254;
      transition: all 0.15s ease;
    }
    .inp input:hover {
      background: rgba(34,50,84,0.03);
    }
    .inp input:not(:placeholder-shown) + span {
      color: #5a667f;
      transform: translateY(-26px) scale(0.75);
    }
    .inp input:focus {
      background: none;
      outline: none;
    }
    .inp input:focus + span {
      color: #07f;
      transform: translateY(-26px) scale(0.75);
    }
    .inp input:focus + span + .border {
      transform: scaleX(1);
    }
    </style>


    <body>
        modificar
        <?php
            include 'funciones.php';
                updateForm($_GET);


        ?>

                <script src="js/jquery-3.2.1.min.js"></script>
                <script src="js/owl.carousel.min.js"></script>
                <script src="js/jquery.countdown.js"></script>
                <script src="js/masonry.pkgd.min.js"></script>
                <script src="js/magnific-popup.min.js"></script>
                <script src="js/main.js"></script>
    </body>
</html>

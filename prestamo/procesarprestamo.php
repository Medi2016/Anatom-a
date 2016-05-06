<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Prestamos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/estilo.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <?php

        include('conexion.php');
            if(isset($_POST['articulo'])){

                
                $artSolicitados = $_POST['articulo'];
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $encargado = $_POST['encargado'];
                $cantidad = $_POST['cantidad'];
                $curso = $_POST['curso'];
                $usuario = $_POST['usuario'];


                $dsn = 'mysql:dbname=prueba;host=127.0.0.1';
                $user = 'root';
                $password = '';

                try {

                    $mbd = new PDO($dsn, $user, $password);

                } catch (PDOException $e) {

                    echo 'Fallo en la conexion PDO ' . $e->getMessage();

                }

        /*
                foreach($cantidad as $valor)
                {
                    echo "El " . $idArticulo . " es cantidad " . $valor."\n";
                

                    $sql = "INSERT INTO prestamo_articulo (PrestamoIdFK,ArticuloIdFK,RecibeArt,Cantidad) VALUES ('$prestamoActivo','$idArticulo','Ninguno','$cantidad') ";
                    if (!mysqli_query($conexion,$sql)) {
                        echo "Hubo un error al agregar uno de los artículos";
                       // die(mysqli_error($conexion));
                    }else{

                       
                    }
                    

                }*/
                /*
                foreach($artSolicitados as $idArticulo=>$valor)
                {
                    echo "El " . $idArticulo . " es " . $valor."\n";
                    echo "El " . $idArticulo . " su cantidad es " . $cantidad[$idArticulo]  ;
               
                    $sql = "INSERT INTO prestamo_articulo (PrestamoIdFK,ArticuloIdFK,RecibeArt,Cantidad) VALUES ('$prestamoActivo','$idArticulo','Ninguno','$cantidad') ";
                    if (!mysqli_query($conexion,$sql)) {
                        echo "Hubo un error al agregar uno de los artículos";
                       // die(mysqli_error($conexion));
                    }else{

                       
                    }
                    

                }*/

                

                try {  

                  $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $mbd->beginTransaction();
                            $sqlprestamo = "INSERT INTO prestamo (Fecha,Hora,Entrega,EstudianteIdFK,CursoIdFK) VALUES ('$fecha','$hora','$encargado','$usuario','$curso') ";

                                if ( ! $result = $conexion->query($sqlprestamo))
                                    {
                                    echo "<a href=index.html>Error al crear el prestamo</a>";
                                    printf("C
                                        onnect failed: %s\n", $conexion->error);

                                    }else{
                                        echo "<h1> Usted adquirió correctamente un préstamo </h1> <br>";
                                        $prestamoActivo=mysqli_insert_id($conexion);
                                        echo "Con el número de factura: ".$prestamoActivo;
                                                
                                            
                                            foreach($artSolicitados as $idArticulo=>$valor)
                                            {
                                                echo "El " . $idArticulo . " es " . $valor;


                                                $sql = "INSERT INTO prestamo_articulo (PrestamoIdFK,ArticuloIdFK,Recibe,Cantidad) VALUES ('$prestamoActivo','$idArticulo','Ninguno','$cantidad[$idArticulo]') ";
                                                if (!mysqli_query($conexion,$sql)) {
                                                    echo "Hubo un error al agregar uno de los artículos";
                                                   // die(mysqli_error($conexion));
                                                }else{

                                                   
                                                }
                                                

                                            }
                                    }

                  $mbd->commit();
                  
                } catch (Exception $e) {

                  $mbd->rollBack();
                  echo "Fallo la transcción " . $e->getMessage();

                }
            }else{

            echo "Debe selleccionar unarticulo ";
            }

    ?>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
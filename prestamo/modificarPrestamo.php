<?php
include('conexion.php');

?>


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
    <?php session_start(); ?>


    <?php if(isset($_SESSION['Admin'])){ ?>

    <?php
        $id = $_GET['idPrestamo'];
        $query = "SELECT * FROM prestamo_articulo WHERE PrestamoIdFK='$id' ";
        $resultado=$conexion -> query($query);
        echo $id;
    ?>
        <div class="container">
                <!-- Barra de navegación -->
                <div class="navbar-wrapper">
                  <div class="container">
                    <nav class="navbar navbar-inverse navbar-fixed-top">
                      <div class="container">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#"><?php echo "Bienvenido ".$_SESSION['Admin']; ?></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="home.php">Home</a></li>
                                <li><a href="misPrestamos.php">Mis prestamos</a></li>
                                <li><a href="prestamo.php">Solicitar préstamo</a></li>
                               
                            </ul>
                        <form class="navbar-form navbar-right">
                        <a href="cerrar.php" class="btn btn-primary" role ="button">Salir</a>
                        </form>

                        </div><!--/.navbar-collapse -->
                      </div>
                    </nav>
                  </div>
                </div> 
                <!-- Fin Barra de navegación -->  
                 <div class="table-responsive">
                    <table class="table table-striped">
                    <form ACTION="procesarModificacion.php" METHOD=POST class="navbar-form navbar-right">   
                        <thead>
                            <tr>
                                <td><b>Id</b></td>
                                <td><b>Artículo</b></td>
                                <td><b>Cantidad</b></td>
                                <td><b>Recibido</b></td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row=$resultado->fetch_assoc()){ ?>
                                <tr>
                                    <td>
                                        <?php echo $row['PrestamoIdFK'];
                                        $prestamo=$row['PrestamoIdFK'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['ArticuloIdFK'];
                                         $articulo=$row['ArticuloIdFK'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Cantidad'];?>
                                    </td>
                                    <td>
                                    
                                        <select name="<?php echo "recibido[$articulo]"; ?>" >
                                            <?php echo $row['Recibe'];?>
                                                <option value="<?php echo $row['Recibe']?>" selected ><?php echo $row['Recibe']?> (valor actual) </option>
                                                <option value="Alejandro">Alejandro</option>
                                                <option value="Francisco">Francisco</option>
                                                <option value="Mario">Mario</option>
                                                <option value="Ninguno">Ninguno</option>

                                        </select>


                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="idPrestamo" value="<?php echo "$id"; ?>">
                                      
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>





                 </div>

        </div>


     <?php   }else{

        header("Location: index.php");


      } ?>


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
<!DOCTYPE html>
<html lang="es">
<head>
   
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

    <?php if(isset($_SESSION['u_usuario'])){ ?>
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
                          <a class="navbar-brand" href="#"><?php echo "Bienvenido ".$_SESSION['u_usuario'];   ?></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="home.php">Home</a></li>
                                <li><a href="misPrestamos.php">Mis prestamos</a></li>
                                <li><a href="prestamo.php">Solicitar préstamo</a></li>
                                    <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Mi información</a></li>
                                                    <li><a href="#">Cambio de contraseña</a></li>

                                                </ul>
                                    </li>
                            
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
                 <h1>Artículos disponibles</h1>



                    <?php
                        //include 'conexion.php';
                        $link = mysql_connect("localhost", "root", null);
                        mysql_select_db("prueba", $link);

                        $articulos = mysql_query("SELECT * FROM articulo", $link);
                        $encargados = mysql_query("SELECT * FROM encargado  WHERE id NOT IN ('4')", $link);
                        $recibido = mysql_query("SELECT * FROM encargado", $link);
                        $cursos = mysql_query("SELECT * FROM curso", $link);
                        $num_rows = mysql_num_rows($articulos);



                       // $query="SELECT * FROM articulo";
                        //$resultado=$conexion->query($query);
                    ?>
                    <?php
                    date_default_timezone_set("America/Costa_Rica");
                 
                    ?>
                    


                    <FORM ACTION=procesarprestamo.php METHOD=POST>

                    <div class="row">
                        <div class="col-md-4">
                        <h4> Fecha: </h4>
                            <input type="text" name="fecha" value="<?php echo date("Y/m/d"); ?>"  readonly>
                        </div>
                        <div class="col-md-4">
                        <h4> Hora: </h4>
                            <input type="text" name="hora" value="<?php echo date("h:i:sa"); ?>" readonly> 
                        </div>
                        </br></br></br></br>
                    </div>

                    <div class="row">

                            
                            <div class="col-md-4">
                            <h4> Entrega: </h4>
                                <select name="encargado" class="form-control">
                                    <option value="Alejandro">Alejandro</option>
                                    <option value="Francisco">Francisco</option>
                                    <option value="Mario">Mario</option>
                                </select>
                            </div>

                            <input type="hidden" name="usuario" value="<?php echo $_SESSION['u_usuario']; ?>">
                            <br>
                       </div>
                       </br></br>
                        <div class="row">

                            <div class="col-md-4">
                                <h4> Curso: </h4>
                                <select name="curso" class="form-control">


                                    <?php
                                        for ($i=0;$i< mysql_num_rows($cursos);$i++){
                                            $id=mysql_result($cursos,$i,"Sigla");
                                            $nombre=mysql_result($cursos,$i,"NombreCurso");       
                                    ?>
                                            <option value="<?php echo $id ?>"><?php echo $id." - ".$nombre ?></option>

                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        </br></br>
                        <div class="row">

                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <?php 
                                        for ($i=0;$i< mysql_num_rows($articulos);$i++)
                                        {
                                            $id=mysql_result($articulos,$i,"Id");
                                            $nombre=mysql_result($articulos,$i,"NombreArticulo");
                                         ?>   
                                                <TR>
                                                        <TD> <?php echo $id ?></TD>
                                                        <TD><?php echo $nombre ?></TD>
                                                        <TD><INPUT type='checkbox' name="<?php echo "articulo[$id]"; ?>"></TD>
                                                        <TD><INPUT type='text' name="<?php echo "cantidad[$id]"; ?>" value="1" size="2"></TD>

                                                                        
                                                </TR>

                                        <?php 
                                        }?>     
                                        
                                    </TABLE>
                                </div>
                            </div>
                        </div>

                        <INPUT type='submit' value='Aceptar'  class="btn btn-success">
                    </FORM>







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
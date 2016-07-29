<?php

$usuario = $_POST['usuario'];
$contrasena = md5($_POST['password']);
echo $usuario;
echo $contrasena;
include('conexion.php');


$sqlAdmin = "SELECT * FROM estudiante WHERE Carnet='$usuario' AND Contraseña='$contrasena' AND Rol='Moderador' ";
$admin = $conexion->query($sqlAdmin);

$sql = "SELECT * FROM estudiante WHERE Carnet='$usuario' AND Contraseña='$contrasena' ";
$result = $conexion->query($sql);



if($resultadoAdmin= mysqli_fetch_array($admin)){
	session_start();
	$_SESSION['Admin']=$usuario;
	header('Location: HomeAdm.php');

}else if($resultado= mysqli_fetch_array($result)){
	session_start();
	$_SESSION['u_usuario']=$usuario;
	header('Location: home.php');
	
	
}else{
	
	header('Location: index.php');
	
}
/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Carnet"]. " - Name: " . $row["NombreEstudiante"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();*/


?>
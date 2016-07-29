<?php
include('conexion.php');
$usuario = $_POST['usuario'];
$contrasena = $_POST['password'];
$nombre = $_POST['nombre'];
$correo =$_POST['correo'];



$sql = "INSERT INTO estudiante (Carnet, Contraseña,NombreEstudiante,Correo) VALUES ('$usuario','$contrasena','$nombre','$correo') ";
$result = $conexion->query($sql);
?>


<html>
	<head>
		<title>Guardar usuario</title>
	</head>
	<body>
		<center>	
		Su registro ha sido exitoso
			<?php
			if($result > 0){
			session_start();
			$_SESSION['u_usuario']=$usuario;
			header('Location: prestamo.php');
				
			}else{
			header('Location: index.php');
				
				
			}
			?>

			
		</center>
	</body>
</html>	

















<!--
if($resultado > 0){
	$_SESSION['u_usuario']=$usuario;
	header('Location: prestamo.php');
	
	
}else{
	
	header('Location: index.html');
	
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
-->


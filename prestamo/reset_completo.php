<?php
	include('conexion.php');
	$newpass = $_POST['newpass'];
	$newpass1 = $_POST['newpass1'];
	$post_username = $_POST['username'];
	$code = $_GET['code'];
	if($newpass == $newpass1){
		$enc_pass =md5($newpass);
		$query="UPDATE estudiante SET Contraseña='$enc_pass' WHERE Carnet='$post_username'";
		$resultado = $conexion -> query($query);
		$query="UPDATE estudiante SET passreset='0' WHERE Carnet='$post_username'";
		
		echo "Su clave ha sido regenerada exitosamente<p> <a href='http://localhost/medi/prestamo/'>Haga click para ingresar</a>";
		
	}else{
		echo "Los campos no concuerdan <a href='forgot_pass.php?code=$code&username=$post_username'>Haga click para regresar</a>";
	}
 
?>
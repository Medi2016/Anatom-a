<?php
	include('conexion.php');
	$newpass = $_POST['newpass'];
	$newpass1 = $_POST['newpass1'];
	$post_username = $_POST['username'];
	$code = $_GET['code'];
	if($newpass == $newpass1){
		$enc_pass =md5($newpass);
		$query="UPDATE usuarios SET clave='$enc_pass' WHERE usuario='$post_username'";
		$resultado = $conexion -> query($query);
		$query="UPDATE usuarios SET passreset='0' WHERE usuario='$post_username'";
		
		echo "Su clave ha sido regenerada exitosamente<p> <a href='http://localhost/repositorio/prestamo/'>Haga click para ingresar</a>";
		
	}else{
		echo "Los campos no concuerdan <a href='recuperarPass.php?code=$code&username=$post_username'>Haga click para regresar</a>";
	}
 
?>
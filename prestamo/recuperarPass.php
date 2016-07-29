<?php
	include('conexion.php');
	
	if(isset($_GET['code'])){
		$get_username = $_GET['username'];
		$get_code = $_GET['code'];
		$query = "SELECT * FROM usuarios WHERE usuario='$get_username'";
		$resultado = $conexion -> query($query);
		
		while($row=$resultado->fetch_assoc()){
			$db_code = $row['passreset'];
			$db_username = $row['username'];
		}
		if($get_username == $db_username && $get_code == $db_code){
			echo "
				<form action='reset_completo.php?code=$get_code' method='POST'>
					Enter a new password <br> <input type='password' name='newpass'><br>
					Ingrese sunueva contraseña<br><input type='password' name='newpass1'><p>
					<input type='hidden' name='username' value='$db_username'>
					<input type='submit' value='Update Password!'>
				
				</form>
			
			";
		}
	}
	
	
	
	
	
	if(!isset($_GET['code'])){
		echo "
			<form action='forgot_pass.php' method='POST'>
			Enter your username <br> <input type ='text' name='ussername'><p>
			Enter your email <br> <input type ='email' name='email'><p>
			<input type='submit' value='Submit' name='submit'>
			</form>
		";
		if(isset($_POST['submit'])){
			$username = $_POST('username');
			$email = $_POST('email');
			$query = "SELECT * FROM usuarios WHERE usuario='$username'";
			$resultado = $conexion -> query($query);
			$numrow= mysqli_num_rows($resultado);
			if($numrow!=0){
				while($row=$resultado->fetch_assoc()){
					$db_email = $row('email');
				}
				if($email == $db_email){
					$code = rand(10000,1000000);
					$to = $deb_email;
					$subject = "Recuperación de contraseña";
					$body = "Esto es un correo automático favor no responder haga click en 
					el siguiente link: http://localhost:8080/medi/prestamo/recuperarPass.php?code=$code&username=$username";
					$actualizar ="UPDATE usuarios SET passreset='$code' WHERE usuario='$usuario'";
					mail($to,$subject,$body);
					echo "Revise su correo";
				}else{
					echo "Dirección de correo electrónico incorrecto";
				}
			}else{
				echo "Este usuario no existe";
			}
		}
	}
?>
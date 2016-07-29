<?php
		include('conexion.php');

		require 'PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$mail->isSMTP();                            // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                     // Enable SMTP authentication
		$mail->Username = 'escuelademedicinaucr@gmail.com';          // SMTP username
		$mail->Password = 'correopass'; // SMTP password
		$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                          // TCP port to connect to


		if(isset($_GET['code'])){
			$get_username = $_GET['username'];
			$get_code = $_GET['code'];
			$query = "SELECT * FROM estudiante WHERE carnet='$get_username'";
			$resultado = $conexion -> query($query);
			echo $get_username;
			echo $get_code;
			while($row=$resultado->fetch_assoc()){
				$db_code = $row['passreset'];
				$db_username = $row['Carnet'];
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
				Enter your username <br> <input type ='text' name='username'><p>
				Enter your email <br> <input type ='email' name='email'><p>
				<input type='submit' value='Submit' name='submit'>
				</form>
			";
			
			
			if(isset($_POST['submit'])){
			$username = $_POST['username'];
				$email = $_POST['email'];
				$query = "SELECT * FROM estudiante WHERE carnet='$username'";
				$resultado = $conexion -> query($query);
				$numrow= mysqli_num_rows($resultado);
				if($numrow!=0){
					while($row=$resultado->fetch_assoc()){
						$db_email = $row['Correo'];
					}
					if($email == $db_email){
						$code = rand(10000,1000000);
						
						
						
						
						$to = $db_email;
						$subject = "Recuperación de clave de acceso";
						$body = "Esto es un correo automático favor no responder haga click en 
						el siguiente link: http://localhost:8080/medi/prestamo/recuperarPass.php?code=$code&username=$username";
					
						
						$mail->setFrom('escuelademedicinaucr@gmail.com', 'Escuela de medicina UCR');
						$mail->addReplyTo('escuelademedicinaucr@gmail.com', 'Escuela de medicina UCR');
						$mail->addAddress($to);   // Add a recipient
											
						
						$mail->isHTML(true);  // Set email format to HTML

					
						$mail->Subject = $subject;
						$mail->Body    = $body;

						
						
						$actualizar ="UPDATE estudiante SET passreset='$code' WHERE carnet='$username'";
						$actualizado = $conexion -> query($actualizar);
						
						if(!$mail->send()) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						} else {
							echo 'Message has been sent';
						}				
						

						
						
						
					
						
						
						
						
						
						
						
						
						
						
						#mail($to,$subject,$body);
						#echo "Revise su correo";
						
						
					}else{
						echo "Dirección de correo electrónico incorrecto";
					}
				}else{
					echo "Este usuario no existe";
				}
			}
		}	
?>
<?php
		include('conexion.php');

		
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
					
					
					require('/PHPMailer/class.phpmailer.php');
					$mail = new PHPMailer();
					$mail->CharSet = 'UTF-8';
					$to = $db_email;
					#$subject = "Recuperación de contraseña";
					$body = "Esto es un correo automático favor no responder haga click en 
					el siguiente link: http://localhost:8080/medi/prestamo/recuperarPass.php?code=$code&username=$username";
				
					
					
					$actualizar ="UPDATE estudiante SET passreset='$code' WHERE carnet='$username'";
					$actualizado = $conexion -> query($actualizar);
					
					
					
				
					

					//defino el email y nombre del remitente del mensaje
					$mail­>SetFrom('kalitazh@gmail.com', 'kkk');

					//defino la dirección de email de "reply", a la que responder los mensajes
					//Obs: es bueno dejar la misma dirección que el From, para no caer en spam
					$mail­>AddReplyTo("kalitazh@gmail.com","kkk");
					//Defino la dirección de correo a la que se envía el mensaje
					$address = "kalam_1992@hotmail.com";
					//la añado a la clase, indicando el nombre de la persona destinatario
					$mail­>AddAddress($address, "recibe");

					//Añado un asunto al mensaje
					$mail­>Subject = "Recuperación de contraseña";

					//Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
					$mail­>AltBody = "No responda este correo";

					//inserto el texto del mensaje en formato HTML
					$mail­>MsgHTML($body);

					

					//envío el mensaje, comprobando si se envió correctamente
					if(!$mail­>Send()) {
					echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
					} else {
					echo "Mensaje enviado!!";
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
?>
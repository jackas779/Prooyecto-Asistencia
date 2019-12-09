<?php
	require 'funcs/conexion.php';
	include 'funcs/funcs.php';
	require 'PHPMailer/PHPMailerAutoload.php';
	session_start();
	$error = "";
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
	}
	if(!empty($_POST)){
	
	$mail = new PHPMailer();
	
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	$mail->Username = 'slj212885@gmail.com'; //Correo de donde enviaremos los correos
	$mail->Password = 'akatsuki2002'; // Password de la cuenta de envío
	
	$mail->setFrom('slj212885@gmail.com');
	$mail->addAddress($_POST['correo']); //Correo receptor
	
	
	$mail->Subject = 'Titulo de correo';
	$mail->Body    = 'Contenido del correo';
	
	if($mail->send()) {
		$error = 'Correo Enviado';
		} else {
		$error = 'Error al enviar correo';
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Asistencia</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form method="POST" action="forgot_password.php">
					
					<span class="login100-form-title p-b-32 text-center">
						Recuperar contraseña
					</span>
                    <div <?php 
                    if($error=='Error al enviar correo'){
						 echo "style='font-size:16px; color:#cc0000;'";
					}else{
						 echo "style ='font-size:16px; color:#57b846;'";
					} 
					?>><?php 
                        echo $error;
                    ?></div>
					<span class="txt1 p-b-11">
						Correo
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="text" name="correo" placeholder="Ingrese su correo">
						<span class="focus-input100"></span>
					</div>
					

					<div class="container-login100-form-btn text">
						<button class="login100-form-btn mx-auto">
							Recuperar
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
	
</body>
</html>
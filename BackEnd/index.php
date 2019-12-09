<?php
include 'funcs/conexion.php';
	
	session_start();
	$error = '';
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
	}
	
	if(!empty($_POST))
	{
		$correo = mysqli_real_escape_string($mysqli,$_POST['correo']);
		$password = mysqli_real_escape_string($mysqli,$_POST['pass']);
		
		
		$password = sha1($password);
		$sql = "SELECT id, correo FROM usuarios WHERE correo = '$correo' && password = '$password'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows == 1) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['id'];
			$_SESSION['Correo'] = $row['correo'];
			echo $_SESSION['id_usuario'];
			header("location: welcome.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
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
				<form method="POST" action="index.php">
					
					<span class="login100-form-title p-b-32 text-center">
						Iniciar Sesión
					</span>
					<div style = "font-size:16px; color:#cc0000;"><?php echo $error; ?></div>
					<span class="txt1 p-b-11">
						Correo
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="text" name="correo" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Contraseña
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="forgot_password.php" class="txt3">
								Olvido su contraseña?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn text">
						<button class="login100-form-btn mx-auto">
							Login
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
<?php
session_start();
 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 
} else {
   echo "Esta pagina es solo para el administrador.<br>";
   echo "<br><a href='login.html'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";
 
exit;
}
 
$now = time();
 
if($now > $_SESSION['expire']) {
session_destroy();
 
echo "<center>Su sesion a terminado,
<a href='index.php'>Necesita Hacer Login</a></center>";
exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Panel de Control</title>
</head>
 
<body>
	<center>
		<h1>Panel de Control</h1>
		<h2><?php echo "Usuario: ".$_SESSION['User'];?></h2>

  			<a href="#" class="btn btn-primary" onclick="register()">Registrar</a>
			<a href="#" class="btn btn-primary" onclick="Sistema()">Sistema</a>
 		<div id="register">
 			<form action="registro.php" method="post"> 

 				<h3>Crea Usuario</h3>

 				<label for="nombre">Usuario:</label><br>
 				<input type="text" name="username" maxlength="32" required>
 				<br><br>

  				<label for="nombre">Nombre:</label><br>
 				<input type="text" name="nombre" maxlength="32" required>
 				<br><br>

  				<label for="nombre">Apellido:</label><br>
 				<input type="text" name="apellido" maxlength="32" required>
 				<br><br>

 				<label for="pass">Password:</label><br>
 				<input type="password" name="password" maxlength="24" required>

 				<br><br>
 				<input type="submit" name="submit" value="Registrar" class="btn btn-primary">
 				<input type="reset" name="clear" value="Borrar" class="btn btn-danger">
 				<br><br>

 			</form>

 		</div>
	<br><br>
	<button class="btn btn-danger" onclick="logout()"> Cerrar Sesion X</button> 
</center>
<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="Scripts/scripts.js"></script>
</body>

</html>

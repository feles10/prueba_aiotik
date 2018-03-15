<?php
session_start();
 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 
} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
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
<title>Sistema</title>
</head>
 
<body>
	<center>
		<h1>Sistema</h1>
		<h2><?php echo "Usuario: ".$_SESSION['User'];?></h2>
    <h3><?php echo "Nombre: ".$_SESSION['name'];?> <br>
        <?php echo "Apellido: ".$_SESSION['lname'];?></h3>
	<button class="btn btn-danger" onclick="logout()"> Cerrar Sesion X</button> 
</center>
<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="Scripts/scripts.js"></script>
</body>

</html>

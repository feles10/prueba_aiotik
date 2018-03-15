<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "aiotik";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM $tbl_name WHERE User = '$username'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if (password_verify($password, $row['Password'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['User'] = $username;
    $_SESSION['name'] = $row['Nombre'];
    $_SESSION['lname'] = $row['Apellido'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "<center>Bienvenido! " . $_SESSION['User'] . "</center>";
    echo "<center><br><br><a href=System.php>Entrar al sistema</a></center>"; 

    if ($row['Admin']==1) {
    	echo "<center><br><br><a href=Control_Panel.php>Panel de Control</a></center>"; 
    }

 } else { 
   echo "<center>Usuario o Contraseña estan incorrectos.</center>";

   echo "<center><br><a href='Index.php'>Volver a Intentarlo</a></center>";
 }
 mysqli_close($conexion); 
 ?>
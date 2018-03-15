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

<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "aiotik";
 $tbl_name = "usuario";
 
 $username = $_POST['username'];
 $form_pass = $_POST['password'];
 $name = $_POST['nombre'];
 $lname = $_POST['apellido'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE User = '$username' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br>". "El Nombre de Usuario ya a sido tomado." . "<br>";

 echo "<a href='Control_Panel.php'>Por favor escoga otro Usuario</a>";
 }
 else{

 $query = "INSERT INTO usuario (User, Password, Nombre, Apellido)
           VALUES ('$username', '$hash', 'name', 'lname')";

 if ($conexion->query($query) === TRUE) {
 
 echo "<center><br>" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $username . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='Index.php'>Login</a>" . "</h5>"; 
 echo "<h6>" . "Volver al Panel de Control: " . "<a href='Control_Panel.php'>Panel de Control</a>" . "</h6></center>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>
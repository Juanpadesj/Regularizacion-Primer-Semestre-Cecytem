<!-- login.php -->
<?php
session_start();
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'usuario', 'contraseña', 'basededatos');
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consultar la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Inicio de sesión exitoso
    $_SESSION['username'] = $username;
    header("Location: inicio.php"); // Redirigir al usuario a una página de inicio
} else {
    // Usuario no encontrado o contraseña incorrecta
    echo "Usuario o contraseña incorrectos";
}
?>

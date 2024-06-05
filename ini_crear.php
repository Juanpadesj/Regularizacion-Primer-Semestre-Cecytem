<!-- registro.php -->
<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'usuario', 'contraseña', 'basededatos');
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Insertar el nuevo usuario en la base de datos
$sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";
if ($conexion->query($sql) === TRUE) {
    echo "Cuenta creada exitosamente";
} else {
    echo "Error al crear la cuenta: " . $conexion->error;
}

$conexion->close();
?>

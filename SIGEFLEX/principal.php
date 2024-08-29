<?php
session_start(); // Inicia la sesión para poder acceder a las variables de sesión
include 'Db.php'; // Incluye el archivo Db.php que probablemente contiene funciones o configuraciones de base de datos

$apellido = $_SESSION['Apellido']; // Obtiene el valor del apellido almacenado en la sesión
$nombre = $_SESSION['Nombre']; // Obtiene el valor del nombre almacenado en la sesión
//$imagen=$_SESSION['Imagen']; // Comentado: se supone que debería obtener la imagen del usuario, pero no se está utilizando actualmente
$cargo = $_SESSION['Cargo']; // Obtiene el valor del cargo almacenado en la sesión
$imagen = $_SESSION['DNI']; // Obtiene el valor del DNI (o ID) del usuario almacenado en la sesión
$cargo = $_SESSION["Permiso"]; // Obtiene el valor del permiso almacenado en la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"> <!-- Codificación de caracteres -->
    <title>BIENVENIDO AL SIGEFLEX</title> <!-- Título de la página -->
    <link rel="stylesheet" type="text/css" href="css1/estiloprincipal.css"> <!-- Enlace al archivo CSS para estilos -->
</head>
<body>
<div class="contenedor">
<?php
encabezado($nombre, $apellido, $cargo, $imagen); // Llama a la función 'encabezado' con los datos del usuario para mostrar el encabezado
?>
</div>
</body>
</html>

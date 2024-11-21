<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
    
    <!-- Bootstrap CSS para darle estilo y diseño a la página -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light"> <!-- Fondo claro para una apariencia limpia -->

<?php
// Configuración para mostrar todos los errores de PHP durante el desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de la conexión a la base de datos
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "base_de_datos";  

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión ha fallado
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 

// Captura el valor del DNI enviado a través de la URL
$dni = $_GET['valor'];

if (isset($_GET['valor'])) {

    // Preparar y ejecutar la consulta SQL para obtener los detalles del usuario
    $sql = "SELECT usuario.DNI, usuario.apellido, usuario.nombre, usuario.edad, usuario.Usuario, permiso.Descripcion_Permiso 
            FROM usuario 
            JOIN permiso ON usuario.Permiso = permiso.IDPermiso 
            WHERE usuario.DNI = ?";
    
    // Preparar y ejecutar la consulta segura para evitar inyecciones SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $result = $stmt->get_result();

    // Estructura de contenedor para el diseño de la tarjeta de usuario
    echo '<div class="container mt-5">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-md-8 col-lg-6">';
    echo '<div class="card shadow-lg border-0">';
    
    // Encabezado de la tarjeta con título y fondo azul
    echo '<div class="card-header bg-primary text-white text-center">';
    echo '<h3>Detalles del Usuario</h3>';
    echo '</div>';
    echo '<div class="card-body">';

    // Verificar si se han obtenido resultados
    if ($result->num_rows > 0) {
        $usuarioDetalles = $result->fetch_assoc();

        // Mostrar cada detalle en formato HTML usando `htmlspecialchars` para evitar inyecciones XSS
        echo "<p><strong>DNI:</strong> " . htmlspecialchars($usuarioDetalles['DNI']) . "</p>";
        echo "<p><strong>Apellido:</strong> " . htmlspecialchars($usuarioDetalles['apellido']) . "</p>";
        echo "<p><strong>Nombre:</strong> " . htmlspecialchars($usuarioDetalles['nombre']) . "</p>";
        echo "<p><strong>Edad:</strong> " . htmlspecialchars($usuarioDetalles['edad']) . "</p>";
        echo "<p><strong>Usuario:</strong> " . htmlspecialchars($usuarioDetalles['Usuario']) . "</p>";
        echo "<p><strong>Permiso:</strong> " . htmlspecialchars($usuarioDetalles['Descripcion_Permiso']) . "</p>";
    } else {
        // Mensaje si no se encuentran resultados
        echo "<p class='text-danger'>No se encontraron resultados para el DNI: " . htmlspecialchars($dni) . "</p>";
    }

    echo '</div>'; // Cierra el card-body
    echo '<div class="card-footer text-center">';
    echo '<a href="index.php" class="btn btn-secondary">Volver</a>'; // Botón para volver a la página principal
    echo '</div>';
    echo '</div>'; // Cierra card
    echo '</div>'; // Cierra col
    echo '</div>'; // Cierra row
    echo '</div>'; // Cierra container

    // Cerrar el statement después de la consulta
    $stmt->close();
} else {
    // Mensaje si no se ha proporcionado un DNI
    echo "<div class='alert alert-danger text-center mt-5'>No se proporcionó un DNI.</div>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

</body>
</html>

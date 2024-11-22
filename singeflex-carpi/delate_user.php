<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <!-- Enlace al CSS de Bootstrap para el diseño responsivo y estilizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Contenedor principal con estilo de tarjeta para el mensaje de confirmación -->
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-danger text-white text-center">
                        <!-- Cabecera de la tarjeta con un título resaltado -->
                        <h3>Confirmar Eliminación de Usuario</h3>
                    </div>
                    <div class="card-body text-center">
                        <!-- Mensaje descriptivo para que el usuario confirme la acción -->
                        <p class="mb-4">¿Estás seguro de que deseas eliminar este usuario?</p>
                        <!-- Muestra dinámicamente el DNI del usuario pasado como parámetro GET -->
                        <p><strong>DNI del usuario:</strong> <?php echo htmlspecialchars($_GET['valor']); ?></p>
                        <!-- Botón para confirmar la eliminación -->
                        <button class="btn btn-danger mt-3" onclick="confirmarEliminacion()">Eliminar</button>
                        <!-- Enlace para cancelar y volver a la página de inicio -->
                        <a href="index.php" class="btn btn-secondary mt-3 ms-2">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para gestionar la confirmación antes de proceder con la eliminación
        function confirmarEliminacion() {
            // Muestra una alerta de confirmación al usuario
            if (confirm("¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.")) {
                // Si el usuario confirma, redirige al script PHP de eliminación con parámetros adicionales
                window.location.href = "delate_user.php?confirmado=1&valor=<?php echo htmlspecialchars($_GET['valor']); ?>";
            }
        }
    </script>
</body>
</html>

<?php
// Habilitar la visualización de errores para facilitar la depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Comprueba si se recibió la confirmación de eliminación mediante el parámetro 'confirmado'
if (isset($_GET['confirmado']) && $_GET['confirmado'] == 1) {
    // Datos necesarios para la conexión a la base de datos
    $servername = "localhost"; // Nombre del servidor (en este caso, localhost)
    $username = "root";        // Usuario de la base de datos
    $password = "";            // Contraseña del usuario
    $dbname = "base_de_datos"; // Nombre de la base de datos

    // Crear una conexión a la base de datos utilizando mysqli
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si hubo un error al intentar conectar
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recuperar el DNI del usuario que se desea eliminar desde el parámetro GET
    $dni = $_GET['valor'];

    // Preparar la consulta SQL para eliminar al usuario de forma segura (evitando inyecciones SQL)
    $sql = "DELETE FROM Usuario WHERE DNI=?";
    $stmt = $conn->prepare($sql); // Preparar la consulta SQL
    $stmt->bind_param("s", $dni); // Vincular el parámetro DNI a la consulta preparada

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        // Si se elimina correctamente, mostrar un mensaje y redirigir a la página principal
        echo "<script>
            alert('Usuario eliminado exitosamente.');
            window.location.href = 'index.php';
        </script>";
    } else {
        // Si ocurre un error, mostrar un mensaje indicando el problema
        echo "<script>
            alert('Error al eliminar el usuario: " . $stmt->error . "');
            window.location.href = 'singeflex-carpi/index.php';
        </script>";
    }

    // Cerrar la consulta preparada y la conexión a la base de datos
    $stmt->close(); // Liberar los recursos de la consulta
    $conn->close(); // Cerrar la conexión con el servidor de la base de datos
}
?>

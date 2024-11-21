<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-danger text-white text-center">
                        <h3>Confirmar Eliminación de Usuario</h3>
                    </div>
                    <div class="card-body text-center">
                        <p class="mb-4">¿Estás seguro de que deseas eliminar este usuario?</p>
                        <p><strong>DNI del usuario:</strong> <?php echo htmlspecialchars($_GET['valor']); ?></p>
                        <!-- Botones de Confirmar y Cancelar -->
                        <button class="btn btn-danger mt-3" onclick="confirmarEliminacion()">Eliminar</button>
                        <a href="index.php" class="btn btn-secondary mt-3 ms-2">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmarEliminacion() {
            if (confirm("¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.")) {
                window.location.href = "delate_user.php?confirmado=1&valor=<?php echo htmlspecialchars($_GET['valor']); ?>";
            }
        }
    </script>
</body>
</html>

<?php
// Habilitar la visualización de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['confirmado']) && $_GET['confirmado'] == 1) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_de_datos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $dni = $_GET['valor'];

    // Preparar y ejecutar la consulta
    $sql = "DELETE FROM Usuario WHERE DNI=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $dni);

    if ($stmt->execute()) {
        echo "<script>
            alert('Usuario eliminado exitosamente.');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error al eliminar el usuario: " . $stmt->error . "');
            window.location.href = 'singeflex-carpi/index.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es"> <!-- Indica el tipo de documento y el idioma de la página -->
<head>
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres a UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la vista para dispositivos móviles -->
    <title>Modificar Usuario</title> <!-- Título de la página -->
    <link rel="icon" type="image/png" href="img/legoo.png">
    <!-- Bootstrap CSS para darle estilo y diseño a la página -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Enlace a la hoja de estilos de Bootstrap -->
</head>
<body class="bg-light"> <!-- Clase bg-light para fondo claro -->

<?php
// Mostrar errores de PHP para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de conexión a la base de datos
$servername = "localhost";  // Nombre del servidor
$username = "root";  // Nombre de usuario de la base de datos
$password = "";  // Contraseña de la base de datos
$dbname = "base_de_datos";  // Nombre de la base de datos

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname); // Crea la conexión a la base de datos
if ($conn->connect_error) { // Verifica si hay errores en la conexión
    die("Conexión fallida: " . $conn->connect_error); // Termina el script si hay error de conexión
} 

// Verificar si se ha proporcionado un DNI y si el formulario ha sido enviado
if (isset($_GET['valor'])) { // Verifica si se ha recibido el parámetro 'valor' por método GET
    $dni = $_GET['valor']; // Asigna el valor de 'valor' a la variable $dni

    // Obtener los detalles del usuario basado en el DNI
    $sql = "SELECT DNI, apellido, nombre, edad, Usuario, Contrasenia, Permiso FROM usuario WHERE DNI = ?"; // SQL para seleccionar datos del usuario
    $stmt = $conn->prepare($sql); // Prepara la consulta
    $stmt->bind_param("s", $dni); // Asigna el valor de $dni a la consulta preparada
    $stmt->execute(); // Ejecuta la consulta
    $result = $stmt->get_result(); // Obtiene el resultado de la consulta

    if ($result->num_rows > 0) { // Verifica si se encontraron resultados
        $usuario = $result->fetch_assoc(); // Asigna los datos del usuario a la variable $usuario
    } else { // Si no se encuentra el usuario, muestra un mensaje
        echo "<div class='alert alert-danger text-center'>No se encontró el usuario con el DNI: $dni</div>";
        exit; // Termina el script si no se encuentra el usuario
    }

    // Procesar la modificación del usuario si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si el formulario ha sido enviado por método POST
        $apellido = $_POST['apellido']; // Obtiene el valor de 'apellido' del formulario
        $nombre = $_POST['nombre']; // Obtiene el valor de 'nombre' del formulario
        $edad = $_POST['edad']; // Obtiene el valor de 'edad' del formulario
        $usuario = $_POST['usuario']; // Obtiene el valor de 'usuario' del formulario
        $contrasenia = $_POST['contrasenia']; // Obtiene el valor de 'contrasenia' del formulario
        $permiso = $_POST['permiso']; // Obtiene el valor de 'permiso' del formulario

        // Consulta para actualizar el usuario
        $sql_update = "UPDATE usuario SET apellido = ?, nombre = ?, edad = ?, Usuario = ?, Contrasenia = ?, Permiso = ? WHERE DNI = ?"; // SQL para actualizar datos del usuario
        $stmt_update = $conn->prepare($sql_update); // Prepara la consulta de actualización
        $stmt_update->bind_param("sssissi", $apellido, $nombre, $edad, $usuario, $contrasenia, $permiso, $dni); // Asigna valores a la consulta

        if ($stmt_update->execute()) { // Ejecuta la consulta y verifica si fue exitosa
            echo "<script>alert('Usuario Modificado exitosamente.'); window.location.href = 'index.php';</script>"; // Muestra mensaje de éxito y redirige
        } else { // Si hay un error en la actualización, muestra un mensaje
            echo "<div class='alert alert-danger text-center'>Error al modificar el usuario: " . $stmt_update->error . "</div>";
        }
        $stmt_update->close(); // Cierra la consulta preparada de actualización
    }
    $stmt->close(); // Cierra la consulta preparada de selección
}
$conn->close(); // Cierra la conexión a la base de datos
?>

<!-- Formulario para modificar el usuario -->
<div class="container mt-5"> <!-- Contenedor principal con margen superior -->
    <div class="row justify-content-center"> <!-- Alinea el formulario al centro -->
        <div class="col-md-8 col-lg-6"> <!-- Define el tamaño del formulario -->
            <div class="card shadow-lg" style="border-radius: 15px;"> <!-- Tarjeta con sombra y bordes redondeados -->
                <div class="card-header text-center bg-primary text-white" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h4>Modificar Usuario</h4> <!-- Título de la tarjeta -->
                </div>
                <form method="POST" action=""> <!-- Formulario que envía datos por método POST -->
                    <ul class="card-body">
                        
                        <!-- Campo DNI solo lectura -->
                        <li class="mb-3">
                            <strong class="form-label">DNI</strong>
                            <input type="text" name="dni" id="dni" class="form-control" value="<?php echo htmlspecialchars($usuario['DNI']); ?>" readonly>
                        </li>

                        <!-- Campo Apellido -->
                        <li class="mb-3">
                            <strong class="form-label">Apellido</strong>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" required>
                        </li>

                        <!-- Campo Nombre -->
                        <li class="mb-3">
                            <strong class="form-label">Nombre</strong>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                        </li>

                        <!-- Campo Edad -->
                        <li class="mb-3">
                            <strong class="form-label">Edad</strong>
                            <input type="number" name="edad" id="edad" class="form-control" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required>
                        </li>

                        <!-- Campo Usuario -->
                        <li class="mb-3">
                            <strong class="form-label">Usuario</strong>
                            <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo htmlspecialchars($usuario['Usuario']); ?>" required>
                        </li>

                        <!-- Campo Contraseña -->
                        <li class="mb-3">
                            <strong class="form-label">Contraseña</strong>
                            <input type="password" name="contrasenia" id="contrasenia" class="form-control" value="<?php echo htmlspecialchars($usuario['Contrasenia']); ?>" required>
                        </li>

                        <!-- Campo Permiso -->
                        <li class="mb-3">
                            <strong class="form-label">Permiso</strong>
                            <input type="number" name="permiso" id="permiso" class="form-control" value="<?php echo htmlspecialchars($usuario['Permiso']); ?>" required>
                        </li>
                    </ul>
                    <div class="card-footer text-center"> <!-- Pie de la tarjeta para botones -->
                        <button type="submit" class="btn btn-success w-50">Guardar Cambios</button> <!-- Botón para guardar -->
                        <a href="index.php" class="btn btn-secondary w-50 mt-2">Cancelar</a> <!-- Botón para cancelar -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

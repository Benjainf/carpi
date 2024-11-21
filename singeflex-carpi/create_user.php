<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>

    <!-- Incluir Bootstrap CSS para dar estilos modernos y responsivos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS personalizado para el menú de navegación y pie de página -->
    <link rel="stylesheet" type="text/css" href="css/style_nav.css">
    <link rel="stylesheet" href="css/footer.css">
    
    <!-- Ionicons para agregar iconos personalizados en el pie de página -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <!-- jQuery para manipulación de elementos y DataTables para funciones de tablas -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript para componentes interactivos -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-POdVZ3tC6lW4naDpT5RmzqxO0i5pzhRO5X77o3l12tnnJKIh4TYJL59b/hwXlTCW" crossorigin="anonymous"></script>
    <!-- Archivo de JavaScript personalizado -->
    <script src="script.js"></script>
</head>
<body class="bg-light"> <!-- Fondo claro para la página -->

<?php
// Incluir funciones externas (por ejemplo, la función de navegación)
include 'funciones.php';
 // Llamada a la función de navegación definida en el archivo incluido

// Configuración para mostrar errores de PHP (útil durante el desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración para conectar con la base de datos
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "base_de_datos";  

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    // Si falla la conexión, se muestra un mensaje de error y se termina el script
    die("Conexión fallida: " . $conn->connect_error);
} 

// Procesar el formulario si se ha enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $permiso = $_POST['permiso'];

    // Preparar la consulta SQL para insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuario (DNI, apellido, nombre, edad, Usuario, Contrasenia, Permiso) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar y ejecutar la consulta para insertar datos
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssissi", $dni, $apellido, $nombre, $edad, $usuario, $contrasenia, $permiso);

    // Mostrar un mensaje dependiendo de si la inserción fue exitosa o falló
    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>Usuario creado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error al crear el usuario: " . $stmt->error . "</div>";
    }

    // Cerrar el statement
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!-- Formulario para crear un nuevo usuario -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <!-- Tarjeta donde se muestra el formulario -->
      <div class="card shadow-lg" style="border-radius: 15px;">
        <!-- Encabezado de la tarjeta con título y fondo azul -->
        <div class="card-header text-center bg-primary text-white" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
          <h4>Nuevo Usuario</h4>
        </div>
        
        <!-- Inicio del formulario -->
        <form method="POST" action="">
          <div class="card-body">
            <!-- Campo para ingresar DNI -->
            <div class="mb-3">
              <label for="dni" class="form-label">DNI</label>
              <input type="text" name="dni" id="dni" class="form-control" required>
            </div>
            <!-- Campo para ingresar Apellido -->
            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <!-- Campo para ingresar Nombre -->
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <!-- Campo para ingresar Edad -->
            <div class="mb-3">
              <label for="edad" class="form-label">Edad</label>
              <input type="number" name="edad" id="edad" class="form-control" required>
            </div>
            <!-- Campo para ingresar el nombre de usuario -->
            <div class="mb-3">
              <label for="usuario" class="form-label">Usuario</label>
              <input type="text" name="usuario" id="usuario" class="form-control" required>
            </div>
            <!-- Campo para ingresar la Contraseña -->
            <div class="mb-3">
              <label for="contrasenia" class="form-label">Contraseña</label>
              <input type="password" name="contrasenia" class="form-control" required>
            </div>
            <!-- Selección de permiso o cargo del usuario -->
            <div class="mb-3">
              <label for="permiso" class="form-label">Cargo</label>
              <select name="permiso" class="form-select" required>
                <option value="1" selected>Superusuario</option>
                <option value="2">Director</option>
                <option value="3">Visitante</option>
              </select>
            </div>
          </div>
          
          <!-- Botones de acción del formulario -->
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-success w-50">Crear Usuario</button>
            <button type="button" class="btn btn-secondary w-50 mt-2" onclick="location.href='index.php'">Volver</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Incluir Bootstrap JS para funcionalidades adicionales -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Definir el conjunto de caracteres que usará la página, en este caso UTF-8 -->
    <meta charset="UTF-8"> 
    <!-- Hace que la página sea responsiva, es decir, se adapte a diferentes tamaños de pantalla (móvil, tablet, computadora) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Título de la página, aparece en la pestaña del navegador -->
    <title> Sigeflex </title>
    <!-- Cargar la librería de íconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Cargar el CSS de la versión 4 de Bootstrap (para estilos básicos y de diseño) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Cargar el CSS de la versión 5 de Bootstrap (para estilos más recientes) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Cargar el JavaScript de Bootstrap (para la funcionalidad de elementos interactivos como botones o menús desplegables) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Cargar el archivo CSS personalizado de la página -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Cargar otro archivo CSS que tiene estilos para la barra de navegación -->
    <link rel="stylesheet" type="text/css" href="css/style_nav.css">
    <!-- Cargar el archivo CSS para el pie de página -->
    <link rel="stylesheet" href="css/footer.css">
    <!-- Cargar la librería Ionicons para utilizar más íconos en el pie de página u otras secciones -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Cargar jQuery, que es una librería de JavaScript para hacer la manipulación del DOM más fácil -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Cargar la librería DataTables para mejorar las tablas, permitiendo funciones como búsqueda y ordenación -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Cargar el JavaScript de Bootstrap versión 5.3.3 (otra vez, para asegurar que todo funciona correctamente) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-POdVZ3tC6lW4naDpT5RmzqxO0i5pzhRO5X77o3l12tnnJKIh4TYJL59b/hwXlTCW" crossorigin="anonymous"></script>
    <!-- Cargar un archivo JavaScript propio para añadir interactividad a la página -->
    <script src="script.js"></script>

    <style>
    #sidebar:not(.expand) .user-login { display: none;}
    #sidebar:not(.expand) .sidebar-nav {display: none;}
    #sidebar:not(.expand) .sidebar-footer {display: none;}
    #sidebar:not(.expand) {height: 0;}
    </style>
</head>
<?php
        // Incluir un archivo PHP que contiene funciones que se usarán en este documento
        include 'funciones.php'; 
            // Iniciar una sesión en PHP para manejar datos entre páginas
            session_start();
            // Desactivar la visualización de errores de PHP (por razones de seguridad)
            error_reporting(NULL);
            // Parámetros de conexión a la base de datos
            $servername = "localhost";  
            $username = "root";  
            $password = "";  
            $dbname = "base_de_datos";
            // Crear una conexión a la base de datos
            $conn=mysqli_connect($servername,$username,$password,$dbname);
            // Verificar si hubo algún error al conectar a la base de datos
                    if ($conn->connect_error) {
                        // Si hay error, mostrar un mensaje y detener la ejecución
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    // Si existe una variable de sesión 'user' (lo que indica que el usuario está logueado)
                    if(isset($_SESSION['user'])) { 
                        // Recoger los datos de la sesión (usuario y permisos)
                        $user=$_SESSION['user']; 
                        $per=$_SESSION['per'];
                    }
?>
<body style="background-color: #0C1A1A; min-height: 1rem;"> <!-- Establecer el color de fondo y la altura mínima de la página -->
        <?php
            // Llamar a la función 'nav' para mostrar la barra de navegación, pasando el usuario y los permisos
             nav($user,$per);
        ?>
        <div class="container" style="background-color: #0C1A1A"> <!-- Crear un contenedor que contiene las publicaciones -->
            <section class="publicaciones"> <!-- Sección para mostrar las publicaciones -->
                <?php
                    // Llamar a la función 'paginacionuser' con los permisos del usuario para verificar si tiene acceso
                    if (paginacionuser($per)) {
                        // Si el usuario tiene acceso, cerramos la conexión a la base de datos
                        $conexion->close();
                    } else {
                        // Si el usuario no tiene acceso, mostrar un mensaje
                        echo "No tienes Acceso";
                    }
                ?>
            </section> <!-- Cierre de la sección de publicaciones -->
            <script src="script.js"></script> <!-- Llamar el archivo JavaScript para añadir funcionalidad -->
        </div> <!-- Cierre del contenedor principal -->
</body>
</html>
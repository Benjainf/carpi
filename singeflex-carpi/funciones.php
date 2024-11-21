<?php

// Suprimir los mensajes de error
error_reporting(0);

// Datos de la conexión
$servername = "localhost";  
$username = "root";         
$password = "";    
$dbname = "base_de_datos"; // Nombre de la base de datos

// Función para realizar la conexión
function Conexion() {
    $servername = "localhost";  
    $username = "root";         
    $password = "";    
    $dbname = "base_de_datos"; // Nombre de la base de datos

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    return $conn;
}

// Establecer la conexión
$conn = Conexion();
?>



<?php

// Función para la barra de navegación
function nav($user, $per) {
    ?>
    <nav style="height: 72px; background: url('img/nav.jpg') no-repeat center center; background-size: cover; display: flex; align-items: center; padding: 0 74px;">
    <a>
        <img src="img/legoo.png" style="width: 60px;">
    </a>
    <h1 class="fs-1 text-light" style="padding: 1rem 0.5rem;">Sigeflex</h1>
    
    <!-- Formulario de búsqueda que redirige a Google -->
    <form action="https://www.google.com/search" method="GET" class="d-flex ms-auto" role="search" style="display: flex; align-items: center; margin-left: auto;">
        <input class="form-control me-2" type="search" name="q" placeholder="Buscar..." aria-label="Buscar" style="width: 250px;">
        <button class="btn btn-light" type="submit">Buscar</button>
    </form>
</nav>


    <div class="wrapper">
        <aside style=" background: #d30909; " id="sidebar">
            <div class="d-flex" style="border-bottom:10px;">
            <button class="toggle-btn" type="button" style=" padding: 1rem 0.5rem;">
                <img src="img/menu.png" alt="Logo" style="width:40px">
                </button>
                <div class="sidebar-logo">
                    <a style="color:white;">MENU</a>
                </div>
            </div>
            <div class="user-login">
                <?php
                if(isset($_SESSION['user'])) { // Si hay una sesión iniciada, muestra el nombre de usuario
                   
                    if ($per==1){echo "<a href='ver_detalle.php'> ";}
                    else {echo "<a> ";}
                    echo "<button class='btn btn-outline-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasNavbar' aria-controls='offcanvasNavbar'>";    
                    echo "<img src='img/user.png' style='width: 50px;'> ";
                    echo "$user</button></a>";
                } else { // Si no hay una sesión iniciada, muestra login 
                    echo "<button class='btn btn-sm btn-outline-secondary' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasNavbar' aria-controls='offcanvasNavbar'>
                          <a href='login.php' style='text-decoration:none; color:lightgray; --bs-btn-padding-y: .10rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .50rem;'>Iniciar Sesión</a>
                          </button>";
                }
                ?>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                    <i class="bi bi-house"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <?php
                if(isset($_SESSION['user'])&&$_SESSION['per']==1||$_SESSION['per']==2) {
                 echo   "<li class='sidebar-item'>
                    <a href='create_user.php' class='sidebar-link'>
                    <i class='bi bi-plus-square'></i>
                        <span>Cargar Nuevo Usuario</span>
                    </a>
                </li>";
                } 
                
              
                if ($per==1){echo "
                <li class='sidebar-item'>
                    <a href='http://localhost/phpmyadmin/index.php?route=/database/structure&db=base_de_datos' class='sidebar-link'  >
                        <i class='bi bi-gear'></i>
                        <span>Administrar</span>
                    </a>
                </li>";
                }
                ?>
                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="bi bi-info-circle"></i>
                        <span>Contacto</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Sobre nosotros</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Pagina Tecnica</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <div class="sidebar-footer">
            <?php
                        if(isset($_SESSION['user'])) { // Verifica si hay una sesión iniciada
                            // Si hay una sesión iniciada, muestra el botón para cerrar sesión
                            echo "
                                        <a href='funciones.php?accion=cerrar_sesion' class='sidebar-link'>
                    <i class='bi bi-box-arrow-left'></i>
                    <span>Cerrar Sesion</span>
                </a>
                            ";
                        } 
                        ?>   

            </div>
        </aside>
                
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
      const hamBurger = document.querySelector(".toggle-btn");

      hamBurger.addEventListener("click", function () {
      document.querySelector("#sidebar").classList.toggle("expand");
      });
    </script>
    <?php
}


function navi() {
    ?>
    <nav style="height: 72px; background: url('img/nav.jpg') no-repeat center center; background-size: cover; display: flex; align-items: center; padding: 0 74px;">
    <a>
        <img src="img/legoo.png" style="width: 60px;">
    </a>
    <h1 class="fs-1 text-light" style="padding: 1rem 0.5rem;">Sigeflex</h1>
    
    <!-- Formulario de búsqueda que redirige a Google -->
    <form action="https://www.google.com/search" method="GET" class="d-flex ms-auto" role="search" style="display: flex; align-items: center; margin-left: auto;">
        <input class="form-control me-2" type="search" name="q" placeholder="Buscar..." aria-label="Buscar" style="width: 250px;">
        <button class="btn btn-light" type="submit">Buscar</button>
    </form>
</nav>


    <div class="wrapper">
        <aside style=" background: #d30909; " id="sidebar">
            <div class="d-flex" style="border-bottom:10px;">
            <button class="toggle-btn" type="button" style=" padding: 1rem 0.5rem;">
                <img src="img/menu.png" alt="Logo" style="width:40px">
                </button>
                <div class="sidebar-logo">
                    <a style="color:white;">MENU</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                    <i class="bi bi-house"></i>
                        <span>Inicio</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-footer">   

            </div>
        </aside>
                
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
      const hamBurger = document.querySelector(".toggle-btn");

      hamBurger.addEventListener("click", function () {
      document.querySelector("#sidebar").classList.toggle("expand");
      });
    </script>
    <?php
}


// Función para el pie de página
function footer() {
    ?>
    <footer class="footer bg-dark text-white py-4 mt-5">
        <div class="container text-center">

            <!-- Redes Sociales -->
            <div class="social-icons mb-3">
                <a href="https://instagram.com" target="_blank" class="icon mx-2">
                    <ion-icon name="logo-instagram" class="text-white" style="font-size: 24px;"></ion-icon>
                </a>
                <a href="https://facebook.com" target="_blank" class="icon mx-2">
                    <ion-icon name="logo-facebook" class="text-white" style="font-size: 24px;"></ion-icon>
                </a>
                <a href="mailto:contacto@sigeflex.com" class="icon mx-2">
                    <ion-icon name="mail-outline" class="text-white" style="font-size: 24px;"></ion-icon>
                </a>
            </div>

            <!-- Menú -->
            <ul class="menu list-inline mb-3">
                <li class="list-inline-item mx-3">
                    <a href="/singeflex-carpi/index.php" class="menu-icon text-white text-decoration-none">Inicio</a>
                </li>
                <li class="list-inline-item mx-3">
                    <a href="/singeflex-carpi/#" class="menu-icon text-white text-decoration-none">Contacto</a>
                </li>
            </ul>

            <!-- Copyright -->
            <p class="text-muted small mb-0">S I N G E F L E X</p>
        </div>
    </footer>

    <!-- Ionicons Script -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <?php
}

// Función para cerrar sesión
if (isset($_GET['accion']) && $_GET['accion'] == 'cerrar_sesion') {
    cerrar_sesion();
}

function cerrar_sesion() {
    session_start();
    session_destroy();
    header("Location: index.php");
}
?>

<?php

function paginacionuser($permiso){

    $servername = "localhost";  
    $username = "root";  
    $password = "";  
    $dbname = "base_de_datos";
   
   // Crear conexión 
   $conexion=mysqli_connect($servername,$username,$password,$dbname);
   
       //Verificar la conexión
       if($conexion->connect_error){
       die ("Error en la conexion".$conexion->$connect_error);
       }
     //Configuración de la paginación
     $page = isset($_GET['page'])?$_GET['page']:1;
     $inicio = ($page - 1) * 5;
     
     //Consulta para obtener el total de publicaciones
     $sql_total = "SELECT COUNT(*) as total FROM usuario";
     $result_total = $conexion->query($sql_total);
     $total_registros = $result_total->fetch_assoc()['total'];
     
     //Consulta para obtener las publicaciones de la pagina actual
     $sql_publi = "SELECT * FROM usuario LIMIT $inicio, 5";
     creartablauser($permiso,$sql_publi);
     
     //Generar  enlaces de paginacion
     $total_paginas = ceil($total_registros/5);
     echo "<nav aria-label='Page navigation example'>
           <ul class='pagination' style='justify-content: center;'>";
     echo "  </ul>
     </nav> ";  
     
     $conn->close();
     }
   
   function creartablauser($permiso_usuario,$consulta){ //Crea la tabla, en donde ingresa las columnas y llama a la funcion 'tablafilas', que recorre la tabla usuarios y ingresa filas con datos correspondientes a las columnas
   
    
    error_reporting(0);

    // Conexión a la base de datos (ajusta los parámetros)  
    $servername = "localhost";  
    $username = "root";  
    $password = "";  
    $dbname = "base_de_datos";  
    
    // Crear conexión  
    $conn = new mysqli($servername, $username, $password, $dbname);  
    
    // Verificar conexión  
    if ($conn->connect_error) {  
        die("Conexión fallida: " . $conn->connect_error);  
    }  
    
    // Definir la variable de búsqueda
    $Busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : ''; // Asegúrate de que se obtiene correctamente
    
    // Consulta parametrizada  
    $consulta = "SELECT * FROM usuario WHERE (apellido LIKE ? OR nombre LIKE ? OR DNI LIKE ? OR edad LIKE ?) ORDER BY apellido";  
    $stmt = $conn->prepare($consulta);  
    
    // Vamos a agregar signos de porcentaje para el uso de LIKE  
    $BusquedaParam = "%" . $Busqueda . "%";  
    $stmt->bind_param("ssss", $BusquedaParam, $BusquedaParam, $BusquedaParam, $BusquedaParam);  
    
    // Ejecutar la consulta  
    $stmt->execute();  
    $result = $stmt->get_result();  
    
    if ($permiso_usuario >= 1 && $permiso_usuario <= 3) {
   ?>

<div class="container" style="display:flex; justify-content:center; "> 
<div class="table-container ms-3" style="width: 80%; color:white;">
            <h2 class="text-white">Administrar Usuarios</h2>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

   
   
   <table id="miTabla" class="display table table-bordered border-primary" style="margin-top: 10%;">
     <thead>
     <tr>
            <th scope="col">DNI</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Edad</th>
            <th scope="col">Usuario</th>
            <th scope="col">Permiso</th>
            <th scope="col">Acciones</th>
        </tr>
     </thead>
     <tbody class="table-group-divider">
   
     <?php 
     if ($result->num_rows > 0) {
        // Salida de datos para cada fila
        while ($row = $result->fetch_assoc()) {
            // Llama a la función con los datos correctos
            tablafilasuser($row["DNI"], $row["nombre"], $row["apellido"], $row["edad"], $row["Usuario"], $row["Permiso"], $permiso_usuario);
        }
    } else {
        echo "<tr><td colspan='7'>No se encontraron resultados.</td></tr>";
    }
   ?>
     </tbody>
   </table>
   <?php

}
   }



   function tablafilasuser($DNI, $nombre, $apellido, $edad, $Usuario, $Permiso, $permiso_usuario) { 
    // Recorre las filas de la tabla usuario, para mostrar los datos que obtiene
    ?>
    <tr>
        <td><?php echo htmlspecialchars($DNI); ?></td>
        <td><?php echo htmlspecialchars($apellido); ?></td>
        <td><?php echo htmlspecialchars($nombre); ?></td>
        <td><?php echo htmlspecialchars($edad); ?></td>
        <td><?php echo htmlspecialchars($Usuario); ?></td>
        <td><?php echo htmlspecialchars($Permiso); ?></td>
        <td>
        <?php 
        // Dependiendo del permiso del usuario que ingresó a la página, podrá tener diferentes acciones
        if ($permiso_usuario == 1) {  // Superusuario
            // Mostrar enlace para ver detalles
            echo '<a href="ver_detalle.php?valor=' . urlencode($DNI) . '"> <i class="bi bi-person-square"></i></a>';
            
            // Mostrar enlaces de actualización y eliminación
            echo '<a href="update_user.php?valor=' . urlencode($DNI) . '"> <i class="bi bi-pencil"></i> </a>';
            echo '<a href="delate_user.php?valor=' . urlencode($DNI) . '"> <i class="bi bi-trash"></i> </a>';
        } elseif ($permiso_usuario == 2) { // Otro rol con permiso limitado
            // Mostrar solo enlaces de actualización y detalles
            echo '<a href="ver_detalle.php?valor=' . urlencode($DNI) . '"> <i class="bi bi-person-square"></i></a>';
            echo '<a href="update_user.php?valor=' . urlencode($DNI) . '"> <i class="bi bi-pencil"></i> </a>';
        } elseif ($permiso_usuario == 3) { // Visitante, solo ver detalles
            echo '<a href="ver_detalle.php?valor=' . urlencode($DNI) . '"> <i class="bi bi-person-square"></i></a>';
        }
        ?>
        </td>
    </tr>
    <?php
}
?>

<script>
$(document).ready(function() {
    $('#miTabla').DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthMenu": [5, 10, 20, 50],
        "ordering": true,
        "searching": true
    });
});
</script>
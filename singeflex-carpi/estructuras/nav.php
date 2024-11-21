<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
   
        <link rel="stylesheet" href="../css/style_nav.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex" style="border-bottom:10px;">
            <button class="toggle-btn" type="button" style="    padding: 1rem 0.5rem;">
                <img src="../img/logo.png" alt="Logo" style="width:50px">
                </button>
                <div class="sidebar-logo">
                    <a style="color:white;">MENU</a>
                </div>
            </div>
            <div class="user-login">
                <?php
                if(isset($_SESSION['user'])) { // Si hay una sesión iniciada, muestra el nombre de usuario
                   
                    if ($per==1){echo "<a href='AdminPage.php'> ";}
                    else {echo "<a> ";}
                    echo "<button class='btn btn-outline-warning' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasNavbar' aria-controls='offcanvasNavbar'>";    
                    echo "<img src='img/user.png' style='width: 50px;'> ";
                    echo "$user</button></a>";
                } else { // Si no hay una sesión iniciada, muestra login 
                    echo "<button class='btn btn-outline-secondary' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasNavbar' aria-controls='offcanvasNavbar'>
                          <a href='login.php' style='text-decoration:none; color:lightgray;'>Iniciar Sesión</a>
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
                    <a href='#' class='sidebar-link'>
                    <i class='bi bi-plus-square'></i>
                        <span>Subir Publicacion</span>
                    </a>
                </li>";
                } 
                
              
                if ($per==1){echo "
                <li class='sidebar-item'>
                    <a href='#' class='sidebar-link'>
                        <i class='lni lni-cog'></i>
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
                                        <a href='#' class='sidebar-link'>
                    <i class='lni lni-exit'></i>
                    <span>Cerrar Sesion</span>
                </a>
                            ";
                        } 
                        ?>   

            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
                
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
</body>

</html>
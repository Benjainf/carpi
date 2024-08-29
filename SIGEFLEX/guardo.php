<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIGEFLEX - Sistema de Gestión Flexible</title>
  <link rel="stylesheet" href="principal.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <img src="hulogo.jpg" alt="Logo SIGEFLEX" width="30px" style="margin-right:20px;">
      <div class="logo"><a href="#">E.E.S.T N1</a></div>
      
        <ul class="links">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Usuarios</a></li>
          <li><a href="#">Nuevo</a></li>
          <li>
            <a href="#" class="desktop-link">Reportes</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Reportes</label>
            <ul>
              <li><a href="#">Reporte 1</a></li>
              <li><a href="#">Reporte 2</a></li>
              <li><a href="#">Reporte 3</a></li>
            </ul>
          </li>
          <li>
            <a href="#" class="desktop-link">Listados</a>
            <input type="checkbox" id="show-services">
            <label for="show-services">Listados</label>
            <ul>
              <li><a href="#">Listados 1</a></li>
              <li><a href="#">Listados 2</a></li>
              <li><a href="#">Listados 3</a></li>
            </ul>
          </li>
          <li><a href="#">Creditos</a></li>
          <li><a href="#">Salir</a></li>
          <div class="profile-info">

          <li><a href="login2.php" img src="foto-persona.jpg">Iniciar sesion</a></li>
</div>
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Buscar" required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
    <br>
    <br>
    <br>
    
    <div class="container mt-3">
    <h1>TABLA DE USUARIOS</h1>
    <div class="table-responsive"> <!-- Añade esta línea -->
        <table id="userTable" class="display">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Usuario</th>
                    <th>Permiso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    <!-- Modal para modificar datos -->
    <div id="editModal" style="display:none;">
        <h2>Modificar Usuario</h2>
        <form id="editForm">
            <input type="hidden" id="editDNI" name="dni">
            <label for="editApellido">Apellido:</label>
            <input type="text" id="editApellido" name="apellido"><br>
            <label for="editNombre">Nombre:</label>
            <input type="text" id="editNombre" name="nombre"><br>
            <label for="editEdad">Edad:</label>
            <input type="number" id="editEdad" name="edad"><br>
            <label for="editUsuario">Usuario:</label>
            <input type="text" id="editUsuario" name="Usuario"><br>
            <label for="editPermiso">Permiso:</label>
            <input type="text" id="editPermiso" name="permiso"><br>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="tablagarrafa/script.js"></script>
</body>
</html>



@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}
.wrapper{
  background: #4385ee;
  position: fixed;
  width: 100%;
}
.wrapper nav{
  position: fixed;
  display: block;
  max-width: calc(100% - 200px);
  margin: 0 auto;
  height: 70px;
  align-items: center;
  justify-content: space-between;
}
nav .content{
  display: flex;
  align-items: center;
}
nav .content .links{
  margin-left: 80px;
  display: flex;
}
.content .logo a{
  color: #fff;
  font-size: 30px;
  font-weight: 600;
}
.content .links li{
  list-style: none;
  line-height: 70px;
}
.content .links li a,
.content .links li label{
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  padding: 9px 17px;
  border-radius: 5px;
  transition: all 0.3s ease;
}
.content .links li label{
  display: none;
}
.content .links li a:hover,
.content .links li label:hover{
  background: #323c4e;
}
.wrapper .search-icon,
.wrapper .menu-icon{
  color: #fff;
  font-size: 18px;
  cursor: pointer;
  line-height: 70px;
  width: 70px;
  text-align: center;
}
.wrapper .menu-icon{
  display: none;
}
.wrapper #show-search:checked ~ .search-icon i::before{
  content: "\f00d";
}

.wrapper .search-box{
  position: absolute;
  height: 100%;
  max-width: calc(100% - 50px);
  width: 100%;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
}
.wrapper #show-search:checked ~ .search-box{
  opacity: 1;
  pointer-events: auto;
}
.search-box input{
  width: 100%;
  height: 100%;
  border: none;
  outline: none;
  font-size: 17px;
  color: #fff;
  background: #171c24;
  padding: 0 100px 0 15px;
}
.search-box input::placeholder{
  color: #f2f2f2;
}
.search-box .go-icon{
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  line-height: 60px;
  width: 70px;
  background: #171c24;
  border: none;
  outline: none;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
}
.wrapper input[type="checkbox"]{
  display: none;
}

/* Dropdown Menu code start */
.content .links ul{
  position: absolute;
  background: #1f5cbe;
  top: 80px;
  z-index: -1;
  opacity: 0;
  visibility: hidden;
}
.content .links li:hover > ul{
  top: 70px;
  opacity: 1;
  visibility: visible;
  transition: all 0.3s ease;
}
.content .links ul li a{
  display: block;
  width: 100%;
  line-height: 30px;
  border-radius: 0px!important;
}
.content .links ul ul{
  position: absolute;
  top: 0;
  right: calc(-100% + 8px);
}
.content .links ul li{
  position: relative;
}
.content .links ul li:hover ul{
  top: 0;
}

/* Responsive code start */
@media screen and (max-width: 1250px){
  .wrapper nav{
    max-width: 100%;
    padding: 0 20px;
  }
  nav .content .links{
    margin-left: 30px;
  }
  .content .links li a{
    padding: 8px 13px;
  }
  .wrapper .search-box{
    max-width: calc(100% - 100px);
  }
  .wrapper .search-box input{
    padding: 0 100px 0 15px;
  }
}

@media screen and (max-width: 900px){
  .wrapper .menu-icon{
    display: block;
  }
  .wrapper #show-menu:checked ~ .menu-icon i::before{
    content: "\f00d";
  }
  nav .content .links{
    display: block;
    position: fixed;
    background: #14181f;
    height: 100%;
    width: 100%;
    top: 70px;
    left: -100%;
    margin-left: 0;
    max-width: 350px;
    overflow-y: auto;
    padding-bottom: 100px;
    transition: all 0.3s ease;
  }
  nav #show-menu:checked ~ .content .links{
    left: 0%;
  }
  .content .links li{
    margin: 15px 20px;
  }
  .content .links li a,
  .content .links li label{
    line-height: 40px;
    font-size: 20px;
    display: block;
    padding: 8px 18px;
    cursor: pointer;
  }
  .content .links li a.desktop-link{
    display: none;
  }

  /* dropdown responsive code start */
  .content .links ul,
  .content .links ul ul{
    position: static;
    opacity: 1;
    visibility: visible;
    background: none;
    max-height: 0px;
    overflow: hidden;
  }
  .content .links #show-features:checked ~ ul,
  .content .links #show-services:checked ~ ul,
  .content .links #show-items:checked ~ ul{
    max-height: 100vh;
  }
  .content .links ul li{
    margin: 7px 20px;
  }
  .content .links ul li a{
    font-size: 18px;
    line-height: 30px;
    border-radius: 5px!important;
  }
}

@media screen and (max-width: 400px){
  .wrapper nav{
    padding: 0 10px;
  }
  .content .logo a{
    font-size: 27px;
  }
  .wrapper .search-box{
    max-width: calc(10% - 30px);
  }
  .wrapper .search-box .go-icon{
    width: 40px;
    right: 0px;
  }
  .wrapper .search-box input{
    padding-right: 30px;
  }
}
.dummy-text {
  position: fixed;
  top: 50%;
  left: 50%;
  width: 100%;
  z-index: -1;
  padding: 0 20px;
  text-align: left;
  transform: translate(-50%, -50%);
  display: flex;
}
  #editModal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgb(65, 55, 55);
    padding: 20px;
    border: 2px solid rgb(88, 16, 16);
  }
  
  #editModal form {
    display: flex;
    flex-direction: column;
  }
  
  #editModal label {
    margin-top: 10px;
  }


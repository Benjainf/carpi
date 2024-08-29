<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Meta para la vista en dispositivos móviles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>SIGEFLEX</title> <!-- Título de la página -->
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="FotosLogin/logoo.png" alt="logo" width="50px" style="border-radius: 25%;">
                Singeflex
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nuevos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reportes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Reporte 1</a></li>
                            <li><a class="dropdown-item" href="#">Reporte 2</a></li>
                            <li><a class="dropdown-item" href="#">Reporte 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Listados
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Listado 1</a></li>
                            <li><a class="dropdown-item" href="#">Listado 2</a></li>
                            <li><a class="dropdown-item" href="#">Listado 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Creditos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Salir</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php">
                            <button type="button" class="btn btn-outline-danger">Iniciar Sesión</button>
                        </a>
                    </li>
                </ul>
                <form class="d-flex ms-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-lg my-5">
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

        <div class="mt-4">
            <h2>Crear Nuevo Usuario</h2>
            <form id="newUserForm" method="post" action="create_user.php">
                <div class="mb-3">
                    <label for="newDNI" class="form-label">DNI:</label>
                    <input type="text" class="form-control" id="newDNI" name="dni" required>
                </div>
                <div class="mb-3">
                    <label for="newApellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="newApellido" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="newNombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="newNombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="newEdad" class="form-label">Edad:</label>
                    <input type="number" class="form-control" id="newEdad" name="edad" required>
                </div>
                <div class="mb-3">
                    <label for="newUsuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="newUsuario" name="Usuario" required>
                </div>
                <div class="mb-3">
                    <label for="newContrasenia" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="newContrasenia" name="Contrasenia" required>
                </div>
                <div class="mb-3">
                    <label for="newPermiso" class="form-label">Permiso:</label>
                    <select class="form-select" id="newPermiso" name="permiso" required>
                        <option value="1">Administrador</option>
                        <option value="2">Super Usuario</option>
                        <option value="3">Invitado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>
        </div>

        <div id="editModal" class="modal" tabindex="-1" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modificar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editDNI" name="dni">
                            <div class="mb-3">
                                <label for="editApellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="editApellido" name="apellido">
                            </div>
                            <div class="mb-3">
                                <label for="editNombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="editNombre" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="editEdad" class="form-label">Edad:</label>
                                <input type="number" class="form-control" id="editEdad" name="edad">
                            </div>
                            <div class="mb-3">
                                <label for="editUsuario" class="form-label">Usuario:</label>
                                <input type="text" class="form-control" id="editUsuario" name="Usuario">
                            </div>
                            <div class="mb-3">
                                <label for="editPermiso" class="form-label">Permiso:</label>
                                <input type="text" class="form-control" id="editPermiso" name="permiso">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-POdVZ3tC6lW4naDpT5RmzqxO0i5pzhRO5X77o3l12tnnJKIh4TYJL59b/hwXlTCW" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>

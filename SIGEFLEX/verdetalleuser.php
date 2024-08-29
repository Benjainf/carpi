<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Usuario</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-3">
  <h1>Detalles del Usuario</h1>

  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_de_datos";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("ConexiÃ³n fallida: " . $conn->connect_error);
    }
    
    $dni = isset($_GET['dni']) ? $_GET['dni'] : '';
    
    if ($dni) {
        $sql = "SELECT dni, nombre, apellido, edad, Usuario FROM usuario WHERE dni = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $edad = $row['edad'];
            $usuario = $row['Usuario'];
        } else {
            $nombre = "No encontrado";
            $apellido = "No encontrado";
            $edad = "No encontrado";
            $usuario = "No encontrado";
        }
    
        $stmt->close();
    } else {
        $nombre = "No especificado";
        $apellido = "No especificado";
        $edad = "No encontrado";
        $usuario = "No encontrado";
    }
    
    $conn->close();
    if ($dni) {
      echo '<div class="card">';
        echo '<div class="card-body">';
          echo '<p class="card-text"><strong>DNI:</strong> ' . $dni . '</p>';
          echo '<p class="card-text"><strong>Nombre:</strong> ' . $nombre . '</p>';
          echo '<p class="card-text"><strong>Apellido:</strong> ' . $apellido . '</p>';
          echo '<p class="card-text"><strong>Edad:</strong> ' . $edad . '</p>';
          echo '<p class="card-text"><strong>Usuario:</strong> ' . $usuario . '</p>';
        echo '</div>';
      echo '</div>';
    } else {
      echo '<p class="alert alert-warning">DNI no especificado.</p>';
    }
  ?>

  <a href="principal.php" class="btn btn-primary mt-3">Volver</a>
</div>
</body>
</html>
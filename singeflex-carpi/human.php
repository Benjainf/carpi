<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    
   background-color: #2b2ead;
}
    </style>
</head>
<body >
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baseforo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, titulo, descripcion, id_usuario, id_cargo, id_imagen, fecha FROM publicaciones";
$result = $conn->query($sql);
?>

    <?php
      $result_etiquetas = mysqli_query($conn, $query_etiquetas);
      $etiquetas = mysqli_fetch_assoc($result_etiquetas);
  
      // Solo añadir etiquetas que tengan valor
      $etiquetas_con_valor = [];
      for ($i = 1; $i <= 5; $i++) {
          $etiqueta = $etiquetas["etiqueta$i"];
          if (!empty($etiqueta)) {
              $etiquetas_con_valor[] = $etiqueta;
          }
          echo $etiqueta;
      }
    
      ?>
    <h1> Hey Humans!</h1>
</body>
</html>
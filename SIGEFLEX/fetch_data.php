<?php
$servername = "localhost"; // Nombre del servidor de la base de datos (generalmente 'localhost' en entornos locales)
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos (generalmente vacía en entornos locales)
$dbname = "base_de_datos"; // Nombre de la base de datos a la que se va a conectar

// Crear conexión usando mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); // Si hay error de conexión, se muestra un mensaje y se termina el script
}

$sql = "SELECT dni, apellido, nombre, edad, Usuario, permiso FROM usuario"; // Consulta SQL para seleccionar datos de la tabla 'usuario'
$result = $conn->query($sql); // Ejecutar la consulta SQL y almacenar el resultado en $result

$data = array(); // Inicializar un arreglo vacío para almacenar los datos obtenidos de la consulta

// Verificar si hay filas retornadas por la consulta
if ($result->num_rows > 0) {
    // Recorrer cada fila del resultado y almacenarla en $data como un arreglo asociativo
    while($row = $result->fetch_assoc()) {
        $data[] = $row; // Agregar la fila al arreglo $data
    }
}

$conn->close(); // Cerrar la conexión a la base de datos al finalizar el script

echo json_encode(array("data" => $data)); // Convertir el arreglo $data a formato JSON y enviarlo como respuesta
?>

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

$dni = $_POST['dni']; // Obtener el valor del campo 'dni' enviado por POST desde el formulario
$apellido = $_POST['apellido']; // Obtener el valor del campo 'apellido' enviado por POST desde el formulario
$nombre = $_POST['nombre']; // Obtener el valor del campo 'nombre' enviado por POST desde el formulario
$edad = $_POST['edad']; // Obtener el valor del campo 'edad' enviado por POST desde el formulario
$usuario = $_POST['Usuario']; // Obtener el valor del campo 'Usuario' enviado por POST desde el formulario (nota: el nombre del campo debería coincidir exactamente)
$permiso = $_POST['permiso']; // Obtener el valor del campo 'permiso' enviado por POST desde el formulario

$sql = "UPDATE usuario SET apellido='$apellido', nombre='$nombre', edad='$edad', Usuario='$usuario', permiso='$permiso' WHERE dni=$dni";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado correctamente"; // Si la consulta se ejecuta correctamente, se muestra este mensaje
} else {
    echo "Error actualizando el registro: " . $conn->error; // Si hay algún error en la consulta, se muestra el mensaje de error
}

$conn->close(); // Cerrar la conexión a la base de datos al finalizar el script
?>

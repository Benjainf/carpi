<?php
session_start(); // Inicia la sesión

include 'Db.php'; // Incluye el archivo de conexión a la base de datos

$user = $_POST['user']; // Obtiene el valor del campo de usuario del formulario
$pass = $_POST['pass']; // Obtiene el valor del campo de contraseña del formulario

$consultaUnaTabla = "SELECT * FROM USUARIO WHERE Usuario ='$user' AND Contrasenia = '$pass' "; // Consulta SQL para seleccionar un usuario según el nombre de usuario y contraseña proporcionados

//$consultaDosTablas= "Aqui usar INNER JOIN "; // Ejemplo de consulta con JOIN, pero actualmente comentado

$Conect = Conexion('base_de_datos'); // Establece la conexión a la base de datos utilizando una función llamada 'Conexion' (supuestamente definida en 'Db.php')

$Result = Ejecutar_Consulta($Conect, $consultaUnaTabla); // Ejecuta la consulta SQL utilizando una función llamada 'Ejecutar_Consulta' (supuestamente definida en 'Db.php')

echo $Cant_Filas = mysqli_num_rows($Result); // Cuenta el número de filas devueltas por la consulta y lo muestra (esto probablemente para propósitos de depuración)

if ($Cant_Filas > 0) { // Si se encontraron filas que coinciden con el usuario y contraseña

    // Mostrar los datos de cada fila (suponiendo que solo haya una fila)
    while ($row = mysqli_fetch_array($Result)) {
        $_SESSION['DNI'] = $row["DNI"]; // Guarda el valor del campo DNI en la sesión
        $_SESSION['Nombre'] = $row["nombre"]; // Guarda el valor del campo nombre en la sesión
        $_SESSION["Apellido"] = $row["apellido"]; // Guarda el valor del campo apellido en la sesión
        $_SESSION["Permiso"] = $row["Permiso"]; // Guarda el valor del campo Permiso en la sesión
    }
	
    header('location: usuario.php'); // Redirige a la página principal una vez que el inicio de sesión fue exitoso
	
} else {
    header('location: login.php'); // Redirige de vuelta a la página de inicio de sesión si no se encontraron coincidencias
}
?>

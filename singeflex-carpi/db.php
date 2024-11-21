<?php
function Conexion($database) {
    $servername = "localhost";  
    $username = "root";  
    $password = "";  
    $dbname = "base_de_datos";      

    $cone=mysqli_connect($servername,$username,$password,$dbname);

    if (!$cone) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    return $cone;
}

function Ejecutar_Consulta($con, $query) {
    // Ejecutar la consulta
    $result = mysqli_query($con, $query);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($con));
    }

    return $result;
}

?>


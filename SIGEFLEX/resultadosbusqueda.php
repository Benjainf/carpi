<?php  
// ResultadoBusqueda.php  

if (isset($_POST['Busqueda'])) {  
    $Busqueda = $_POST['Busqueda'];  
    echo "Resultados para: " . htmlspecialchars($Busqueda);  
    
    // Aquí continuamos con el siguiente paso...  
} else {  
    echo "No se recibió ninguna búsqueda.";  
}  
?>
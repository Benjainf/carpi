<?php
session_start(); // Asegúrate de iniciar la sesión

   // Incluir el autoloader de Composer
   require 'vendor/autoload.php';

   use Cloudinary\Cloudinary;
   use Cloudinary\Configuration\Configuration;
   use Cloudinary\Api\Upload\UploadApi;
   use Cloudinary\Api\Exception\ApiError; 

   
   // Configuración de Cloudinary
   Configuration::instance([
       'cloud' => [
           'cloud_name' => 'dumb2ftsf', 
           'api_key'    => '635577974236133',  
           'api_secret' => '3P2P4JJu1xkBWMY-Ti9xKCqbwNQ',  
           'secure'     => true
       ]
   ]);
   if(isset($_POST['submit'])){
    if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK){
        $fileTempPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        try {
            // Subir archivo a Cloudinary
            $result = (new UploadApi())->upload($fileTempPath, [
                'folder' => 'foro-imagenes', // Opcional: especifica una carpeta en Cloudinary
                'public_id' => pathinfo($_FILES['image']['name'], PATHINFO_FILENAME), // Nombre del archivo sin extensión
                'overwrite' => true,
                'resource_type' => 'image' // Indica que se está subiendo una imagen
            ]);

            // URL de la imagen subida
            $url = $result['secure_url'];
           

        } catch (ApiError $e) {
            // Mostrar error si algo sale mal
            echo "Error al subir la imagen: " . $e->getMessage();
        }

    } else {
        echo "No se ha subido ningún archivo o ha ocurrido un error.";
    }
}

//Subir PDF
if(isset($_POST['submit'])){
    if(isset($_FILES['pdf']) && $_FILES['pdf']['error'] == UPLOAD_ERR_OK){
        $fileTempPath = $_FILES['pdf']['tmp_name'];
        $fileName = $_FILES['pdf']['name'];
        $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME);
        try {
            // Subir archivo a Cloudinary
            $result = (new UploadApi())->upload($fileTempPath, [
                'folder' => 'foro-imagenes', // Opcional: especifica una carpeta en Cloudinary
                'public_id' => $fileBaseName, // Nombre del archivo sin extensión
                'overwrite' => true,
                'resource_type' => 'raw' // Indica que se está subiendo una imagen
            ]);

            // URL de la imagen subida
            $urlpdf = $result['secure_url'];
           

        } catch (ApiError $e) {
            // Mostrar error si algo sale mal
            echo "Error al subir la pdf: " . $e->getMessage();
        }

    } else {
        echo "pdf";
    }
}
require 'funciones.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos


if (isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = date('Y-m-d'); // Fecha actual
    $id_usuario = $_SESSION['id'];

    // Subida de archivos
    $imagen_path = $url;
    $pdf_path = $urlpdf;

    // Mover los archivos subidos a sus respectivas ubicaciones
    move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_path);
    move_uploaded_file($_FILES['foto_portada']['tmp_name'], $pdf_path);

    // Inserción en la tabla `publicaciones`
    $insert_publicacion = "INSERT INTO publicaciones (titulo, descripcion, id_usuario, id_pdf, id_imagen, fecha, pdf) 
                           VALUES ('$titulo', '$descripcion', '$id_usuario', '$urlpdf', '$url', '$fecha', '$fileBaseName')";
    if (mysqli_query($conn, $insert_publicacion)) {
        // Obtener el ID de la publicación recién insertada
        $publicacion_id = mysqli_insert_id($conn);

        // Procesar etiquetas seleccionadas
        if (isset($_POST['etiquetas'])) {
            $etiquetas = $_POST['etiquetas'];

            // Preparar el statement para insertar las etiquetas
            $stmtCatePubli = $conn->prepare("INSERT INTO catepubli (publicacion_id, categorias_id) VALUES (?, ?)");

            // Recorrer las etiquetas seleccionadas y hacer una inserción por cada una
            foreach ($etiquetas as $categoria_id) {
                $stmtCatePubli->bind_param('ii', $publicacion_id, $categoria_id);
                if (!$stmtCatePubli->execute()) {
                    echo "Error al insertar etiqueta: " . $stmtCatePubli->error;
                }
            }

            // Cerrar el statement
            $stmtCatePubli->close();

            // Redireccionar a la página principal si todo fue exitoso
            header("Location: index.php");
        } else {
            echo "No se seleccionaron etiquetas.";
        }
    } else {
        echo "Error al insertar publicación: " . mysqli_error($conn);
    }

    // Cerrar la conexión
    mysqli_close($conn);
}
?>
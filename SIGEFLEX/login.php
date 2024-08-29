<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"> <!-- Define el conjunto de caracteres como UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la vista adaptable -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> <!-- Enlace al archivo CSS de Bootstrap -->
  <link rel="stylesheet" href="css/style.css"> <!-- Enlace a tu archivo CSS personalizado -->
  <title>Mi Formulario</title> <!-- Título de la página -->
</head>
<body>
     
        <div class="container" >
<!-- <div class="logo">
            <img class="logo_img" src="FotosLogin/notfund.png" alt="logo"> Imagen del logo 
          </div> -->
          <div class="row justify-content-center pt-0 mt-5 m-1"> <!-- Columna de Bootstrap con ancho medio en dispositivos medianos -->
              <div class="formulario"> 
            
                <h1 class="form-group mx-sm-4 pb-2"> Iniciar Sesion </h1> <!-- Título principal -->

                <form action="metadatos.php" method="post"> <!-- Formulario que envía datos a metadatos.php con el método POST y la clase 'form' -->
                    <div class="form-group text-center pt-3">
                      <input class="form-control" type="text" name="user" placeholder="Usuario"> <!-- Campo de entrada para el usuario -->
                    </div>

                      <div class="form-group text-center pt-3">
                        <input class="form-control" type="password" name="pass" placeholder="Contraseña"> <!-- Campo de entrada para la contraseña -->
                      </div> <!-- Aquí estaba un cierre erróneo de una etiqueta div -->

                        
                          <div class="form-group mx-sm-1 pb-1">
                            <input class="btn btn-outline-danger" type="submit" value="ingresar "> <!-- Botón de enviar el formulario -->
                          </div>

                </form>
              </div> 
        </div> <!-- Cierre de la columna Bootstrap -->

    </div> <!-- Cierre del div, probablemente falta un cierre </div> al final -->

  </div> <!-- Cierre del contenedor principal -->

  

</body>
</html>

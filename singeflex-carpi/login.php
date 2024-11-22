<!DOCTYPE html>
<html lang="es">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css\style.css">
        <title>Login</title>
        <link rel="icon" type="image/png" href="img/legoo.png">
      </head>

    <body>
    <?php
include 'funciones.php';
?>
     <style>
        .logo{
            height: 5rem !important;
        }

     </style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Mulish&display=swap"
            rel="stylesheet"
            type='text/css'
        >
        <link rel="stylesheet" type="text/css" href="css\style_login.css">
    </head>
    <body>
        
            <div class="form-side">
                <a href="index.php" title="Logo">
                    <img src="img/legoo.png" class='logo' alt="sigeflex logo">
                </a>
                <form action="metadatos.php" method="POST" class="my-form">
                    <div class="form-welcome-row">
                        <h1>Ingrese a su usuario!</h1>
                    </div>

                    <div class="text-field">
                        <label for="usuario">Usuario:
                            <input
                                type="text"
                                id="usuario"
                                name="usuario"
                                autocomplete="off"
                                placeholder="Ingrese Su Usuario"
                                required
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 9m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M12 14c-5 0 -8 2.5 -8 6h16c0 -3.5 -3 -6 -8 -6z"></path>
                            </svg>
                        </label>
                    </div>
                    <div class="text-field">
                        <label for="password">Contraseña:
                            <input
                                id="password"
                                type="password"
                                name="contraseña"
                                placeholder="Tu Contraseña"
                                required
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                                <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                            </svg>
                        </label>
                    </div>
                    <button type="submit" class="my-form__button">
                        Ingresar
                    </button>
                </form>
            </div>
        
        <script src="script.js"></script>

<?php
footer();
?>

    </body>
</html>


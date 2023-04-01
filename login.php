<?php

session_start();

if(isset($_SESSION['usuario'])){
    header("location: home.php");

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---Icono Pestaña--->
    <link rel="shortcut icon" href="img/craneo.png">
    <title>BC</title>
    <link rel="stylesheet" href="css/login.css">
  
</head>
<body>
    <main>
        <div class="contenedor_todo">
            <div class="caja_trasera">
                <div class="caja_trasera-login">
                    <h3>Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar a la página</p>
                    <button id="btn-iniciar_sesion">Iniciar sesión</button>

            </div>
            <div class="caja_trasera-register">
                <h3>Aún no tienes una cuenta?</h3>
                <p>Registrate para que puedas iniciar sesión</p>
                <button id="btn-registrarse">Registrarse</button>

        </div>
        </div>
        <!--Formulario login-registro-->
        <div class="contenedor_login-register">
            <!--Login-->
            <form action="php/login_usuario_be.php" method="POST" class="formulario_login">
                <h2>Iniciar sesión</h2>
                <input type="text" placeholder="Correo electronico" name="correo">
                <input type="password" placeholder="Contraseña" name="contrasena">
                <button>Entrar</button>
            </form>
            <!--Registro-->
            <form action="php/registro_usuario_be.php" method="POST" class="formulario_register">
                <h2>Registrarse</h2>
                <input type="text" placeholder="Nombre completo " name="nombre_completo">
                <input type="text" placeholder="Correo electronico "  name="correo">
                <input type="text" placeholder="Usuario "  name="usuario">
                <input type="password" placeholder="Contraseña"  name="contrasena">
                <button>Registrarse</button>
                
            </form>
        </div>
        <!--Cierre formulario-->

        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>
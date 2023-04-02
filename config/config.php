<?php

define("KEY_TOKEN", "ABC.def123*");
define("MONEDA", "$");

session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
      alert("Por favor debes iniciar sesion");
      window.location = "../login.php";
    </script>
  ';

    session_destroy();
    die();
}


$num_cart =0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>
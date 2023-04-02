<?php

include_once '../restaurante/config/db.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT * FROM usuarios";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  echo '
    <script>
      alert("EY EY EY inicie sesion sapa");
      window.location = "login.php";
    </script>
  ';

  session_destroy();
  die();
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <!-- CSS --->
  <link rel="stylesheet" href="css/home.css">


</head>

<body>
  <div class="card gradiente-lateral">
    <br>
    <br>
    <h3>
      <font face="Comic Sans MS,arial,verdana">BLACK CAVERN</font>
    </h3>
    <div class="img">
      <img id="sapaa" src="img/craneo.png">
      <!--
  <a href="php/cerrar_sesion.php">
  <button type="button" class="btn btn-dark">Cerrar</button>
  </a>
-->

    </div>
    <br>
  </div>
  <ul>
    <li><a href="vista/catalogo.php">Carta</a></li>
    <li><a href="vista/lreserva.php">Lista de reservas</a></li>
    <li><a href="#footer">Contactos</a></li>
    <li><a href="php/cerrar_sesion.php">Cerrar</a></li>
  </ul>
  <div class="tittle">
    <h2>Hello bitch</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta veritatis qui ducimus sed consequatur nesciunt, dolorem soluta dolores incidunt est. Quidem inventore dolorem voluptatum labore illo! Numquam dolores excepturi illo.</p>
    <div class="boton_r">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Reserva tu mesa!
      </button>
    </div>
  </div>


  <!-- Modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Reserva</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="php/conexionresrv.php" method="POST">
            <label> Nombre</label>
            <select name="name" class="form-control">

              <option>  Seleccione  </option>
              <?php
              foreach ($usuarios as $filtro) {
              ?>
                <option><?php echo $filtro['nombre'] ?></option>
              <?php
              }
              ?>
            </select><br>
            <label> Correo</label>
            <select name="email" class="form-control">

              <option> Seleccione </option>
              <?php
              foreach ($usuarios as $filtro) {
              ?>
                <option><?php echo $filtro['correo'] ?></option>
              <?php
              }
              ?>
            </select><br>
            <label for="date">Fecha:</label>
            <input type="date" name="fecha">
            <label for="time">Hora:</label>
            <input type="time" name="hora">
            <label for="guests">Número de invitados:</label>
            <input type="number" name="inv">
            <label for="comments">Comentarios:</label>
            <textarea name="comments"></textarea>
            <button>Reservar mesa</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  </div>
  </div>
  <div class="card">
    <br>

    <div class="ubi ">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3007.5866264474885!2d1.1388542853545358!3d41.07802766675511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a1598315a79e51%3A0x154037fbc7145471!2sH10%20Vintage%20Salou!5e0!3m2!1ses!2sco!4v1666976556507!5m2!1ses!2sco" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="card-body text-center">
      <div class="titleubi">
        <h1 class="card-title">Ubicacion</h1>
        <p class="card-text">Estamos ubicados en la (Direccion de restaurante).</p>
        <a href="https://g.page/h10-vintage-salou?share" class="btn btn-primary">Ir a google maps</a>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <section id="footer" class="footer">
    <footer class="bg-dark text-center text-white">

      <div class="container p-4">

        <section class="mb-4">
          <center>


            <a class="btn btn-outline-light btn-floating m-1" href="https://youtu.be/m-Q1pt-hoko" role="button"><i class="fab fa-facebook-f"></i>
              <img src="img/facebook.png" height="20px">
            </a>


            <a class="btn btn-outline-light btn-floating m-1" href="https://www.youtube.com/watch?v=Bat09kKAle4" role="button"><i class="fab fa-twitter"></i>
              <img src="img/twitter.png" height="20px">
            </a>


            <a class="btn btn-outline-light btn-floating m-1" href="mailto:hotelx2022@gmail.com" role="button"><i class="fab fa-google"></i>
              <img src="img/gmail.png" height="20px">
            </a>


            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i>
              <img src="img/ig.png" height="20px">
            </a>

            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i>
              <img src="img/linkedin.png" height="20px">
            </a>
          </center>
        </section>


        <section class="">
          <form action="">

            <div class="row d-flex justify-content-center">

              <div class="col-auto">
                <p class="pt-2">
                  <strong>Comunicanos cualquier inquietud.</strong>
                </p>
              </div>

              <div class="col-md-5 col-12">

                <div class="form-outline form-white mb-4">
                  <input type="email" id="form5Example21" class="form-control" />

                </div>
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-outline-light mb-4">
                  Enviar
                </button>
              </div>

            </div>
          </form>
        </section>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="#"><button type="button" class="btn btn-outline-info">Click aqui para enviar mensaje via Whatsapp</button></a>
          </li>
        </ul>
      </div>
      </center>
      </div>
  </section>
  </div>
  </footer>
  <!-- Footer -->




  <script src="js/script.js"></script>
</body>

</html>
<?php
require '../config/config.php';
include_once '../config/db.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT * FROM productos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$Productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
session_start();

if(!isset($_SESSION['usuario'])){
  echo '
    <script>
      alert("Por favor debes iniciar sesion");
      window.location = "../login.php";
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
    <link rel="shortcut icon" href="../img/craneo.png">
    <title>BC</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

     <!-- CSS --->
     <link rel="stylesheet" type="text/css" href="../css/style.css"> 

</head>
<body>
<div class="card gradiente-lateral">
  <br>
  <br>
  <h3><font face="Comic Sans MS,arial,verdana">BLACK CAVERN</font></h3>
  <div class="img">
  <img id="sapaa" src="../img/craneo.png">
  </div>
  <br>
</div>
<ul>
  <li><a href="../home.php">Home</a></li>
  <li><a href="../php/cerrar_sesion.php">Cerrar</a></li>
</ul>
<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach($resultado as $row) { ?>
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat1.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle"><?php echo $row['nombre']; ?></h6>
              <p class="card-text">$<?php echo $row['precio']; ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat2.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle">Primer plato</h6>
              <p class="card-text">50.000</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
   
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat3.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle">Primer plato</h6>
              <p class="card-text">50.000</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat4.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle">Primer plato</h6>
              <p class="card-text">50.000</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat5.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle">Primer plato</h6>
              <p class="card-text">50.000</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat6.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle">Primer plato</h6>
              <p class="card-text">50.000</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat7.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle">Primer plato</h6>
              <p class="card-text">50.000</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat8.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle">Primer plato</h6>
              <p class="card-text">50.000</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
           <img src="../img/cat1.jpg" alt="">
            <div class="card-body">
              <h6 class="card-tittle">Primer plato</h6>
              <p class="card-text">50.000</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="" class="btn btn-success">Añadir</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

<script src="../js/anm.js"></script>
</body>
</html>
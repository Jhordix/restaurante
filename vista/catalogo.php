<?php
include_once '../config/config.php';
include_once '../config/db.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT id,nombre,precio FROM productos WHERE activo=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$Productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
  <li><a href="../chekout.php">
                Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span>
            </a></li>
</ul>
<div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach($Productos as $row) { ?>
        <div class="col">
          <div class="card shadow-sm">
            <?php 
            
            $id = $row['id'];
            $imagen = "../img/productos/".$id."/principal.jpg";

            if(!file_exists($imagen)){

              $imagen = "../images/productos/big-no-espera-firmar.jpg";
            }
            
            ?>
           <img src="<?php echo $imagen;?>">
            <div class="card-body">
              <h6 class="card-tittle"><?php echo $row['nombre']; ?></h6>
              <p class="card-text">$<?php echo number_format($row['precio'], 2, '.','.'); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a class="btn btn-outline-info" href="../vista/detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo
                  hash_hmac('sha1', $row['id'], KEY_TOKEN);?>">Detalles</a>
                </div>
                <button class="btn btn-outline-dark" type="button" onclick="addProducto(<?php echo $row['id']; ?>,
                        '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar al Carrito</button>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
  </div>

<script src="../js/anm.js"></script>
<script>
        function addProducto(id, token) {
            let url = '../php/carrito.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero

                    }
                })
        }
    </script>
</body>
</html>
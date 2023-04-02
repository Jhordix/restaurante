<?php
include_once '../config/config.php';
include_once '../config/db.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {

    echo 'Error al procesar la petición';
    exit;
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        $consulta = "SELECT count(id) FROM productos WHERE id=? AND activo=1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$id]);
        if ($resultado->fetchColumn() > 0) {

            $consulta = "SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1 LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute([$id]);
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $dir_img = '../img/productos/' . $id . '/';

            $rutaimg = $dir_img . 'principal.jpg';

            if (!file_exists($rutaimg)) {
                $rutaimg = '../img/productos/big-no-espera-firmar.jpg';
            }

            $imagenes = array();
            if (file_exists($dir_img)) {
                $dir = dir($dir_img);

                while (($archivo = $dir->read()) != false) {
                    if ($archivo != 'principal,jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))) {
                        $imagenes[] = $dir_img . $archivo;
                    }
                }
                $dir->close();
            }
        } else {
            echo 'Error al procesar la petición';
            exit;
        }
    } else {
        echo 'Error al procesar la petición';
        exit;
    }
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
    <link rel="stylesheet" type="text/css" href="../css/detalles.css">

</head>

<body>
    <div class="card gradiente-lateral">
        <br>
        <br>
        <h3>
            <font face="Comic Sans MS,arial,verdana">BLACK CAVERN</font>
        </h3>
        <div class="img">
            <img id="sapaa" src="../img/craneo.png">
        </div>
        <br>
    </div>
    <ul>
        <li><a href="../home.php">Home</a></li>
        <li><a href="../php/cerrar_sesion.php">Cerrar</a></li>
        <li><a href="../chekout.php">
                Carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart;?></span>
            </a></li>
    </ul>
    <br>


    <!--- CONTENIDO --->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">

                    <div id="carouseImages" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img id="imgproducto" src=<?php echo $rutaimg ?> class="d-block w-100">
                            </div>
                            <?php foreach ($imagenes as $img) { ?>
                                <div class="carousel-item">
                                    <img id="imgproducto" src=<?php echo $rutaimg ?> class="d-block w-100">
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouseImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouseImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 order-md-2">
                    <h2><?php echo $nombre; ?></h2>

                    <?php if ($descuento > 0) { ?>
                        <p><del><?php echo MONEDA . number_format($precio, 2, '.', '.'); ?></del></p>
                        <h2>
                            <?php echo MONEDA . number_format($precio_desc, 2, '.', '.'); ?>
                            <small class="text-success"><?php echo $descuento; ?> % descuento </small>
                        </h2>

                    <?php } else { ?>

                        <h2><?php echo MONEDA . number_format($precio, 2, '.', '.'); ?></h2>

                    <?php } ?>
                    <p class="lead">
                        <?php echo $descripcion; ?>
                    </p>

                    <div class="d-grid gap-3 col-10 mx-auto">
                        <button class="btn btn-outline-dark" type="button" onclick="addProducto(<?php echo $id; ?>,
                        '<?php echo $token_tmp; ?>')">Agregar al Carrito</button>


                    </div>
                </div>

            </div>
        </div>
    </main>



    <script src="js/script.js"></script>

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
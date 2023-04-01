<?php

include_once '../php/lista_reservas.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT * FROM reservas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
     <link rel="stylesheet" type="text/css" href="../css/reservas.css"> 
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

<div class="container">

		<br>
	<table class="table table-dark table-striped">
   <thead>
    <tr>
	   <th scope="col">Nombres</th>
      <th scope="col">Correo</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col"># Invitados</th>
	   <th scope="col">Comentarios</th>
        <th scope="col"></th>
		
		
    </tr>
  </thead>
  <tbody>
  <?php
			foreach($usuarios as $filtro){
			?>
			<tr>
				<td><?php echo $filtro['nombre']?></td>
				<td><?php echo $filtro['correo']?></td>
				<td><?php echo $filtro['fecha']?></td>
				<td><?php echo $filtro['hora']?></td>
				<td><?php echo $filtro['inv']?></td>
				<td><?php echo $filtro['comments']?></td>
                <form action="" method="post">
		        <td><button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="fa-solid fa-trash-can"></i>Eliminar reserva</button></td>
                </form>
				</tr>
				<?php
			}
				?>
  </tbody>
</table>	
</body>
</html>
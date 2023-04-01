<?php
include 'lista_reservas.php';
include 'conexion_be.php';

$nombre = $_POST['name'];
$correo = $_POST['email'];
$hora = $_POST['hora'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$inv = $_POST['inv'];
$comments = $_POST['comments'];

$query = "INSERT INTO reservas(nombre,correo,fecha,hora,inv,comments) VALUES ('$nombre','$correo','$fecha','$hora','$inv','$comments')";

$verificar_fecha = mysqli_query($conexion,"SELECT * FROM reservas WHERE fecha='$fecha'"); 
if(mysqli_num_rows($verificar_fecha) > 0){
    echo '
        <script>
            alert("Esta fecha no esta disponible");
            window.location = "../home.php";
        </script>
    ';
    exit();
}
$verificar_hora = mysqli_query($conexion,"SELECT * FROM reservas WHERE hora='$hora'"); 
if(mysqli_num_rows($verificar_hora) > 0){
    echo '
        <script>
            alert("Esta hora no esta disponible");
            window.location = "../home.php";
        </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion,$query);
if($ejecutar){
    echo '
        <script>
            alert("Mesa reservada")
            window.location = "../home.php";
        </script>
    ';
}else{
    echo '
    <script>
        alert("Intentalo de nuevo")
        window.location = "../login.php";
    </script>
';
}
?>

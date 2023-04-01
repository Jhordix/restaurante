<?php
include_once("../php/conexion_be.php");
$id = $_GET['id'];

$eliminar = "DELETE FROM reservas WHERE id='$id'";
$resultado = mysqli_query($conexion, $eliminar);

if($resultado){
    echo"<script> alert('Se ha eliminado exitosamente')
    location.href = '../vista/lreserva.php';</script>";

}
else{
    return"Error";
}
?>
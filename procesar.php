<?php

session_start();

include 'assets/conexion/conectar.php';

$usuario = $_POST ['nombre'];
$password = $_POST ['password'];




$consulta = ("select * from usuario where usuario = '$usuario' AND password = '$password'");
$ejecutar = mysqli_query ($conexion, $consulta);


while($fila = mysqli_fetch_array ($ejecutar))
{

$nombre = $fila ['nombre'];

$tipousuario = $fila ['id_tipousuario'];

$_SESSION['tipousuario'] = $tipousuario;
$_SESSION['nombre'] = $nombre;


if ($_SESSION['tipousuario'] == 1) {

   header ("Location:profesor.php");

}

}





?>

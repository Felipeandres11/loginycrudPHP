<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">

  <?php

  include 'assets/conexion/conectar.php';

  ?>

  <title> Profesor </title>
</head>
<body onload="redireccionar()">

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark ">

    <div class="container">


      <a class="navbar-brand" href="#"> <p class="text-white text-center cursiva m-auto py-1"> Administrador de Alumnos </p> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item ">
          <a class="nav-link  text-white cursiva" href="#sobremi"> <?php

          if ($_SESSION['tipousuario'] = 1 ) {
            echo "Bienvenido Profesor";
            
          }
          ?> </a>
        </li>



      </ul>
    </div>
  </div>
</nav>


<section class="py-5">

  <h1 class="text-center text-white cursiva py-5"> Editar y Eliminar Alumno </h1>


<div class="container-fluid text-center py-2">


  <table class="table py-3 bg-warning" >
    <thead class="thead-dark">
      <tr>
        <th class="cursiva" > Nombre</th>
        <th class="cursiva" > Apellido</th>
        <th class="cursiva"> Edad</th>
        <th class="cursiva" > Correo</th>
        <th class="cursiva" > Carrera</th>
        <th class="cursiva" > </th>
        <th class="cursiva" > </th>

      </tr>
    </thead>

  </div>


  <?php

  $consulta = "Select * from alumnos";
  $ejecutar = mysqli_query ($conexion, $consulta);

  while ($fila = mysqli_fetch_array ($ejecutar)) {

    $nombre = $fila ['nombre'];
    $apellido = $fila ['apellido'];
    $edad = $fila ['edad'];
    $correo = $fila ['correo'];
    $id = $fila ['codigo_boot'];

    if ($id == 1 ) {

      $carrera = "Programador Full Stack";
    }

    elseif ($id == 2) {

      $carrera = "Programacion de Video Juegos";
    }

    ?>


    <form method="POST" >
      <tr>
        <td class="text-dark cursiva "><input type="text" name="nombre" size="13" id="nombre" value="<?php echo $nombre ?>" ></td>
        <td class="text-dark cursiva "><input type="text" name="apellido" size="13"id="apellido" value="<?php echo $apellido ?>"></td>
        <td class="text-dark cursiva "><input type="text" name="edad" size="2"id="edad" value="<?php echo $edad ?>"></td>
        <td class="text-dark cursiva "><input type="text" name="correo" size="19" id="correo" value="<?php echo $correo ?>"></td>
        <td class="text-dark cursiva "><input type="text" name="carrera" id="carrera"  value="<?php echo $carrera ?>" disabled> </td>
        <td class="text-dark cursiva "><input type="submit" name="editar" value="Editar"></td>
        <td class="text-dark cursiva "><input type="submit" name="eliminar" value="Eliminar"></td>
      </tr>
    </form>


  <?php }  ?>


</table>









<?php

if (isset($_POST ['editar']))

{

  $a_nombre = $_POST ['nombre'];
  $a_apellido = $_POST ['apellido'];
  $a_edad = $_POST ['edad'];
  $a_correo = $_POST ['correo'];

  $consulta2 = "UPDATE alumnos SET nombre = '$a_nombre', apellido = '$a_apellido', edad = '$a_edad', correo='$a_correo' WHERE codigo_boot = '$id' ";
  $ejecutar2 = mysqli_query ($conexion, $consulta2);




}

?>

<?php

if (isset($_POST ['eliminar']))

{

  $a_nombre = $_POST ['nombre'];
  $a_apellido = $_POST ['apellido'];
  $a_edad = $_POST ['edad'];
  $a_correo = $_POST ['correo'];

  $consulta3 = "DELETE FROM alumnos where nombre = '$a_nombre' and codigo_boot = '$id' ";
  $ejecutar3 = mysqli_query ($conexion, $consulta3);







}

?>




  </table>
    </div>

</section>



<section class="py-5">

  <h1 class="text-center text-white cursiva"> Agregar Alumno </h1>

  <div class="container-fluid text-center">

    <table class="table py-3 bg-warning">
      <thead class="thead-dark">
        <tr>
          <th class="cursiva" > Nombre</th>
          <th class="cursiva" > Apellido</th>
          <th class="cursiva"> Edad</th>
          <th class="cursiva" > Correo</th>
          <th class="cursiva" > Carrera</th>
          <th class="cursiva" > </th>
          <th class="cursiva" > </th>

        </tr>
      </thead>





      <form method="POST" action="profesor.php">
        <tr>
          <td class="text-dark cursiva "><input type="text" name="nombre" size="13" id="nombre" value="" ></td>
          <td class="text-dark cursiva "><input type="text" name="apellido" size="13"id="apellido" value=""></td>
          <td class="text-dark cursiva "><input type="text" name="edad" size="2"id="edad" value=""></td>
          <td class="text-dark cursiva "><input type="text" name="correo" size="19" id="correo" value=""></td>
          <td class="text-dark cursiva "><input type="text" name="carrera" id="carrera"  value=""> </td>
          <td class="text-dark cursiva "><input type="submit" name="agregar" value="Agregar"></td>
        </tr>
      </form>


      <?php

      if (isset($_POST ['agregar']))

      {

        $a_nombre = $_POST ['nombre'];
        $a_apellido = $_POST ['apellido'];
        $a_edad = $_POST ['edad'];
        $a_correo = $_POST ['correo'];
        $a_id = $_POST ['carrera'];

        $consulta4 = "INSERT INTO alumnos (nombre,apellido,edad,correo,codigo_boot) VALUES ('$a_nombre', '$a_apellido','$a_edad', '$a_correo', $a_id)";


        $ejecutar4 = mysqli_query ($conexion, $consulta4);




      }


      ?>



    </table>



  </div>



</section>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/javascript/script.js"></script>
</body>
</html>

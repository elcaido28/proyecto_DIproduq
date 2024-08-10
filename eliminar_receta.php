<?php
include('config/config.php');
$id=$_REQUEST['id'];
mysqli_query($con,"DELETE from detalle_receta where id_recetas='$id'");
mysqli_query($con,"DELETE from recetas where id_recetas='$id'");
header('Location:ingreso_recetas.php');
?>

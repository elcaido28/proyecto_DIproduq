<?php
include('config/config.php');
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE from unidad where id_unidad='$id'");
header('Location:ingreso_unidades.php');
?>

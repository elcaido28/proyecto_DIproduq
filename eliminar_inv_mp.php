<?php
include('config/config.php');
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE from inventario_mp where id_inventario_mp='$id'");
header('Location:ingreso_inv_mp.php');
?>

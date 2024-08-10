<?php
include('config/config.php');
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE from inventario_insumo where id_inventario_insumo='$id'");
header('Location:ingreso_inv_insumos.php');
?>

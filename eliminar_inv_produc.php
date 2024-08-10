<?php
include('config/config.php');
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE from inventario_produc where id_inventario_produc='$id'");
header('Location:ingreso_inv_productos.php');
?>

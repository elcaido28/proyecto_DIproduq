<?php
include('config/config.php');
$id=$_REQUEST['id'];
mysqli_query($con,"DELETE from detalle_ordenp where id_orden_produccion='$id'");
mysqli_query($con,"DELETE from orden_produccion where id_orden_produccion='$id'");
header('Location:lista_ordenp.php');
?>

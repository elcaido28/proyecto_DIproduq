<?php
include('config/config.php');
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE from cargos where id_cargos='$id'");
header('Location:ingreso_cargos.php');
?>

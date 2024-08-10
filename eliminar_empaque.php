<?php
include('config/config.php');
$id=$_REQUEST['id'];

mysqli_query($con,"DELETE from empaque where id_empaque='$id'");
header('Location:ingreso_empaques.php');
?>

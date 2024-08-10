<?php
include('config/config.php');
$id=$_REQUEST['id'];

$result=mysqli_query($con, "UPDATE empleados SET estado='2' WHERE id_empleados='$id'");
header('Location:ingreso_empleados.php');
?>
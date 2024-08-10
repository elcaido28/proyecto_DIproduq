<?php
include('config/config.php');

	$idc=$_REQUEST['id'];
	$unidad=$_POST['unidad'];

	$modificar="UPDATE unidad SET descrip='$unidad' WHERE id_unidad='$idc'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_unidades.php");
 ?>

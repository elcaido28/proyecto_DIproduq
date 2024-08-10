<?php
include('config/config.php');

	$idc=$_REQUEST['id'];
	$empaque=$_POST['empaque'];

	$modificar="UPDATE empaque SET descrip='$empaque' WHERE id_empaque='$idc'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_empaques.php");
 ?>

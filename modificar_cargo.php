<?php
include('config/config.php');

	$idc=$_REQUEST['id'];
	$cargo=$_POST['cargo'];

	$modificar="UPDATE cargos SET descrip='$cargo' WHERE id_cargos='$idc'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_cargos.php");
 ?>

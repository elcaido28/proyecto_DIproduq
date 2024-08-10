<?php
include('config/config.php');

	$id=$_REQUEST['id'];
	$rendimiento=$_POST['rendimiento'];

	$modificar="UPDATE orden_produccion SET rendimiento_lote='$rendimiento',tope_rendi_lote ='$rendimiento' WHERE id_orden_produccion='$id'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:lista_ordenP.php");
 ?>

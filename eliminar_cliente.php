<?php
include('config/config.php');

	$id=$_REQUEST['id'];
	$estado="2";


	$modificar="UPDATE clientes SET estado='$estado' WHERE id_clientes='$id'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_clientes.php");
 ?>

<?php
	include('config/config.php');

	$unidad =$_POST['unidad'];

	$ingreso=mysqli_query($con,"INSERT into unidad (descrip) values ('$unidad')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_unidades.php");
 ?>

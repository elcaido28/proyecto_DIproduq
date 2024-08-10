<?php
	include('config/config.php');

	$cargo =$_POST['cargo'];

	$ingreso=mysqli_query($con,"INSERT into cargos (descrip) values ('$cargo')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_cargos.php");
 ?>

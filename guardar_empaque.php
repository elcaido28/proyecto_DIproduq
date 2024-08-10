<?php
	include('config/config.php');

	$empaque =$_POST['empaque'];

	$ingreso=mysqli_query($con,"INSERT into empaque (descrip) values ('$empaque')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_empaques.php");
 ?>

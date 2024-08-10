<?php
	include('config/config.php');

	$ide=$_REQUEST['id'];
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];

	$ingreso=mysqli_query($con,"INSERT into usuarios (usuario, clave, id_empleados) values
('$usuario', '$clave', '$ide')") or die ("error".mysqli_error());


	// $ingreso=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$cedula','$correo','3','$estado')") or die ("error".mysqli_error());


	mysqli_close($con);
	header("Location:ingreso_empleados.php");
 ?>

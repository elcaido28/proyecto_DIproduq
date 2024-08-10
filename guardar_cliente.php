<?php
	include('config/config.php');
	$fecha=date('Y-m-d');
	$cedula=$_POST['cedula'];
  $nombrecorp=$_POST['nombrecorp'];
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$telefono=$_POST['telefono'];
  $zona=$_POST['zona'];
	$direccion=$_POST['direccion'];
  $email=$_POST['email'];
	$vendedor=$_POST['vendedor'];
	$estado="1";

	$ingreso=mysqli_query($con,"INSERT into clientes (fecha, ruc_ci, nombre_comercial, nombre_dueno, apellido_dueno, direccion, telefono, email, zona, estado, id_empleados) values
('$fecha','$cedula','$nombrecorp','$nombres','$apellidos','$direccion','$telefono','$email','$zona','$estado','$vendedor')") or die ("error".mysqli_error());

	// $ingreso=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$cedula','$correo','3','$estado')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_clientes.php");
 ?>

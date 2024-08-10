<?php
include('config/config.php');

	$id=$_REQUEST['id'];
  $cedula=$_POST['cedula'];
  $nombrecorp=$_POST['nombrecorp'];
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$telefono=$_POST['telefono'];
  $zona=$_POST['zona'];
	$direccion=$_POST['direccion'];
  $email=$_POST['email'];
	$vendedor=$_POST['vendedor'];


	$modificar="UPDATE clientes SET ruc_ci='$cedula', nombre_comercial='$nombrecorp', nombre_dueno='$nombres', apellido_dueno='$apellidos', direccion='$direccion'
  , telefono='$telefono', email='$email', zona='$zona',id_empleados='$vendedor' WHERE id_clientes='$id'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:editar_cliente.php?id=$id");
 ?>

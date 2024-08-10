<?php
	include('config/config.php');
	$fecha=date('Y-m-d');
	$cedula=$_POST['cedula'];
 	if ($_FILES["foto"]["name"]!="") {
   		$foto=$_FILES["foto"]["name"];
   		$ruta=$_FILES["foto"]["tmp_name"];
   		$logo="img_usuarios/".$foto;
   		copy($ruta,$logo);
 	}else {
   		$logo="img_usuarios/usuario.jpg";
	}
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['direccion'];
	$cargo=$_POST['cargo'];
	$estado="1";

	$ingreso=mysqli_query($con,"INSERT into empleados (fecha, cedula, foto, nombres, apellidos, direccion, telefono, id_cargos, estado) values
('$fecha','$cedula','$logo','$nombres','$apellidos','$direccion','$telefono','$cargo','$estado')") or die ("error".mysqli_error());


	// $ingreso=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$cedula','$correo','3','$estado')") or die ("error".mysqli_error());


	mysqli_close($con);
	header("Location:ingreso_empleados.php");
 ?>

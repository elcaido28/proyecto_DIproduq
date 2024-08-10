<?php
include('config/config.php');

	$idpro=$_REQUEST['id'];

	$cedula=$_POST['cedula'];
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['direccion'];
	$cargo=$_POST['cargo'];
	$estado="1";
	if ($_FILES["foto"]["name"]!="") {
   		$foto=$_FILES["foto"]["name"];
   		$ruta=$_FILES["foto"]["tmp_name"];
   		$logo="img_usuarios/".$foto;
   		copy($ruta,$logo);
 	}else {
   		$result2= mysqli_query($con,"SELECT * from empleados where id_empleados='$idpro'");
   		$row2= mysqli_fetch_assoc($result2);
   		$logo=$row2['foto'];
	}

	$modificar="UPDATE empleados SET foto='$logo', cedula='$cedula', nombres='$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', id_cargos='$cargo' WHERE id_empleados='$idpro'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:editar_empleado.php?ide=$idpro");
 ?>

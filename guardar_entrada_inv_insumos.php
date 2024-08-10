<?php
	include('config/config.php');


	$fecha=date('Y-m-d');
  $cantidad=$_POST['cantidad'];

	$id_produ_insu=$_REQUEST['id'];


$consulta="SELECT * FROM inventario_insumo WHERE id_inventario_insumo='$id_produ_insu'";
$ejec=mysqli_query($con,$consulta);
$row=mysqli_fetch_array($ejec);
$desc=$row['cantidad']+$cantidad;

$modificar="UPDATE inventario_insumo SET cantidad='$desc' WHERE id_inventario_insumo='$id_produ_insu'";
$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	// $ingreso=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$cedula','$correo','3','$estado')") or die ("error".mysqli_error());

  $ingreso=mysqli_query($con,"INSERT into detalle_inv_insumos ( fecha ,cantidad,id_inventario_insumo) values
  ('$fecha', '$cantidad','$id_produ_insu')") or die ("error".mysqli_error());



	mysqli_close($con);
	header("Location:ingreso_inv_insumos.php");
 ?>

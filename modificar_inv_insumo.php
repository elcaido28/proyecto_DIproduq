<?php
include('config/config.php');

	$id=$_REQUEST['id'];
  $nombre =$_POST['nombre'];
  $cantidad =$_POST['cantidad'];
  $unidad =$_POST['unidad'];
  $empaque =$_POST['empaque'];

	$modificar="UPDATE inventario_insumo SET nombre='$nombre',cantidad='$cantidad',id_unidad='$unidad',id_empaque='$empaque' WHERE id_inventario_insumo='$id'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:editar_inv_insumo.php?id=$id");
 ?>

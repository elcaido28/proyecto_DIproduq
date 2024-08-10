<?php
	include('config/config.php');

  $nombre =$_POST['nombre'];
  $cantidad =$_POST['cantidad'];
  $unidad =$_POST['unidad'];
  $empaque =$_POST['empaque'];

	$ingreso=mysqli_query($con,"INSERT into inventario_insumo (nombre,cantidad,id_unidad,id_empaque) values
   ('$nombre','$cantidad','$unidad','$empaque')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_inv_insumos.php");
 ?>

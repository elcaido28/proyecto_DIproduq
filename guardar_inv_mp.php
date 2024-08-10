<?php
	include('config/config.php');

	$codigo =$_POST['codigo'];
  $nombre =$_POST['nombre'];
  $descrip =$_POST['descrip'];
  $cantidad =$_POST['cantidad'];
  $unidad =$_POST['unidad'];
  $costo =$_POST['costo'];
  $precio =$_POST['precio'];

	$ingreso=mysqli_query($con,"INSERT into inventario_mp (codigo,nombre,descrip,cantidad,id_unidad,costo,preciov) values
   ('$codigo','$nombre','$descrip','$cantidad','$unidad','$costo','$precio')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_inv_mp.php");
 ?>

<?php
	include('config/config.php');

	$codigo =$_POST['codigo'];
  $nombre =$_POST['nombre'];
  $descrip =$_POST['descrip'];
  $cantidad =0;
  $cant_prese =$_POST['canti_prese'];
  $unidad =$_POST['unidad'];
  $empaque=$_POST['empaque'];
  $precio =$_POST['precio'];

	$ingreso=mysqli_query($con,"INSERT into inventario_produc (codigo,nombre,descrip,cantidad,cantidad_presenta,id_unidad,id_empaque,precio) values
   ('$codigo','$nombre','$descrip','$cantidad','$cant_prese','$unidad','$empaque','$precio')") or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_inv_productos.php");
 ?>

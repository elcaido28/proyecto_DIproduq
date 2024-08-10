<?php
include('config/config.php');

	$id=$_REQUEST['id'];
  $nombre =$_POST['nombre'];
  $descrip =$_POST['descrip'];
  $cant_prese =$_POST['canti_prese'];
  $unidad =$_POST['unidad'];
  $empaque=$_POST['empaque'];
  $precio =$_POST['precio'];

	$modificar="UPDATE inventario_produc SET nombre='$nombre',descrip='$descrip',cantidad_presenta='$cant_prese',id_unidad='$cant_prese',id_empaque='$empaque',precio='$precio' WHERE id_inventario_produc='$id'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:ingreso_inv_productos.php");
 ?>

<?php
include('config/config.php');

	$id=$_REQUEST['id'];
  $codigo =$_POST['codigo'];
  $nombre =$_POST['nombre'];
  $descrip =$_POST['descrip'];
  $cantidad =$_POST['cantidad'];
  $unidad =$_POST['unidad'];
  $costo =$_POST['costo'];
  $precio =$_POST['precio'];

	$modificar="UPDATE inventario_mp SET codigo='$codigo',nombre='$nombre',descrip='$descrip',cantidad='$cantidad'
  ,id_unidad='$unidad',costo='$costo',preciov='$precio' WHERE id_inventario_mp='$id'";

	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	mysqli_close($con);
	header("Location:editar_inv_mp.php?id=$id");
 ?>

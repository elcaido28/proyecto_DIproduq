<?php
	include('config/config.php');


	$fecha=date('Y-m-d');
  $cantidad=$_POST['cantidad'];
  $costo=$_POST['costo'];
  $precio=$_POST['precio'];
	$id_produ_mp=$_REQUEST['id'];


$consulta="SELECT * FROM inventario_mp WHERE id_inventario_mp='$id_produ_mp'";
$ejec=mysqli_query($con,$consulta);
$row=mysqli_fetch_array($ejec);
$desc=$row['cantidad']+$cantidad;

$modificar="UPDATE inventario_mp SET cantidad='$desc', preciov='$precio',costo='$costo' WHERE id_inventario_mp='$id_produ_mp'";
$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	// $ingreso=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$cedula','$correo','3','$estado')") or die ("error".mysqli_error());

  $ingreso=mysqli_query($con,"INSERT into detalle_inv_mp (id_inventario_mp,cantidad, costo, precio,fecha,ingre) values
  ('$id_produ_mp', '$cantidad','$costo','$precio', '$fecha', '1')") or die ("error".mysqli_error());



	mysqli_close($con);
	header("Location:ingreso_inv_mp.php");
 ?>

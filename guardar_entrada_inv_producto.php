<?php
	include('config/config.php');


	$fecha=date('Y-m-d');
  $cantidad=$_POST['cantidad'];
  $id_orden=$_POST['orden'];
	$id_producto=$_REQUEST['id'];


  $ingreso=mysqli_query($con,"INSERT into detalle_prod_orden (fecha, id_orden_produccion, id_inventario_produc,cantidad) values
  ('$fecha','$id_orden', '$id_producto', '$cantidad')") or die ("error".mysqli_error());
  // $ejec3=mysqli_query($con,"SELECT * FROM detalle_prod_orden WHERE id_orden_produccion='$id_orden' and id_inventario_produc='$id_producto'");
  // $canti_row3=mysqli_num_rows($ejec3);
// if ($canti_row3>0) {
//    $row3=mysqli_fetch_array($ejec3);
//    $id3=$row3['id_detalle_prod_orden'];
//    $cant3=$row3['cantidad'];
//
//    $modificar="UPDATE detalle_prod_orden SET cantidad='$cant3' WHERE id_detalle_prod_orden='$id3'";
//    $ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
// }else{
//   $ingreso=mysqli_query($con,"INSERT into detalle_prod_orden (fecha, id_orden_produccion, id_inventario_produc,cantidad) values
// ('$fecha','$id_orden', '$id_producto', '$cantidad')") or die ("error".mysqli_error());
//
// }

$consulta2="SELECT * FROM orden_produccion WHERE id_orden_produccion='$id_orden'";
$ejec2=mysqli_query($con,$consulta2);
$row2=mysqli_fetch_array($ejec2);
$desc2=$row2['tope_rendi_lote']-$cantidad;

$modificar="UPDATE orden_produccion SET tope_rendi_lote='$desc2' WHERE id_orden_produccion='$id_orden'";
$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());



$consulta="SELECT * FROM inventario_produc WHERE id_inventario_produc='$id_producto'";
$ejec=mysqli_query($con,$consulta);
$row=mysqli_fetch_array($ejec);
$desc=$row['cantidad']+$cantidad;

$modificar="UPDATE inventario_produc SET cantidad='$desc' WHERE id_inventario_produc='$id_producto'";
$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	// $ingreso=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$cedula','$correo','3','$estado')") or die ("error".mysqli_error());


	$conta=$_REQUEST['cont'];
	for($i=0; $i<= $conta; $i++){
		if($i==0){
			$can='cantidad';
			$pro='producto';

		}else{
			$can='cantidad'.$i;
			$pro='producto'.$i;

		}
	$cantidad=$_POST[$can];
	$insumo=$_POST[$pro];


	$ejec5=mysqli_query($con,"SELECT * FROM inventario_insumo WHERE id_inventario_insumo='$insumo'");
	$row5=mysqli_fetch_array($ejec5);
	$desc5=$row5['cantidad']-$cantidad;

	$modificar="UPDATE inventario_insumo SET cantidad='$desc5' WHERE id_inventario_insumo='$insumo'";
	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
	}//end for



	mysqli_close($con);
	header("Location:entrada_inv_produc.php?id=$id_producto");
 ?>

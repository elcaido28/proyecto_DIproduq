<?php
include('config/config.php');
$id=$_REQUEST['id'];
$producto=$_POST['producto'];
$tamano=$_POST['tamano'];
$unidad=$_POST['unidad'];
echo $producto." ".$tamano." ".$unidad;

$modificar="UPDATE orden_produccion SET id_recetas='$producto',tamano_lote='$tamano',unidad='$unidad'  WHERE id_orden_produccion='$id'";
	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());

// GUARDADO DE TODOS LOS DATOS DE LA FACTURA POR MEDIO DE UN FOR
if (isset($_POST['codigo1'])) {

//LISTO DETALLES DE LA ORDEN Y CANTIDAD LA SUMO AL INVENTARIO (DEVUELVE INVENTARIO)
	$consulta5=mysqli_query($con,"SELECT * from detalle_ordenp where id_orden_produccion='$id' ");
	 while($row5=mysqli_fetch_array($consulta5)){
		 $cant_detalleOrden=$row5['cantidad'];
		 $unid_detalleOrden=$row5['unidad'];
		 $ID_detalleOrden1=$row5['id_inventario_mp'];

		 if ($unid_detalleOrden=="Mililitro") {
			 $cant_detalleOrden=$cant_detalleOrden/1000;
		 }
		 if ($unid_detalleOrden=="Gramo") {
			 $cant_detalleOrden=$cant_detalleOrden/1000;
		 }

		$consulta6=mysqli_query($con,"SELECT * from inventario_mp where id_inventario_mp='$ID_detalleOrden1' ");
	 	$row6=mysqli_fetch_array($consulta6);
	 	$cant_inv2=$row6['cantidad'];
	 	//restado
	 	$cant_stock2=$cant_inv2+$cant_detalleOrden;
	 	// modifica catidad de stock
	 	$ejec=mysqli_query($con,"UPDATE inventario_mp SET cantidad='$cant_stock2' WHERE id_inventario_mp='$ID_detalleOrden1'") or die ("error".mysqli_error());
	 }



	 //ELIMINO TODOS LOS DETALLESS DE LA ORDEP
  mysqli_query($con,"DELETE from detalle_ordenp where id_orden_produccion='$id'");


  $conta=$_REQUEST['cont'];
  for($i=1; $i<= $conta; $i++){
  		$cod='codigo'.$i;
      $nomb='nombre'.$i;
  		$can='cantidad'.$i;
  		$uni='unidad'.$i;

  $codigo=$_POST[$cod];
  $nombr=$_POST[$nomb];
  $cantidad=$_POST[$can];
	$cantidad_guard=$_POST[$can];
  $unid=$_POST[$uni];

	if ($unid=="Mililitro") {
	  $cantidad=$cantidad/1000;
	}
	if ($unid=="Gramo") {
	  $cantidad=$cantidad/1000;
	}

	//RESTADO DEL INVENTARIO MP
	//buscar produc de mp
	$consulta7=mysqli_query($con,"SELECT * from inventario_mp where id_inventario_mp='$codigo' ");
	$row7=mysqli_fetch_array($consulta7);
	$cant_inv=$row7['cantidad'];
	//restado
	$cant_stock=$cant_inv-$cantidad;
	// modifica catidad de stock
	$ejec=mysqli_query($con,"UPDATE inventario_mp SET cantidad='$cant_stock' WHERE id_inventario_mp='$codigo'") or die ("error".mysqli_error());

//	registro detalle orden
  $ingreso=mysqli_query($con,"INSERT into detalle_ordenp (id_inventario_mp, cantidad, unidad, id_orden_produccion) values
   ('$codigo','$cantidad_guard','$unid','$id')") or die ("error".mysqli_error());

  }//end for
}


 mysqli_close($con);
 header("Location:lista_ordenp.php");

?>

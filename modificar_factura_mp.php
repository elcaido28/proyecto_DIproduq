<?php
session_start();
include('config/config.php');
$id=$_REQUEST['id'];

$cedula=$_POST['cedula'];
$consulta1=mysqli_query($con,"SELECT * from clientes where ruc_ci='$cedula' ");
$row1=mysqli_fetch_array($consulta1);
$id_cliente=$row1['id_clientes'];
$tpago=$_POST['tpago'];
$vendedor=$_POST['empleado'];
$id_empleado=$_SESSION['ID_usu'];

$valor=$_POST['valor'];
$descuento=$_POST['descuento'];
$subtotal=$_POST['subtotal'];
$iva=$_POST['iva'];
$totalp=$_POST['totalp'];


 $ejec=mysqli_query($con,"UPDATE factura_mp SET id_tipo_pago='$tpago',valort='$valor',descuento='$descuento',subtotal='$subtotal',iva='$iva',totalp='$totalp',vendedor='$vendedor',id_clientes='$id_cliente',id_empleados='$id_empleado' WHERE id_factura_mp='$id'") or die ("error".mysqli_error());


// OBTENER ID DE LA CABEZERA_VENTAS GUARDADA

$consulta5=mysqli_query($con,"SELECT * from detalle_factu_mp where id_factura_mp='$id' ");
 while($row5=mysqli_fetch_array($consulta5)){
   $cant_detalleOrden=$row5['cantidad'];
   $ID_detalleOrden1=$row5['id_inventario_produc'];

  $consulta6=mysqli_query($con,"SELECT * from inventario_mp where id_inventario_mp='$ID_detalleOrden1' ");
  $row6=mysqli_fetch_array($consulta6);
  $cant_inv2=$row6['cantidad'];
  //restado
  $cant_stock2=$cant_inv2+$cant_detalleOrden;
  // modifica catidad de stock
  $ejec=mysqli_query($con,"UPDATE inventario_mp SET cantidad='$cant_stock2' WHERE id_inventario_mp='$ID_detalleOrden1'") or die ("error".mysqli_error());
 }


mysqli_query($con,"DELETE from detalle_factu_mp where id_factura_mp='$id'");
// GUARDADO DE TODOS LOS DATOS DE LA FACTURA POR MEDIO DE UN FOR
$conta=$_REQUEST['cont'];
for($i=1; $i<= $conta; $i++){
		$prod='producto'.$i;
		$can='cantidad'.$i;
		$preU='preciou'.$i;
    $preT='preciot'.$i;

$id_producto=$_POST[$prod];
$cantidad=$_POST[$can];
$precioU=$_POST[$preU];
$precioT=$_POST[$preT];

//RESTADO DEL INVENTARIO MP
//buscar produc de mp
$consulta6=mysqli_query($con,"SELECT * from inventario_mp where id_inventario_mp='$id_producto' ");
$row6=mysqli_fetch_array($consulta6);
$cant_inv=$row6['cantidad'];
//restado
$cant_stock=$cant_inv-$cantidad;
// modifica catidad de stock
$ejec=mysqli_query($con,"UPDATE inventario_mp SET cantidad='$cant_stock' WHERE id_inventario_mp='$id_producto'") or die ("error".mysqli_error());

//REGITRO DE COMPONENTES A DETALLE ORDENP
$ingreso=mysqli_query($con,"INSERT into detalle_factu_mp (cantidad, valor_u, valor_t, id_inventario_mp, id_factura_mp) values
 ('$cantidad','$precioU','$precioT','$id_producto','$id')") or die ("error".mysqli_error());

}//end for

 mysqli_close($con);
 header("Location:lista_factura_mp.php");

?>

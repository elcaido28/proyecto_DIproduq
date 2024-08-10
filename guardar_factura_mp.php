<?php
session_start();
include('config/config.php');
$fecha=date('Y-m-d');
$hora=date('H:i:s');
$mfactura=$_POST['nfactura'];
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

$ingreso=mysqli_query($con,"INSERT into factura_mp (num_factura,fecha,hora,id_tipo_pago,valort,descuento,subtotal,iva,totalp,vendedor,id_clientes,id_empleados)
 values ('$mfactura','$fecha','$hora','$tpago','$valor','$descuento','$subtotal','$iva','$totalp','$vendedor','$id_cliente','$id_empleado')") or die ("error".mysqli_error());

// OBTENER ID DE LA CABEZERA_VENTAS GUARDADA
 $consulta=mysqli_query($con,"SELECT * from factura_mp ORDER BY id_factura_mp ASC ");
  while($row=mysqli_fetch_array($consulta)){
    $id_factura_productos=$row['id_factura_mp'];
  }

if ($tpago=='2') {
    $ingreso=mysqli_query($con,"INSERT into control_pagos (fecha,hora,valor_t,valor_abono,id_factura)
     values ('$fecha','$hora','$totalp','0','$mfactura')") or die ("error".mysqli_error());

  }

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
 ('$cantidad','$precioU','$precioT','$id_producto','$id_factura_productos')") or die ("error".mysqli_error());

}//end for

 mysqli_close($con);
 header("Location:ingreso_factura_product.php");

?>

<?php
	include('config/config.php');
	$fecha=date('Y-m-d');
// GUARDADO DE CABECERA_VENTAS A BD
// $id_cli=$_REQUEST['id'];
// $NoFactura=$_POST['NoFactura'];
// $Cedula=$_POST['Cedula'];
// $Nombres=$_POST['Nombres'];
// $Apellidos=$_POST['Apellidos'];
// $Direccion=$_POST['Direccion'];
// $Telefono=$_POST['Telefono'];
// $Correo=$_POST['Correo'];
// $Provincia=$_POST['Provincia'];
// $Ciudad=$_POST['Ciudad'];
// $fechadeventa=$_POST['fechadeventa'];
// $subtotal=$_POST['total'];
// $iva=$_POST['iva'];
// $tpagar=$_POST['tpagar'];
//  $descrip=$_POST['observacion'];

// $ingreso=mysqli_query($coneccion,"INSERT into cabeceraventa (NoFactura,Cedula,Nombres,Apellidos,Direccion,Telefono,Correo,Provincia,Ciudad,fechadeventa,sub_total,iva,total_pagar,descripcion,id_cliente) values ('$NoFactura','$Cedula','$Nombres','$Apellidos','$Direccion','$Telefono','$Correo','$Provincia','$Ciudad','$fechadeventa','$subtotal','$iva','$tpagar','$descrip','$id_cli')") or die ("error".mysqli_error());

// OBTENER ID DE LA CABEZERA_VENTAS GUARDADA
 // $consulta=mysqli_query($coneccion,"SELECT * from cabeceraventa ORDER BY id ASC ");
 //  while($row=mysqli_fetch_array($consulta)){
 //    $id_cabezera_Venta=$row['id'];
 //  }

// GUARDADO DE TODOS LOS DATOS DE LA FACTURA POR MEDIO DE UN FOR
$id_plan=$_REQUEST['id'];
$conta=$_REQUEST['cont'];
for($i=0; $i<= $conta; $i++){
	if($i==0){
		$can='cantidad';
		$pro='producto';
		$pre='presentacion';
	}else{
		$can='cantidad'.$i;
		$pro='producto'.$i;
		$pre='presentacion'.$i;
	}
$cantidad=$_POST[$can];
$producto=$_POST[$pro];
$presentacion=$_POST[$pre];

$consulta=mysqli_query($con,"SELECT * FROM inventario_insumos_produccion I INNER JOIN presentacion P ON I.id_presentacion=P.id_presentacion WHERE I.id_insumos_produccion = '$producto'") or die ("error".mysqli_error());
$row=mysqli_fetch_array($consulta);
	$id_producto=$row['id_insumos_produccion'];
	$nombre_producto=$row['nombre'];
	$codigo_producto=$row['codigo'];
	$cantidad_producto=$row['cantidad'];
	//resta de stock
	$nueva_cantidad=$cantidad_producto-$cantidad;

$actualizar=mysqli_query($con,"UPDATE inventario_insumos_produccion SET cantidad='$nueva_cantidad' WHERE id_insumos_produccion='$id_producto'") or die ("error".mysqli_error());
$ingreso=mysqli_query($con,"INSERT into detalle_planeacion (nombre, codigo, fecha_ingreso, cantidad, presentacion, id_planeacion) values ('$nombre_producto','$codigo_producto','$fecha','$cantidad','$presentacion','$id_plan')") or die ("error".mysqli_error());

}//end for

 mysqli_close($con);
 header("Location:asignar_insumos_produccion.php?id=$id_plan");

?>
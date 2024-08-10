<?php
session_start();
include('config/config.php');
$fecha=date('Y-m-d');
$noden=$_POST['norden'];
$nlote=$_POST['nlote'];
$producto=$_POST['producto'];
$tamano=$_POST['tamano'];
$unidad=$_POST['unidad'];

$rendimiento="0";
$rendi_tope="0";

$id_empleado=$_SESSION['ID_usu'];


$ingreso=mysqli_query($con,"INSERT into orden_produccion (num_orden,num_lote,id_recetas,tamano_lote,unidad,fecha,rendimiento_lote,tope_rendi_lote,id_empleados)
 values ('$noden','$nlote','$producto','$tamano','$unidad','$fecha','$rendimiento','$rendi_tope','$id_empleado')") or die ("error".mysqli_error());

// OBTENER ID DE LA CABEZERA_VENTAS GUARDADA
 $consulta=mysqli_query($con,"SELECT * from orden_produccion ORDER BY id_orden_produccion ASC ");
  while($row=mysqli_fetch_array($consulta)){
    $id_orden_produccion=$row['id_orden_produccion'];
  }

// GUARDADO DE TODOS LOS DATOS DE LA FACTURA POR MEDIO DE UN FOR
$conta=$_REQUEST['cont'];
for($i=1; $i<= $conta; $i++){
		$cod='codigo'.$i;
    //$nomb='nombre'.$i;
		$can='cantidad'.$i;
		$uni='unidad'.$i;

$codigo=$_POST[$cod];
//$nombr=$_POST[$nomb];
$cantidad_guard=$_POST[$can];
$cantidad=$_POST[$can];
$unid=$_POST[$uni];


if ($unid=="Mililitro") {
  $cantidad=$cantidad/1000;
}
if ($unid=="Gramo") {
  $cantidad=$cantidad/1000;
}

//RESTADO DEL INVENTARIO MP
//buscar produc de mp
$consulta6=mysqli_query($con,"SELECT * from inventario_mp where id_inventario_mp='$codigo' ");
$row6=mysqli_fetch_array($consulta6);
$cant_inv=$row6['cantidad'];
//restado
$cant_stock=$cant_inv-$cantidad;
// modifica catidad de stock
$ejec=mysqli_query($con,"UPDATE inventario_mp SET cantidad='$cant_stock' WHERE id_inventario_mp='$codigo'") or die ("error".mysqli_error());

//REGITRO DE COMPONENTES A DETALLE ORDENP
$ingreso=mysqli_query($con,"INSERT into detalle_ordenp (id_inventario_mp, cantidad, unidad, id_orden_produccion) values
 ('$codigo','$cantidad_guard','$unid','$id_orden_produccion')") or die ("error".mysqli_error());

}//end for

 mysqli_close($con);
 header("Location:ingreso_ordenp.php");

?>

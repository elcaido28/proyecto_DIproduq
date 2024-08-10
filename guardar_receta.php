<?php
	include('config/config.php');
	$fecha=date('Y-m-d');
$nombre=$_POST['nombre'];
$tamano=$_POST['tamano'];
$unidad=$_POST['unidad'];
 $descrip=$_POST['descrip'];

$ingreso=mysqli_query($con,"INSERT into recetas (nombre,descrip,tamano,id_unidad,fecha) values ('$nombre','$descrip','$tamano','$unidad','$fecha')") or die ("error".mysqli_error());

// OBTENER ID DE LA CABEZERA_VENTAS GUARDADA
 $consulta=mysqli_query($con,"SELECT * from recetas ORDER BY id_recetas ASC ");
  while($row=mysqli_fetch_array($consulta)){
    $id_recetas=$row['id_recetas'];
  }

// GUARDADO DE TODOS LOS DATOS DE LA FACTURA POR MEDIO DE UN FOR
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
$componente=$_POST[$pro];
$unidad=$_POST[$pre];

$ingreso=mysqli_query($con,"INSERT into detalle_receta (componente, cantidad, id_unidad, id_recetas) values ('$componente','$cantidad','$unidad','$id_recetas')") or die ("error".mysqli_error());

}//end for

 mysqli_close($con);
 header("Location:ingreso_recetas.php");

?>

<?php
	include('config/config.php');
  $id=$_REQUEST['id'];
	$fecha=date('Y-m-d');
$nombre=$_POST['nombre'];
$tamano=$_POST['tamano'];
$unidad=$_POST['unidad'];
 $descrip=$_POST['descrip'];

$modificar="UPDATE recetas SET nombre='$nombre',descrip='$descrip',tamano='$tamano',id_unidad='$unidad'  WHERE id_recetas='$id'";
	$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());


// GUARDADO DE TODOS LOS DATOS DE LA FACTURA POR MEDIO DE UN FOR
mysqli_query($con,"DELETE from detalle_receta where id_recetas='$id'");

$conta=$_REQUEST['cont'];
for($i=1; $i<= $conta; $i++){
		$can='cantidad'.$i;
		$pro='producto'.$i;
		$pre='presentacion'.$i;

$cantidad=$_POST[$can];
$componente=$_POST[$pro];
$unidad=$_POST[$pre];

$ingreso=mysqli_query($con,"INSERT into detalle_receta (componente, cantidad, id_unidad, id_recetas) values ('$componente','$cantidad','$unidad','$id')") or die ("error".mysqli_error());

}//end for

 mysqli_close($con);
 header("Location:ingreso_recetas.php");

?>

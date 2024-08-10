<?php
include('../config/config.php');
$salida="";
$contLin=0;
if(isset($_POST['consul'])){
  $periodo=$_POST['consul'];
$consulta=mysqli_query($con,"SELECT * from  recetas R inner join unidad U on U.id_unidad=R.id_unidad where R.id_recetas='$periodo'");
$row=mysqli_fetch_array($consulta);
$salida=$row['descrip']."***".$row['tamano'];


}else {
  $salida="";
}

echo $salida;
mysqli_close($con);

 ?>

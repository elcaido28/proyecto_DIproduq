<?php
include('../config/config.php');
$salida="";
if(isset($_POST['consul'])){
  $periodo=$_POST['consul'];
$consulta=mysqli_query($con,"SELECT * from  inventario_mp WHERE id_inventario_mp='$periodo'");
$row=mysqli_fetch_array($consulta);


  $salida.=$row['cantidad'];
  $salida.="**".$row['preciov'];



}else {
  $salida="";
}

echo $salida;
mysqli_close($con);

 ?>

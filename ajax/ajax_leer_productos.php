<?php
include('../config/config.php');
$salida="";
if(isset($_POST['consul'])){
  $periodo=$_POST['consul'];
$consulta=mysqli_query($con,"SELECT * from  inventario_produc WHERE id_inventario_produc='$periodo'");
$row=mysqli_fetch_array($consulta);


  $salida.=$row['cantidad'];
  $salida.="**".$row['precio'];



}else {
  $salida="";
}

echo $salida;
mysqli_close($con);

 ?>

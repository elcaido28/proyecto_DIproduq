<?php
include('../config/config.php');
$salida="";
if(isset($_POST['consul'])){
  $periodo=$_POST['consul'];
$consulta=mysqli_query($con,"SELECT * from  clientes WHERE ruc_ci='$periodo'");
$row=mysqli_fetch_array($consulta);
  $salida=$row['nombre_comercial'];

}else {
  $salida="";
}

echo $salida;
mysqli_close($con);

 ?>

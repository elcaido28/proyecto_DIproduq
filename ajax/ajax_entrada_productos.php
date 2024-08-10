<?php
include('../config/config.php');
$salida="";
if(isset($_POST['consul'])){
  $periodo=$_POST['consul'];
$consulta=mysqli_query($con,"SELECT * from  orden_produccion WHERE id_orden_produccion='$periodo'");
$row=mysqli_fetch_array($consulta);

if ($row['tope_rendi_lote']<=0) {
  $salida=0;
}else{
  $salida=$row['tope_rendi_lote'];
}


}else {
  $salida="";
}

echo $salida;
mysqli_close($con);

 ?>

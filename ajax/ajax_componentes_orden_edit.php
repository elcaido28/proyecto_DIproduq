<?php
include('../config/config.php');
session_start();
$salida="<tr><td><center><i><b>ID</b></i></center></td><td><center><i><b>COMPONENTES</b></i></center></td>";
$salida.="<td><center><i><b>CANTIDAD</b></i></center></td><td><center><i><b>UNIDAD</b></i></center></td></tr>";
$contLin=0;

if(isset($_POST['consu'])){
  $periodo=$_POST['consu'];
$consulta=mysqli_query($con,"SELECT *,MP.nombre nombremp,DOP.cantidad cantdr,DOP.unidad descripuni from detalle_ordenp DOP inner join inventario_mp MP on MP.id_inventario_mp=DOP.id_inventario_mp  where DOP.id_orden_produccion='$periodo'");
while($row=mysqli_fetch_array($consulta)){
$contLin++;
$salida .="<tr><td><input type='text'  id='codig".$contLin."' name='codigo".$contLin."' value='".$row['id_inventario_mp']."' readonly></td>";
$salida .="<td><input type='text'  id='nombre".$contLin."' name='nombre".$contLin."' value='".$row['nombremp']."' readonly></td>";
$salida .="<td><input type='text'  id='cantidad".$contLin."' name='cantidad".$contLin."' value='".$row['cantdr']."' readonly></td>";
$salida .="<td><input type='text'  id='unidad".$contLin."' name='unidad".$contLin."' value='".$row['descripuni']."' readonly></td></tr>";

}
$salida .="***".$contLin;

}else {
  $salida="";
}

echo $salida;
mysqli_close($con);

 ?>

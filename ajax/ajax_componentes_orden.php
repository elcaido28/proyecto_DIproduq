<?php
include('../config/config.php');
session_start();
$salida="<tr><td><center><i><b>ID</b></i></center></td><td><center><i><b>COMPONENTES</b></i></center></td>";
$salida.="<td><center><i><b>CANTIDAD</b></i></center></td><td><center><i><b>UNIDAD</b></i></center></td></tr>";
$contLin=0;

if(isset($_POST['id_prod']) && isset($_POST['tama'])){
  $id_prod=$_POST['id_prod'];
  $tama_lote=$_POST['tama'];
  $unid_tam_lote_rece='';
  $stock=0;
$consulta=mysqli_query($con,"SELECT *, MP.nombre nombremp,DR.cantidad cantdr,U.descrip descripuni,R.tamano tama_receta,UN.descrip unid_tam_rece,MP.cantidad cant_stock from detalle_receta DR inner join recetas R on R.id_recetas=DR.id_recetas inner join unidad UN on UN.id_unidad=R.id_unidad inner join inventario_mp MP on MP.id_inventario_mp=DR.componente inner join unidad U on U.id_unidad=DR.id_unidad where R.id_recetas='$id_prod'");
while($row=mysqli_fetch_array($consulta)){
$contLin++;
$unid_tam_lote_rece=$row['unid_tam_rece'];
$cant_mp_pro=($row['cantdr'] * $tama_lote)/$row['tama_receta'];

if ($row['descripuni']=="Mililitro" || $row['descripuni']=="Gramo") {
  $stock=$row['cant_stock']*1000;
}else{
  $stock=$row['cant_stock'];
}
// if ($row['descripuni']=="Gramo") {
//   $stock=$row['cant_stock']*1000;
// }else {
//   $stock=$row['cant_stock'];
// }


$salida .="<tr><td><input type='text'  id='codig".$contLin."' name='codigo".$contLin."' value='".$row['componente']."' readonly></td>";
$salida .="<td><input type='text'  id='nombre".$contLin."' name='nombre".$contLin."' value='".$row['nombremp']."' readonly></td>";
$salida .="<td><input type='number'  id='cantidad".$contLin."' name='cantidad".$contLin."' class='cant_num' value='".$cant_mp_pro."' max='".$stock."' onkeypress='return enable(event)' onpaste='return false'></td> required";
$salida .="<td><input type='text'  id='unidad".$contLin."' name='unidad".$contLin."' value='".$row['descripuni']."' readonly></td></tr>";

}
$salida .="***".$contLin."***".$unid_tam_lote_rece;

}else {
  $salida="";
}

echo $salida;
mysqli_close($con);

 ?>

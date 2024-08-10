<?php
include('../config/config.php');

$salida="<tr><td><center><i><b>PRODUCTOS</b></i></center></td><td><center><i><b>CANTIDAD</b></i></center></td>";
$salida.="<td><center><i><b>PRECIO UNIT</b></i></center></td><td><center><i><b>PRECIO TOTAL</b></i></center></td></tr>";
$contLin=0;



if(isset($_POST['consults'])){
  $periodo=$_POST['consults'];
$consulta=mysqli_query($con,"SELECT * from detalle_factu_mp where id_factura_mp='$periodo'");
while($row=mysqli_fetch_array($consulta)){
$contLin++;
$salida .="<tr><td><select id='producto_".$contLin."' name='producto".$contLin."'  onpaste='return false' required>"."<option>-SELECCIONE-</option>";
 $consult=mysqli_query($con,"SELECT * ,U.descrip descripU from inventario_mp IP inner join unidad U on U.id_unidad=IP.id_unidad where cantidad !='0'");
while($rows=mysqli_fetch_array($consult)){ if($rows['id_inventario_mp']==$row['id_inventario_mp']){$sel="selected='selected'";}else{$sel="";}
$salida .="<option ".$sel." value='".$rows['id_inventario_mp']."'>".$rows['codigo']." - ".$rows['nombre']." / ".$rows['descripU']." </option>";
 }
$salida .="</select></td><td><input type='number' size='3' placeholder='0' id='cantidad_".$contLin."' name='cantidad".$contLin."' value='".$row['cantidad']."' onKeyPress='return solonumeros(event)' onpaste='return false' min='1' onChange='calculo(this.value);'></td>";
$salida .="<td><input type='text'  placeholder='0' id='preciou_".$contLin."' name='preciou".$contLin."' value='".$row['valor_u']."' onKeyPress='return solonumeros(event)' onpaste='return false'  readonly></td>";
$salida .="<td><input type='text'  placeholder='0' id='preciot_".$contLin."' name='preciot".$contLin."' value='".$row['valor_t']."' onKeyPress='return solonumeros(event)' onpaste='return false'  readonly></td></tr>";
}
$salida .="***".$contLin;

}else {
  $salida="";
}

echo $salida;
mysqli_close($con);

 ?>

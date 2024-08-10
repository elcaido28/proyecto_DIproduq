<?php
include('TD_reportes.php');
include "config/config.php";

$id_ordn_prod=$_REQUEST['id'];
$consulta=mysqli_query($con,"SELECT * from orden_produccion OP inner join recetas R on R.id_recetas=OP.id_recetas where OP.id_orden_produccion='$id_ordn_prod'");
$row=mysqli_fetch_array($consulta);

//$consulta=mysqli_query($con,"SELECT * from tareas T INNER JOIN empleados E on T.id_empleado=E.id_empleado INNER JOIN actividades A on A.id_actividad=T.id_actividad INNER JOIN parcelas P on P.id_parcela=T.id_parcela where T.fecha BETWEEN '$desde' and '$hasta' ORDER BY T.fecha ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,utf8_decode('Orden de Producción'),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetY($y+5);
$pdf->SetFont('arial','B',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(150,10,utf8_decode('PRODUCTO: '.$row['nombre']),0,1,'L');
$pdf->Cell(60,7,utf8_decode('LOTE: '.$row['num_lote']),0,0,'L');
$pdf->Cell(60,7,utf8_decode('Nº ORDEN: '.$row['num_orden']),0,1,'L');
$pdf->Cell(60,7,utf8_decode('TAMAÑO DEL LOTE: '.$row['tamano_lote']."   ".$row['unidad']),0,0,'L');
$pdf->Cell(60,7,utf8_decode('-    RENDIMIENTO: '.$row['rendimiento_lote']),0,0,'L');
$pdf->Cell(60,7,utf8_decode('FECHA: '.$row['fecha']),0,1,'L');





$y=$pdf->GetY();
$pdf->SetY($y+15);
$pdf->SetFont('arial','B',12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(130,10,utf8_decode('Componentes'),1,0,'C');
$pdf->Cell(30,10,utf8_decode('Cantidad'),1,0,'C');
$pdf->Cell(20,10,utf8_decode('Unidad'),1,1,'C');

$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta5=mysqli_query($con,"SELECT * , DO.cantidad canti_ingre from detalle_ordenp DO inner join inventario_mp IMP on IMP.id_inventario_mp=DO.id_inventario_mp where  DO.id_orden_produccion='$id_ordn_prod' ");
while($row5=mysqli_fetch_array($consulta5)){

$pdf->Cell(130,10,utf8_decode($row5['nombre']),1,0,'C');
$pdf->Cell(30,10,utf8_decode($row5['canti_ingre']),1,0,'C');
$pdf->Cell(20,10,utf8_decode($row5['unidad']),1,1,'C');

}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>

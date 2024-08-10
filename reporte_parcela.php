<?php
include('TD_reportes.php');
include('conexion.php');

$consulta=mysqli_query($con,"SELECT * from parcelas ORDER BY id_parcela ASC");

//$consulta=mysqli_query($con,"SELECT * from tareas T INNER JOIN empleados E on T.id_empleado=E.id_empleado INNER JOIN actividades A on A.id_actividad=T.id_actividad INNER JOIN parcelas P on P.id_parcela=T.id_parcela where T.fecha BETWEEN '$desde' and '$hasta' ORDER BY T.fecha ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'REPORTE DE PARCELAS',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)
 
$y=$pdf->GetY();
$pdf->SetY($y+15);
$pdf->SetFont('arial','B',8);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);
$pdf->Cell(30,10,utf8_decode('Nº de parcela'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('Fecha de Plantación'),1,0,'C',true);
$pdf->Cell(100,10,utf8_decode('Descripción'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('estado'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row5=mysqli_fetch_array($consulta)){

$pdf->Cell(30,10,utf8_decode($row5['numero_parcela']),1,0,'C');
$pdf->Cell(30,10,utf8_decode($row5['fecha_plantacion']),1,0,'C');
$pdf->Cell(100,10,utf8_decode($row5['descripcion']),1,0,'C');
$pdf->Cell(30,10,utf8_decode($row5['estado']),1,1,'C');


}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>

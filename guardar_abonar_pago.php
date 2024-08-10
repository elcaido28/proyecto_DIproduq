<?php
	include('config/config.php');
  session_start();
  $id_empleado=$_SESSION['ID_usu'];
	$id_control=$_REQUEST['id'];
  $fecha=date('Y-m-d');
  $hora=date('H:i:s');
  $cli =$_REQUEST['cli'];
  $nfact =$_REQUEST['nfact'];
  $valor =$_POST['valor'];

	$ingreso=mysqli_query($con,"INSERT into abonar_pago (fecha,hora,cantidad,id_control_pagos ,id_empleados ) values ('$fecha','$hora','$valor' ,'$id_control','$id_empleado')") or die ("error ingreso".mysqli_error());



  $consulta=mysqli_query($con,"SELECT * from control_pagos where id_control_pagos='$id_control'");
  $row=mysqli_fetch_array($consulta);
    $totalf=$row['valor_t'];
    $valorg=$row['valor_abono'];
  $valort=$valorg+$valor;
  $t_adeud=$totalf-$valort;

  $ejec=mysqli_query($con,"UPDATE control_pagos SET valor_abono ='$valort',adeuda='$t_adeud' WHERE id_control_pagos='$id_control'") or die ("error modificar valor".mysqli_error());

	mysqli_close($con);
	header("Location:abonar_pago.php?id=$id_control&cli=$cli&nfact=$nfact");
 ?>

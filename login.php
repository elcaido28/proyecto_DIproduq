<?php
session_start();
  $nomU = $_POST['usuario'];
  $pas = $_POST['clave'];
  if(empty($nomU) || empty($pas) ){
  	header("Location: index.php");
  	exit();  }
   include('config/config.php');

  $result= mysqli_query($con,"SELECT * from empleados E inner join usuarios U on U.id_empleados=E.id_empleados where U.usuario ='$nomU' and U.clave ='$pas'");
   $num_row=mysqli_num_rows($result);
  if($num_row>0){
      $row= mysqli_fetch_assoc($result);
      $abc=$row['id_empleados'];
    $result2= mysqli_query($con,"SELECT * from empleados where  id_empleados='$abc'");
     $row4= mysqli_fetch_assoc($result2);
     $_SESSION['ID_usu']=$row['id_empleados'];
     $_SESSION['NU']=$row4['nombres']." ".$row4['apellidos'];
    //$_SESSION['PRIV']=$row['privilegio'];
     $_SESSION['FOTO']=$row4['foto'];
    // $_SESSION['estado']=$row4['estado'];

    //$_SESSION['TD']=$row4['todoR'];
    //$_SESSION['S']=$row4['recurso_secre'];
    //$_SESSION['PD']=$row4['recurso_profe_dele'];
    //$_SESSION['SC']=$row4['recurso_secre_conse'];
    header("Location:dashboard.php");
  }else{
    header("Location: index.php");
  }


 ?>

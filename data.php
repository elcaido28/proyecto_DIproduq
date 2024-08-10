<?php
include('../conexion.php');
if (isset($_POST['value'])) {
  //captura todos los datos y los separa por una coma
  $colors=implode(',', $_POST['value']);
  echo $colors;
  //mete los datos a un arreglo separandolos al encontrar una coma
  $result = explode(',',$colors);
  // cuenta cuantos datos tiene el array
  $num_datos=count($result);
  //presenta el array
  for ($i=0; $i <$num_datos ; $i++) {
    echo $result[$i];
  }
  

}

?>

<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');
?>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="x_panel">


            <div class="x_title">
              <h2>CONTROL DE PAGOS DE CLIENTES</h2>
              <div class="clearfix"></div>
            </div>

          </div>
        <div class="table-responsive">
          <div class="cont_tabla">
            <table class="tabla" >
              <thead>
                <tr>
                <th># FACTURA</th>
                <th>FECHA - HORA</th>
                <th>CLIENTE</th>
                <th>VENDEDOR</th>
                <th>TOTAL FACTURA</th>
                <th>TOTAL ABONADO</th>
                <th>ADEUDA</th>
                <th>ABONAR PAGO</th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT * from control_pagos");
                while($row=mysqli_fetch_array($consulta)){
                  $numef=$row['id_factura'];
                  $data=0;
                  $consulta1=mysqli_query($con,"SELECT * from factura_mp MF INNER JOIN clientes MC on MC.id_clientes=MF.id_clientes inner join empleados ME on ME.id_empleados=MF.vendedor where num_factura='$numef'");
                  $val1=mysqli_num_rows($consulta1);
                  if ($val1>0) {
                    $row1=mysqli_fetch_array($consulta1);
                    $nuf=$row1['num_factura'];
                    $nom_come=$row1['nombre_comercial'] ;
                    $ven=$row1['nombres']." ".$row1['apellidos'];
                    $data=2;
                  }

                  $consulta2=mysqli_query($con,"SELECT * from factura_productos F INNER JOIN clientes C on C.id_clientes=F.id_clientes inner join empleados E on E.id_empleados=F.vendedor where num_factu='$numef'");
                  $val2=mysqli_num_rows($consulta2);
                  if ($val2>0) {
                    $row2=mysqli_fetch_array($consulta2);
                    $nuf=$row2['num_factu'];
                    $nom_come=$row2['nombre_comercial'] ;
                    $ven=$row2['nombres']." ".$row2['apellidos'];
                  }

              ?>

                <td><?php echo $nuf; ?> </td>
                <td><?php echo $row['fecha']." ".$row['hora']." ".$row['id_control_pagos'] ?> </td>
                <td><?php echo $nom_come; ?> </td>
                <td><?php echo $ven; ?> </td>
                <td><?php echo "$ ".$row['valor_t']; ?> </td>
                <td><?php echo "$ ".$row['valor_abono']; ?> </td>
                <td><?php echo "$ ".$row['adeuda']; ?> </td>
                <td> <a href="abonar_pago.php?id=<?php echo $row['id_control_pagos']; ?>&cli=<?php echo $nom_come; ?>&nfact=<?php echo $nuf; ?>"><button type="button" title="Ver Orden Produccion" class="modificar" name="button"><i class="far fa-share-square"></i></button></a> </td>

              </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /page content -->


<script src="js/funcions.js" charset="utf-8"></script>
<script src="js/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
<script>
  $(document).ready( function () {
    $('.tabla').DataTable();
  } );
</script>


<?php include "footer.php" ?>

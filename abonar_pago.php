<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');
  $nuf=$_REQUEST['nfact'];
  $nom_come=$_REQUEST['cli'];
  $id_control_pago=$_REQUEST['id'];
  $consulta5=mysqli_query($con,"SELECT * from control_pagos where id_control_pagos='$id_control_pago'");
    $row5=mysqli_fetch_array($consulta5);
    $adeuda5=$row5['adeuda'];
?>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Registrar Abonos de deuda | Cliente : <?php echo $_REQUEST['cli']; ?> |   Nº Factura : <?php echo $_REQUEST['nfact']; ?></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="guardar_abonar_pago.php?id=<?php echo $id_control_pago; ?>&cli=<?php echo $nom_come; ?>&nfact=<?php echo $nuf; ?>" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>ABONAR A DEUDA</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas">
                    <label class="etiq_caja">Valor</label>
                    <input type="txt" name="valor" value="<?php echo $adeuda5; ?>" placeholder="0.00" maxlength="7" required onkeypress="return solonumeros(event)" onpaste="return false">
                  </div>
                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="lista_control_pagos.php" class="cancelar">Cancelar</a>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        <div class="table-responsive">
          <div class="cont_tabla">
            <table class="tabla" >
              <thead>
                <tr>
                <th>FECHA HORA</th>
                <th>VALOR ABONADO</th>
                <th>TRABAJADOR</th>
                <th>EDITAR</th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT * from abonar_pago AP inner join empleados E on E.id_empleados=AP.id_empleados where AP.id_control_pagos='$id_control_pago'");
                while($row=mysqli_fetch_array($consulta)){
              ?>

                <td><?php echo $row['fecha']." ".$row['hora']; ?> </td>
                <td><?php echo $row['cantidad']; ?> </td>
                <td><?php echo $row['nombres']." ".$row['apellidos']; ?> </td>
                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_abonar_pago.php?idc=<?php echo $row['id_abonar_pago']; ?>">
                      <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    </a>

                  </div>
                </td>
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

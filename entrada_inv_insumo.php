<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];

?>



  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Ingreso de Insumos </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="form21" class="formulario" action="guardar_entrada_inv_insumos.php?id=<?php echo $id; ?>" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>INSUMOS</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas">
                    <label class="etiq_caja">cantidad</label>
                    <input type="number" name="cantidad" value="" placeholder=""  required >
                  </div>

                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="ingreso_inv_insumos.php" class="cancelar">Cancelar</a>
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
                  <th>FECHA</th>
                  <th>CANTIDAD</th>

                  </tr>
                </thead>
                <tr>
                <?php
                  $consulta=mysqli_query($con,"SELECT * from detalle_inv_insumos where id_inventario_insumo='$id' ");
                  while($row=mysqli_fetch_array($consulta)){
                ?>

                  <td><?php echo $row['fecha'] ?> </td>
                  <td><?php echo $row['cantidad'] ?> </td>
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

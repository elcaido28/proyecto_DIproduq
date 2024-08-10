<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');
  $idc=$_REQUEST['idc'];
  $consulta="SELECT * FROM unidad WHERE id_unidad='$idc'";
  $ejec=mysqli_query($con,$consulta);
  $row=mysqli_fetch_array($ejec);
?>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Editar Unidades </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="modificar_unidad.php?id=<?php echo $row['id_unidad']; ?>" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>UNIDAD</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas">
                    <label class="etiq_caja">unidad</label>
                    <input type="txt" name="unidad" required value="<?php echo $row['descrip']; ?>" placeholder="" >
                  </div>
                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="ingreso_unidad.php" class="cancelar">Cancelar</a>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>

      </div>
    </div>
  </div><!-- /page content -->


<script src="js/funcions.js" charset="utf-8"></script>
<script src="js/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.dataTables.min.js" charset="utf-8"></script>


<?php include "footer.php" ?>

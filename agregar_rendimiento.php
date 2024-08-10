<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];
  $consulta="SELECT * FROM orden_produccion WHERE id_orden_produccion='$id'";
  $ejec=mysqli_query($con,$consulta);
  $row=mysqli_fetch_array($ejec);
?>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Registrar Rendimiento de la Orden de Producción </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="modificar_rendimiento.php?id=<?php echo $id;?>" method="post" >
                <fieldset class="fieldset_normal">
                    <h2>RENDIMIENTO ORDEN PRODUCCIÓN</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas">
                    <label class="etiq_caja">Rendimiento</label>
                    <input type="txt" name="rendimiento" value="<?php echo $row['rendimiento_lote'] ?>" placeholder="" required onkeypress="return solonumeros(event)" onpaste="return false">
                  </div>
                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="lista_ordenP.php" class="cancelar">Cancelar</a>
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
<script>
  $(document).ready( function () {
    $('.tabla').DataTable();
  } );
</script>

<script type="text/javascript">
  function fecha_edad() {
    var fecha_actual = new Date();
    var fecha = document.getElementById('fecha').value;
    var ano=fecha.substr(0,4);
    var ano_actual= fecha_actual.getFullYear();
    var mayor=parseInt(ano)+18;
    if (mayor>ano_actual) {
      alert("Tiene que ser Mayor de edad");
      var fecha = document.getElementById('fecha').value="00-00-0000";

    }
  }
</script>

<?php include "footer.php" ?>

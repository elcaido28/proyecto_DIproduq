<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];
  $consulta="SELECT * FROM inventario_mp WHERE id_inventario_mp='$id'";
  $ejec=mysqli_query($con,$consulta);
  $row=mysqli_fetch_array($ejec);
?>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Modificar Materia Prima </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="modificar_inv_mp.php?id=<?php echo $id; ?>" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>INVENTARIO M.P.</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Codigo</label>
                    <input type="txt" name="codigo" value="<?php echo $row['codigo']; ?>" placeholder="" required onpaste="return false" > <!-- readonly-->
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombre</label>
                    <input type="txt" name="nombre" value="<?php echo $row['nombre']; ?>" placeholder="" required >
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Descripción</label>
                    <input type="txt" name="descrip" value="<?php echo $row['descrip']; ?>" placeholder="" >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Cantidad</label>
                    <input type="txt" name="cantidad" value="<?php echo $row['cantidad']; ?>" placeholder="" required >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Unidades</label>
                    <select class="F_combo" name="unidad" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from unidad");
                      while($row4=mysqli_fetch_array($consulta4)){
                        if($row4['id_unidad']==$row['id_unidad']){$sel="selected='selected'";}else{$sel="";}
                      echo "<option ".$sel." value='".$row4['id_unidad']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Costo</label>
                    <input type="txt" name="costo" value="<?php echo $row['costo']; ?>" placeholder="" required >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Precio de Venta</label>
                    <input type="txt" name="precio" value="<?php echo $row['preciov']; ?>" placeholder="" required >
                  </div>


                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="ingreso_inv_mp.php" class="cancelar">Cancelar</a>
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

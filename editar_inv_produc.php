<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];
  $consulta="SELECT * FROM inventario_produc WHERE id_inventario_produc='$id'";
  $ejec=mysqli_query($con,$consulta);
  $row=mysqli_fetch_array($ejec);
?>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Modificar Productos </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="modificar_inv_producto.php?id=<?php echo $id; ?>" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>INVENTARIO PRODUCTOS</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Codigo</label>
                    <input type="txt" name="codigo" value="<?php echo $row['codigo']; ?>" readonly placeholder="" required onpaste="return false" > <!-- readonly-->
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombre</label>
                    <select class="F_combo" name="nombre" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from recetas");
                      while($row4=mysqli_fetch_array($consulta4)){
                        if($row4['nombre']==$row['nombre']){$sel="selected='selected'";}else{$sel="";}
                      echo "<option ".$sel.">"; echo $row4['nombre']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Descripción</label>
                    <input type="txt" name="descrip" value="<?php echo $row['descrip']; ?>" placeholder="" >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Cantidad presentación</label>
                    <input type="txt" name="canti_prese" value="<?php echo $row['cantidad_presenta']; ?>" placeholder="" required >
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
                    <label class="etiq_caja">Empaque</label>
                    <select class="F_combo" name="empaque" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from empaque");
                      while($row4=mysqli_fetch_array($consulta4)){
                        if($row4['id_empaque']==$row['id_empaque']){$sel="selected='selected'";}else{$sel="";}
                      echo "<option ".$sel." value='".$row4['id_empaque']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Precio de Venta</label>
                    <input type="txt" name="precio" value="<?php echo $row['precio']; ?>" placeholder="" required >
                  </div>


                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="ingreso_inv_productos.php" class="cancelar">Cancelar</a>
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

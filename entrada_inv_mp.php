<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];
  $consulta6="SELECT *,U.descrip descripU FROM inventario_mp MP inner join unidad U on U.id_unidad=MP.id_unidad WHERE MP.id_inventario_mp='$id'";
  $ejec6=mysqli_query($con,$consulta6);
  $row6=mysqli_fetch_array($ejec6);
?>



  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Ingreso de Materia Prima </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="form21" class="formulario" action="guardar_entrada_inv_mp.php?id=<?php echo $id; ?>" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>MATERIA PRIMA</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas">
                    <label class="etiq_caja">Nombre Producto</label>
                    <input type="txt" name="nombre" value="<?php echo $row6['codigo']."   -   ".$row6['nombre']." / ".$row6['descripU'] ?>" placeholder="" readonly required >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Cantidad</label>
                    <input type="number" name="cantidad" id="cantipro"  value="" placeholder="" required>
                  </div>

                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Costo</label>
                    <input type="text" name="costo" id="costo" maxlength="6" value="" onkeypress="return solonumeros(event)" onpaste="return false" placeholder="" required>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Precio de Venta</label>
                    <input type="text" name="precio" id="precio" maxlength="6" value="" onkeypress="return solonumeros(event)" onpaste="return false"placeholder="" required>
                  </div>

                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="ingreso_inv_mp.php" class="cancelar">Cancelar</a>
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
                  <th>COSTO</th>
                  <th>PRECIO</th>

                  </tr>
                </thead>
                <tr>
                <?php
                  $consulta=mysqli_query($con,"SELECT * from detalle_inv_mp where id_inventario_mp='$id' ");
                  while($row=mysqli_fetch_array($consulta)){
                ?>

                  <td><?php echo $row['fecha'] ?> </td>
                  <td><?php echo $row['cantidad'] ?> </td>
                  <td><?php echo $row['costo'] ?> </td>
                  <td><?php echo $row['precio'] ?> </td>

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

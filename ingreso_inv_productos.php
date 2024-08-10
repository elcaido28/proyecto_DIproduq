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
              <h2>INVENTARIO PRODUCTOS </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"> <h2 style="color: #4f67d0;padding-right:5px;"> NUEVO </h2> <i class="fa fa-chevron-up"> </i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content"> <!-- <div class="x_content" style="display: block;"> -->
              <form id="formulario" class="formulario" action="guardar_inv_producto.php" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>CREAR NUEVOS PRODUCTOS</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Codigo</label>
                    <input type="txt" name="codigo" value="" placeholder="" required onpaste="return false" > <!-- readonly-->
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombre</label>
                    <input type="txt" name="nombre" value="" placeholder="Nombre del Producto" required>
                    <!-- <select class="F_combo" name="nombre" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from recetas");
                      while($row4=mysqli_fetch_array($consulta4)){
                      echo "<option>"; echo $row4['nombre']; echo "</option>"; } ?> </select> -->
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Descripción</label>
                    <input type="txt" name="descrip" value="" placeholder="" >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Cantidad presentación</label>
                    <input type="txt" name="canti_prese" value="" placeholder="" required >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Unidades</label>
                    <select class="F_combo" name="unidad" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from unidad");
                      while($row4=mysqli_fetch_array($consulta4)){
                      echo "<option value='".$row4['id_unidad']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Empaque</label>
                    <select class="F_combo" name="empaque" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from empaque");
                      while($row4=mysqli_fetch_array($consulta4)){
                      echo "<option value='".$row4['id_empaque']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Precio de Venta</label>
                    <input type="txt" name="precio" value="" placeholder="" required >
                  </div>


                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="dashboard.php" class="cancelar">Cancelar</a>
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
                <th>CODIGO</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>CANTIDAD STOCK</th>
                <th>UNIDAD</th>
                <th>EMPAQUE</th>
                <th>PRECIO V.</th>
                <th>AGREGAR STOCK</th>
                <!-- <th>SALIDA</th> -->
                <th>EDITAR / BORRAR</th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT *,U.descrip descripU,E.descrip descripE, P.descrip descripp from inventario_produc P inner join unidad U on U.id_unidad=P.id_unidad inner join empaque E on E.id_empaque=P.id_empaque");
                while($row=mysqli_fetch_array($consulta)){
              ?>

                <td><?php echo $row['codigo']; ?> </td>
                <td><?php echo $row['nombre']; ?> </td>
                <td><?php echo $row['descripp']; ?> </td>
                <td><?php echo $row['cantidad']; ?> </td>
                <td><?php echo $row['cantidad_presenta']." ".$row['descripU']; ?> </td>
                <td><?php echo $row['descripE']; ?> </td>
                <td><?php echo $row['precio']; ?> </td>
                <td><div class="cont_tbn_tb">
                    <a href="entrada_inv_produc.php?id=<?php echo $row['id_inventario_produc']; ?>">
                      <button type="button" title="Ingresos" class="modificar" name="button"><i class="far fa-arrow-alt-circle-down fa-2x"></i></button>
                    </a>
                </div></td>
                <!-- <td><div class="cont_tbn_tb">
                    <a href="salida_inv_produc.php?id=<?php echo $row['id_inventario_produc']; ?>">
                      <button type="button" title="Salida" class="modificar" name="button"><i class="far fa-arrow-alt-circle-up fa-2x"></i></button>
                    </a>
                </div></td> -->




                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_inv_produc.php?id=<?php echo $row['id_inventario_produc']; ?>">
                      <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    </a>
                    <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button>
                    <script type="text/javascript">
                      $('.eliminar').click(function(e){
                        if (confirm("¿Está segur@ de ELIMINAR?")){
                          document.location.href="eliminar_inv_produc.php?id=<?php echo $row['id_inventario_produc'];?>";
                        }else{
                          document.location.href="ingreso_inv_productos.php";
                        }
                      })
                    </script>
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

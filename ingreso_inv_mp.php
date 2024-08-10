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
              <h2>Registrar Materia Prima </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="guardar_inv_mp.php" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>INVENTARIO M.P.</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Codigo</label>
                    <input type="txt" name="codigo" value="" placeholder="" required onpaste="return false" > <!-- readonly-->
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombre</label>
                    <input type="txt" name="nombre" value="" placeholder="" required >
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Descripción</label>
                    <input type="txt" name="descrip" value="" placeholder="" >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Cantidad</label>
                    <input type="txt" name="cantidad" value="" placeholder="" required >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Unidades</label>
                    <select class="F_combo" name="unidad" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from unidad");
                      while($row4=mysqli_fetch_array($consulta4)){
                      echo "<option value='".$row4['id_unidad']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Costo</label>
                    <input type="txt" name="costo" value="" placeholder="" required >
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
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>CANTIDAD</th>
                <th>UNIDAD</th>
                <th>COSTO</th>
                <th>PRECIO V.</th>
                <th>INGRESO</th>
                <th>EDITAR / BORRAR</th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT *,U.descrip descripU, MP.descrip descripmp from inventario_mp MP inner join unidad U on U.id_unidad=MP.id_unidad ");
                while($row=mysqli_fetch_array($consulta)){
              ?>

                <td><?php echo $row['nombre'] ?> </td>
                <td><?php echo $row['descripmp'] ?> </td>
                <td><?php echo $row['cantidad'] ?> </td>
                <td><?php echo $row['descripU'] ?> </td>
                <td><?php echo $row['costo'] ?> </td>
                <td><?php echo $row['preciov'] ?> </td>
                <td><div class="cont_tbn_tb">
                    <a href="entrada_inv_mp.php?id=<?php echo $row['id_inventario_mp']; ?>">
                      <button type="button" title="Ingresos" class="modificar" name="button"><i class="far fa-arrow-alt-circle-down fa-2x"></i></button>
                    </a>
                </div></td>


                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_inv_mp.php?id=<?php echo $row['id_inventario_mp']; ?>">
                      <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    </a>
                    <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button>
                    <script type="text/javascript">
                      $('.eliminar').click(function(e){
                        if (confirm("¿Está segur@ de ELIMINAR?")){
                          document.location.href="eliminar_inv_mp.php?id=<?php echo $row['id_inventario_mp'];?>";
                        }else{
                          document.location.href="ingreso_inv_mp.php";
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

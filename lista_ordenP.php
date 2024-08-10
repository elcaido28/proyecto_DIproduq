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
              <h2>LISTA DE ORDENES DE PRODUCCIÓN</h2>
              <div class="clearfix"></div>
            </div>

          </div>
        <div class="table-responsive">
          <div class="cont_tabla">
            <table class="tabla" >
              <thead>
                <tr>
                <th>FECHA</th>
                <th># ORDEN</th>
                <th># LOTE</th>
                <th>PRODUCTO</th>
                <th>TAMAÑO LOTE</th>
                <th>RENDIMIENTO</th>
                <th>AGREGAR REND.</th>
                <th>VER</th>
                <th>EDITAR / BORRAR</th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT * from orden_produccion OP INNER JOIN recetas R on R.id_recetas=OP.id_recetas ");
                while($row=mysqli_fetch_array($consulta)){
              ?>

                <td><?php echo $row['fecha'] ?> </td>
                <td><?php echo "0".$row['num_orden'] ?> </td>
                <td><?php echo "0".$row['num_lote'] ?> </td>
                <td><?php echo $row['nombre'] ?> </td>
                <td><?php echo $row['tamano_lote']." ".$row['unidad'] ?> </td>
                <td><?php echo $row['rendimiento_lote'] ?> </td>
                <td> <a href="agregar_rendimiento.php?id=<?php echo $row['id_orden_produccion']; ?>"><button type="button" title="Agregar Rendimiento" class="modificar" name="button"><i class="far fa-arrow-alt-circle-down fa-2x"></i></button></a> </td>
                <td> <a href="reporte_orden_produccion.php?id=<?php echo $row['id_orden_produccion']; ?>" target="_blank"><button type="button" title="Ver Orden Produccion" class="modificar" name="button"><i class="far fa-eye"></i></button></a> </td>
                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_ordenp.php?id=<?php echo $row['id_orden_produccion']; ?>">
                      <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    </a>
                    <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button>
                    <script type="text/javascript">
                      $('.eliminar').click(function(e){
                        if (confirm("¿Está segur@ de ELIMINAR?")){
                          document.location.href="eliminar_ordenp.php?id=<?php echo $row['id_orden_produccion'];?>";
                        }else{
                          document.location.href="lista_ordenP.php";
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


<?php include "footer.php" ?>

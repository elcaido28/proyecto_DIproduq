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
              <h2>LISTA DE FACTURA PRODUCTOS</h2>
              <div class="clearfix"></div>
            </div>

          </div>
        <div class="table-responsive">
          <div class="cont_tabla">
            <table class="tabla" >
              <thead>
                <tr>
                <th># FACTURA</th>
                <th>FECHA - HORA</th>
                <th>CLIENTE</th>
                <th>VENDEDOR</th>
                <th>TOTAL FACTURA</th>
                <th>TIPO DE PAGO</th>
                <th>VER</th>
                <th>EDITAR </th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT * from factura_productos F INNER JOIN clientes C on C.id_clientes=F.id_clientes inner join empleados E on E.id_empleados=F.vendedor inner join tipo_pago TP on TP.id_tipo_pago=F.id_tipo_pago");
                while($row=mysqli_fetch_array($consulta)){
              ?>

                <td><?php echo $row['num_factu'] ?> </td>
                <td><?php echo $row['fecha']." ".$row['hora'] ?> </td>
                <td><?php echo $row['nombre_comercial'] ?> </td>
                <td><?php echo $row['nombres']." ".$row['apellidos'] ?> </td>
                <td><?php echo "$ ".$row['totalp']; ?> </td>
                <td><?php echo $row['descrip'] ?> </td>
                <td> <a href="reporte_facturas.php?id=<?php echo $row['id_factura_productos']; ?>"><button type="button" title="Ver Orden Produccion" class="modificar" name="button"><i class="far fa-eye"></i></button></a> </td>
                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_factura_productos.php?id=<?php echo $row['id_factura_productos']; ?>">
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

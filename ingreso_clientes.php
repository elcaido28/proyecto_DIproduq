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
              <h2>Registrar Cliente</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="guardar_cliente.php" method="post" enctype="multipart/form-data">
                <fieldset class="fieldset_normal">
                  <h2>Datos del Cliente</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Identificación</label>
                    <select class="F_combo" name="identifi" id="identifi" required><option value="1">Cedula</option><option value="2">RUC</option></select>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">RUC/Cédula</label>
                    <input type="text" name="cedula" id="cedula" maxlength="13" value="" placeholder="" onkeypress="return solonumeroRUC(event)" >
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Nombre Corporativo</label>
                    <input type="txt" name="nombrecorp" value="" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombres Representante</label>
                    <input type="txt" name="nombres" value="" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Apellidos Representante</label>
                    <input type="txt" name="apellidos" value="" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Teléfono</label>
                    <input type="text" name="telefono" id="telefono">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Zona</label>
                    <select class="F_combo" name="zona"  required><option>Norte</option><option>Sur</option><option>Centro</option><option>Este</option><option>Oeste</option></select>
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Dirección</label>
                    <input type="text"  name="direccion" value="" placeholder="" required>
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Email</label>
                    <input type="email" name="email">
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Vendedor</label>
                    <select class="F_combo" name="vendedor" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from empleados where id_cargos='4'");
                      while($row4=mysqli_fetch_array($consulta4)){
                      echo "<option value='".$row4['id_empleados']."'>"; echo $row4['nombres']." ".$row4['apellidos']; echo "</option>"; } ?> </select>
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
                <th>VENDEDOR</th>
                <th>CEDULA/RUC</th>
                <th>NOMBRES CORPORATIVO</th>
                <th>NOMBRES REPRESENTANTE</th>
                <th>TELEFONO</th>
                <th>ZONA</th>
                <th>DIRECCION</th>
                <th>EMAIL</th>
                <th>EDITAR / BORRAR</th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT *,C.direccion direcc from clientes C inner join empleados E on E.id_empleados=C.id_empleados WHERE C.estado = 1");
                while($row=mysqli_fetch_array($consulta)){
              ?>

                <td><?php echo $row['nombres']." ".$row['apellidos']; ?> </td>
                <td><?php echo $row['ruc_ci']; ?> </td>
                <td><?php echo $row['nombre_comercial']; ?> </td>
                <td><?php echo $row['nombre_dueno']." ".$row['apellido_dueno'] ?> </td>
                <td><?php echo $row['telefono']; ?> </td>
                <td><?php echo $row['zona']; ?> </td>
                <td><?php echo $row['direcc']; ?> </td>
                <td><?php echo $row['email']; ?> </td>

                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_cliente.php?id=<?php echo $row['id_clientes']; ?>">
                      <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    </a>
                    <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button>
                  </div>
                  <script type="text/javascript">
                    $('.eliminar').click(function(e){
                      if (confirm("¿Está segur@ de ELIMINAR?")){
                        document.location.href="eliminar_cliente.php?id=<?php echo $row['id_clientes'];?>";
                      }else{
                        document.location.href="ingreso_clientes.php";
                      }
                    })
                  </script>
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
  $(document).on('keyup','#cedula', function(){
    var cedula = document.getElementById('cedula').value;
    array = cedula.split( "" );
    num = array.length;
    if ( num == 10 )
    {
      total = 0;
      digito = (array[9]*1);
      for( i=0; i < (num-1); i++ )
      {
        mult = 0;
        if ( ( i%2 ) != 0 ) {
          total = total + ( array[i] * 1 );
        }
        else
        {
          mult = array[i] * 2;
          if ( mult > 9 )
            total = total + ( mult - 9 );
          else
            total = total + mult;
        }
      }
      decena = total / 10;
      decena = Math.floor( decena );
      decena = ( decena + 1 ) * 10;
      final = ( decena - total );
      if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
        $("#cedula").css({
          "background-color": "rgba(56,208,49,0.5)"
        });
        return true;
      }
      else
      {
        alert( "La c\xe9dula NO es v\xe1lida!!!" );
        document.getElementById('cedula').value="";
        $("#cedula").css({
          "background-color": "rgba(0,0,0,0)"
        });
        return false;
      }
    }
    else
    {
      return false;
    }
  });
</script>
<?php include "footer.php" ?>

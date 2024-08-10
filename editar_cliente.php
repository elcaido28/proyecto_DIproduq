<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];
  $consulta="SELECT * FROM clientes WHERE id_clientes='$id'";
  $ejec=mysqli_query($con,$consulta);
  $row=mysqli_fetch_array($ejec);

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
              <form id="formulario" class="formulario" action="modificar_cliente.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="cedula" id="cedula" value="<?php echo $row['ruc_ci']; ?>" placeholder="" required onkeypress="return solonumeroRUC(event)" >
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Nombre Corporativo</label>
                    <input type="txt" name="nombrecorp" value="<?php echo $row['nombre_comercial']; ?>" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombres Representante</label>
                    <input type="txt" name="nombres" value="<?php echo $row['nombre_dueno']; ?>" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Apellidos Representante</label>
                    <input type="txt" name="apellidos" value="<?php echo $row['apellido_dueno']; ?>" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Zona</label>
                    <select class="F_combo" name="zona"  required><option><?php echo $row['zona']; ?></option><option>Norte</option><option>Sur</option><option>Centro</option><option>Este</option><option>Oeste</option></select>
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Dirección</label>
                    <input type="text"  name="direccion" value="<?php echo $row['direccion']; ?>" placeholder="" required>
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Email</label>
                    <input type="text" name="email" value="<?php echo $row['email']; ?>">
                  </div>
                  <div class="cont_cajas">
                    <label class="etiq_caja">Vendedor</label>
                    <select class="F_combo" name="vendedor" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from empleados where id_cargos='4'");
                      while($row4=mysqli_fetch_array($consulta4)){
                        if($row4['id_empleados']==$row['id_empleados']){$sel="selected='selected'";}else{$sel="";}
                      echo "<option ".$sel." value='".$row4['id_empleados']."'>"; echo $row4['nombres']." ".$row4['apellidos']; echo "</option>"; } ?> </select>
                  </div>

                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="ingreso_clientes.php" class="cancelar">Cancelar</a>
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

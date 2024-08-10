<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $ide=$_REQUEST['id'];
  $consulta="SELECT * FROM empleados E INNER JOIN cargos C ON E.id_cargos=C.id_cargos  WHERE E.id_empleados='$ide'";
  $ejec=mysqli_query($con,$consulta);
  $row=mysqli_fetch_array($ejec);

  $consulta2="SELECT * FROM usuarios U INNER JOIN empleados E ON U.id_empleados=E.id_empleados WHERE U.id_empleados='$ide'";
  $ejec2=mysqli_query($con,$consulta2);
  $row2=mysqli_fetch_array($ejec2);
  if ($row2['clave']!='') {
    $claveob=$row2['clave'];
?>
<script>
  alert('El empleado ya tiene un usuario y contraseña asignado');
</script>
<?php
  }else{
    $claveob="";
  }
?>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Asignar Usuario </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="formulario" class="formulario" action="guardar_usuario.php?id=<?php echo $ide; ?>" method="post" enctype="multipart/form-data">
                <fieldset class="fieldset_normal">
                  <h2>Usuario y Clave</h2>
                  <hr>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Usuario</label>
                    <input type="txt" name="usuario" value="<?php echo $row2['usuario']; ?>" placeholder="" onkeypress="return sololetras(event)" onpaste="return false" <?php if ($row2['clave']!='') {?> disabled <?php } ?> >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Clave</label>
                    <input type="txt" name="clave" value="<?php echo $claveob; ?>" placeholder="" onkeypress="return sololetras(event)" onpaste="return false" <?php if ($row2['clave']!='') {?> disabled <?php } ?> >
                  </div>
                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Asignar" class="acao" <?php if ($row2['clave']!='') {?> disabled <?php } ?>>
                    <a href="ingreso_empleados.php" class="cancelar">Cancelar</a>
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

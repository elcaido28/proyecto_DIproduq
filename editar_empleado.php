<?php
    $title ="Sistema DIproduq";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    $ide=$_REQUEST['ide'];
    $consulta="SELECT * FROM empleados E INNER JOIN cargos C ON E.id_cargos=C.id_cargos WHERE E.id_empleados='$ide'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);
?>
    <div class="right_col" role=""> <!-- page content -->
      <div class="">
        <div class="page-title">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Editar Empleado</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
              </div>
<!-- form search -->
<!-- end form search -->
              <div class="x_content">
                <div class="">
                  <!-- ajax -->
                  <form id="formulario" class="formulario" action="modificar_empleado.php?id=<?php echo $ide; ?>" method="post" enctype="multipart/form-data">
                    <fieldset class="fieldset_normal">
                      <h2>Datos</h2>
                      <hr>
                      <!-- <h3>algunas configuraciones</h3> -->
                      <div class="cont_cajas_peque">
                        <div class="cont_cajas_peque_x2">
                          <div class="cont_cajas_peque_x2_colum1">
                            <!-- <label class="etiq_caja">Foto</label> -->
                            <img src=" <?php echo $row['foto']; ?>" alt="" width="65" height="70">
                          </div>
                          <div class="cont_cajas_peque_x2_colum2">
                            <label class="etiq_caja">Cambiar foto</label>
                            <input type="file" name="foto" value="" placeholder="" accept="image/jpeg">
                          </div>
                        </div>
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Cedula</label>
                        <input type="text" name="cedula" value="<?php echo $row['cedula']; ?>" placeholder="" required maxlength="10" onkeypress="return solonumeroRUC(event)" >
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Nombres</label>
                        <input type="txt" name="nombres" value="<?php echo $row['nombres']; ?>" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Apellidos</label>
                        <input type="txt" name="apellidos" value="<?php echo $row['apellidos']; ?>" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                      </div>
                      <div class="cont_cajas">
                        <label class="etiq_caja">Dirección</label>
                        <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>" required placeholder="">
                      </div>
                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>">
                      </div>

                      <div class="cont_cajas_peque">
                        <label class="etiq_caja">Cargo</label>
                        <select class="F_combo" name="cargo" required><option value="">-SELECCIONE-</option>
                        <?php $consulta4=mysqli_query($con,"SELECT * from cargos");
                          while($row4=mysqli_fetch_array($consulta4)){
                            if($row4['id_cargos']==$row['id_cargos']){$sel="selected='selected'";}else{$sel="";}
                          echo "<option ".$sel." value='".$row4['id_cargos']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                      </div>

                      <div class="conten_botom_formu">
                        <input  type="submit" name="enviar" value="Modificar" class="acao">
                        <a href="ingreso_empleados.php" class="cancelar">Cancelar</a>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /page content -->
<script src="js/funcions.js" charset="utf-8"></script>
<script src="js/jquery/dist/jquery.min.js"></script>
<?php include "footer.php" ?>

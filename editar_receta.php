<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];
  $consulta2="SELECT * FROM recetas WHERE id_recetas='$id'";
  $ejec2=mysqli_query($con,$consulta2);
  $row2=mysqli_fetch_array($ejec2);

?>

  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel" >
            <div class="x_title">
              <h2>Registrar Recetas </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="form21" class="formulario" action="" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>RECETA</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombre</label>
                    <input type="txt" name="nombre" value="<?php echo $row2['nombre']; ?>" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false" onChange="calculo(this.value);">
                  </div>
                  <div class="cont_cajas_2peques">
                    <div class="cont_cajas_peque">
                      <label class="etiq_caja">Tamaño</label>
                      <input type="txt" name="tamano" value="<?php echo $row2['tamano']; ?>" placeholder="" onChange="calculo(this.value);">
                    </div>
                    <div class="cont_cajas_peque">
                      <label class="etiq_caja">Unidades</label>
                      <select class="F_combo" name="unidad" required onChange="calculo(this.value);"><option value="" >-SELECCIONE-</option>
                      <?php $consulta4=mysqli_query($con,"SELECT * from unidad");
                        while($row4=mysqli_fetch_array($consulta4)){
                          if($row4['id_unidad']==$row2['id_unidad']){$sel="selected='selected'";}else{$sel="";}
                        echo "<option ".$sel." value='".$row4['id_unidad']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                    </div>
                  </div>

                  <div class="cont_cajas">
                    <label class="etiq_caja">Decripción</label>
                    <input type="txt" name="descrip" value="<?php echo $row2['descrip']; ?>" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false" onChange="calculo(this.value);">
                  </div>
                  <div class="cont_cajas_btnMM">
                    <div class="cont_cajas_peque2">
                      <label class="etiq_caja">Agregar</label>
                      <input type="button" value="+" onclick="agregar()" title="Agregar">
                    </div>
                    <div class="cont_cajas_peque2">
                      <label class="etiq_caja">Quitar</label>
                      <input type="button" value="-" onclick="borrarUltima()" title="Quitar" >
                    </div>
                  </div>
                  <table width="722" border="0" cellspacing="0" cellpadding="5" id="tabla2" class="table table-bordered">
                    <tr>
                      	<td><center><i><b>COMPONENTES</b></i></center></td>
                      	<td><center><i><b>CANTIDAD</b></i></center></td>
                      	<td><center><i><b>UNIDAD</b></i></center></td>
                    </tr>
                    <script type="text/javascript">
                      var contaq=0;
                    </script>
                  <?php
                    $cont_vuel=0;
                    $consulta8="SELECT * FROM detalle_receta WHERE id_recetas='$id'";
                    $ejec8=mysqli_query($con,$consulta8);
                    while($row8=mysqli_fetch_array($ejec8)){
                      $cont_vuel++;
                  ?>
                  <script type="text/javascript">
                      contaq=contaq+1;
                      localStorage.setItem("conta_tb",contaq);
                  </script>
                    <tr>
                      	<td>
                      		<select name="producto<?php echo $cont_vuel; ?>" id="producto<?php echo $cont_vuel; ?>" onpaste="return false" onChange="calculo(this.value);" required>
                      			<option value="">-SELECCIONE-</option>
                      			<?php $consulta3=mysqli_query($con,"SELECT * from inventario_mp");
                        			while($row3=mysqli_fetch_array($consulta3)){
                                if($row3['id_inventario_mp']==$row8['componente']){$sel="selected='selected'";}else{$sel="";}
                                echo "<option ".$sel." value='".$row3['id_inventario_mp']."'>"; echo $row3['nombre']; echo "</option>"; } ?> </select>

                      	</td>
                      	<td><input type="text" size="2" id="cantidad<?php echo $cont_vuel; ?>" name="cantidad<?php echo $cont_vuel; ?>" value="<?php echo $row8['cantidad']; ?>" placeholder="0" onKeyPress="return solonumeros(event)"  maxlength="7" onChange="calculo(this.value);" required></td>
                      	<td>
                      		<select name="presentacion<?php echo $cont_vuel; ?>" id="presentacion<?php echo $cont_vuel; ?>" onpaste="return false" onChange="calculo(this.value);" required>
                      			<option value="">-SELECCIONE-</option>
                      			<?php $consulta=mysqli_query($con,"SELECT * from unidad");
                        			while($row4=mysqli_fetch_array($consulta)){
                                if($row4['id_unidad']==$row8['id_unidad']){$sel="selected='selected'";}else{$sel="";}
                                echo "<option ".$sel." value='".$row4['id_unidad']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>

                    	</td>
                    </tr>
                  <?php } ?>
                  </table>



                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="ingreso_recetas.php" class="cancelar">Cancelar</a>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>

      </div>
    </div>
  </div><!-- /page content -->
  <script type="text/javascript">
  var contLin =contaq;

  localStorage.setItem("conta_tb",contLin);
  function agregar() {
    var tr, td, tabla2;
    contLin+=+1;
    tabla2 = document.getElementById('tabla2');
    tr = tabla2.insertRow(tabla2.rows.length);
    td = tr.insertCell(tr.cells.length);

    td.innerHTML = "<select id='producto" + contLin + "' name='producto" + contLin + "' value='' onpaste='return false' required>"+"<option>-SELECCIONE-</option>"+"<?php $consulta=mysqli_query($con,"SELECT * from inventario_mp"); while($row=mysqli_fetch_array($consulta)){ ?>"+"<option value='"+"<?php echo $row['id_inventario_mp']; ?>"+"'>"+"<?php echo $row['nombre']; ?>"+"</option>"+"<?php } ?>"+"</select>";

    td = tr.insertCell(tr.cells.length);
    td.innerHTML = "<input type='text' size='2' placeholder='0' id='cantidad" + contLin + "' name='cantidad" + contLin + "' value='' onKeyPress='return solonumeros(event)' onpaste='return false' maxlength='7' onChange='calculo(this.value);'>";
    td = tr.insertCell(tr.cells.length);
    td.innerHTML = "<select id='presentacion" + contLin + "' name='presentacion" + contLin + "' value='' onpaste='return false' onChange='calculo(this.value);' required>"+"<option>-SELECCIONE-</option>"+"<?php $consulta=mysqli_query($con,"SELECT * from unidad");
    while($row=mysqli_fetch_array($consulta)){ ?>"+"<option value='"+"<?php echo $row['id_unidad']; ?>"+"'>"+"<?php echo $row['descrip']; ?>"+"</option>"+"<?php } ?>"+"</select>";

    localStorage.setItem("conta_tb",contLin);
  }
  function borrarUltima() {
    ultima = document.all.tabla2.rows.length - 1;
    if(ultima > 1){
      document.all.tabla2.deleteRow(ultima);
      contLin--;
      localStorage.setItem("conta_tb",contLin);
    }
    calculo();
  }
  </script>
  <script>
  function calculo(){
	var cont_tabla=localStorage.getItem('conta_tb');
  var con=localStorage.getItem('conta_tb');
  var id=<?php echo $id; ?>;
  var url1='modificar_receta.php?cont='+con+'&id='+id+'';
  document.getElementById('form21').action=url1;
  }

  </script>

<script src="js/funcions.js" charset="utf-8"></script>
<script src="js/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
<script>
  $(document).ready( function () {
    $('.tabla').DataTable();
  } );
</script>


<?php include "footer.php" ?>

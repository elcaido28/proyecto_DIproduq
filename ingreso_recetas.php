<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');
?>
<script type="text/javascript">
var contLin = 0;
localStorage.setItem("conta_tb",contLin);
function agregar() {
  var tr, td, tabla2;
  contLin+=+1;
  tabla2 = document.getElementById('tabla2');
  tr = tabla2.insertRow(tabla2.rows.length);
  td = tr.insertCell(tr.cells.length);

  td.innerHTML = "<select id='producto" + contLin + "' name='producto" + contLin + "' value='' onpaste='return false' required>"+"<option>-SELECCIONE-</option>"+"<?php $consulta=mysqli_query($con,"SELECT * from inventario_mp"); while($row=mysqli_fetch_array($consulta)){ ?>"+"<option value='"+"<?php echo $row['id_inventario_mp']; ?>"+"'>"+"<?php echo $row['nombre']; ?>"+"</option>"+"<?php } ?>"+"</select>";

  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<input type='text' size='2' placeholder='0' id='cantidad" + contLin + "' name='cantidad" + contLin + "' value='' onKeyPress='return solonumeros(event)' onpaste='return false' maxlength='5' onChange='calculo(this.value);'>";
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
}
</script>
<script>
function calculo(){
	var cont_tabla=localStorage.getItem('conta_tb');

	if(cont_tabla=="0"){
	var producto=document.getElementById("producto").value;
	var cantidad=document.getElementById("cantidad").value;
	var presentacion=document.getElementById("presentacion").value;
}else if(cont_tabla>"0") {
	var id_producto='producto'+cont_tabla;
	var id_cantidad='cantidad'+cont_tabla;
	var id_presentacion='presentacion'+cont_tabla;
	var producto1=document.getElementById(id_producto).value;
	var cantidad1=document.getElementById(id_cantidad).value;
	var presentacion1=document.getElementById(id_presentacion).value;
}
var con=localStorage.getItem('conta_tb');
var url1='guardar_receta.php?cont='+con+'';
document.getElementById('form21').action=url1;
}

</script>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Registrar Recetas </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
           <div class="x_content" >   <!--style="display: none;" -->
              <form id="form21" class="formulario" action="" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>RECETA</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombre</label>
                    <input type="txt" name="nombre" value="" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_2peques">
                    <div class="cont_cajas_peque">
                      <label class="etiq_caja">Tamaño</label>
                      <input type="txt" name="tamano" value="" placeholder="" >
                    </div>
                    <div class="cont_cajas_peque">
                      <label class="etiq_caja">Unidades</label>
                      <select class="F_combo" name="unidad" required><option value="" >-SELECCIONE-</option>
                      <?php $consulta4=mysqli_query($con,"SELECT * from unidad");
                        while($row4=mysqli_fetch_array($consulta4)){
                        echo "<option value='".$row4['id_unidad']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                    </div>
                  </div>

                  <div class="cont_cajas">
                    <label class="etiq_caja">Decripción</label>
                    <input type="txt" name="descrip" value="" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_btnMM">
                    <div class="cont_cajas_peque2">
                      <label class="etiq_caja">Agregar</label>
                      <input type="button" value="+" onclick="agregar()" title="Agregar">
                    </div>
                    <div class="cont_cajas_peque2">
                      <label class="etiq_caja">Quitar</label>
                      <input type="button" value="-" onclick="borrarUltima()" title="Quitar">
                    </div>
                  </div>
                  <table width="722" border="0" cellspacing="0" cellpadding="5" id="tabla2" class="table table-bordered">
                    <tr>
                      	<td><center><i><b>COMPONENTES</b></i></center></td>
                      	<td><center><i><b>CANTIDAD</b></i></center></td>
                      	<td><center><i><b>UNIDAD</b></i></center></td>
                    </tr>
                    <tr>
                      	<td>
                      		<select name="producto" id="producto" onpaste="return false" required>
                      			<option value="">-SELECCIONE-</option>
                      			<?php $consulta=mysqli_query($con,"SELECT * from inventario_mp");
                        			while($row=mysqli_fetch_array($consulta)){ ?>
                      			<option value="<?php echo $row['id_inventario_mp']; ?>"><?php echo $row['nombre']; ?></option><?php } ?>
                    		</select>
                      	</td>
                      	<td><input type="text" size="2" id="cantidad" name="cantidad" placeholder="0" onKeyPress="return solonumeros(event)" onpaste="return false" maxlength="5" onChange="calculo(this.value);" required></td>
                      	<td>
                      		<select name="presentacion" id="presentacion" onpaste="return false" onChange="calculo(this.value);" required>
                      			<option value="">-SELECCIONE-</option>
                      			<?php $consulta=mysqli_query($con,"SELECT * from unidad");
                        			while($row=mysqli_fetch_array($consulta)){ ?>
                      			<option value="<?php echo $row['id_unidad']; ?>"><?php echo $row['descrip']; ?></option><?php } ?>
                    		</select>
                    	</td>
                    </tr>
                  </table>



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
                <th>DESCRIPCION</th>
                <th>TAMAÑO</th>
                <th>EDITAR / BORRAR</th>
                </tr>
              </thead>
              <tr>
              <?php
                $consulta=mysqli_query($con,"SELECT * from recetas");
                while($row=mysqli_fetch_array($consulta)){
              ?>

                <td><?php echo $row['nombre'] ?> </td>
                <td><?php echo $row['descrip'] ?> </td>
                <td><?php echo $row['tamano'] ?> </td>
                <td>
                  <div class="cont_tbn_tb">
                    <a href="editar_receta.php?id=<?php echo $row['id_recetas']; ?>">
                      <button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button>
                    </a>
                    <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button>
                    <script type="text/javascript">
                      $('.eliminar').click(function(e){
                        if (confirm("¿Está segur@ de ELIMINAR?")){
                          document.location.href="eliminar_receta.php?id=<?php echo $row['id_recetas'];?>";
                        }else{
                          document.location.href="ingreso_recetas.php";
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

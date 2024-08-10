<?php
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

//  $idplaneacion=$_REQUEST['id'];
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

  td.innerHTML = "<select id='producto" + contLin + "' name='producto" + contLin + "' value='' onpaste='return false' required>"+"<option>-</option>"+"<?php $consulta=mysqli_query($con,"SELECT * from inventario_mp"); while($row=mysqli_fetch_array($consulta)){ ?>"+"<option value='"+"<?php echo $row['id_inventario_mp']; ?>"+"'>"+"<?php echo $row['nombre']; ?>"+"</option>"+"<?php } ?>"+"</select>";

  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<input type='text' size='2' placeholder='0' id='cantidad" + contLin + "' name='cantidad" + contLin + "' value='' onKeyPress='return solonumeros(event)' onpaste='return false' maxlength='2' onChange='calculo(this.value);'>";
  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<select id='presentacion" + contLin + "' name='presentacion" + contLin + "' value='' onpaste='return false' onChange='calculo(this.value);' required>"+"<option>-</option>"+"<?php $consulta=mysqli_query($con,"SELECT * from unidad");
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
	// subtotal = precio*cantidad;
	// total = eval(subtotal);
	// document.getElementById("totalcantidad").value=total.toFixed(2);
	// var subtotal=document.getElementById("totalcantidad").value;
 	// var iva=parseFloat(subtotal)*0.12;
	// var totalP=parseFloat(subtotal)+parseFloat(iva);
	// document.getElementById("total").value=parseFloat(subtotal).toFixed(2);
	// document.getElementById("iva").value=iva.toFixed(2);
	// document.getElementById("tpagar").value=totalP.toFixed(2);
}else if(cont_tabla>"0") {
	var id_producto='producto'+cont_tabla;
	var id_cantidad='cantidad'+cont_tabla;
	var id_presentacion='presentacion'+cont_tabla;
	var producto1=document.getElementById(id_producto).value;
	var cantidad1=document.getElementById(id_cantidad).value;
	var presentacion1=document.getElementById(id_presentacion).value;

	// var id_cantidad='cantidad'+cont_tabla;
	// var id_precio='preciocantidad'+cont_tabla;
	// var id_total='totalcantidad'+cont_tabla;
	// var cantidad1=document.getElementById(id_cantidad).value;
	// var precio1=document.getElementById(id_precio).value;
	// subtotal1 = precio1*cantidad1;
	// total1 = eval(subtotal1);
	// document.getElementById(id_total).value=total1.toFixed(2);

	// var subtotal=document.getElementById(id_total).value;
	// var subt2=document.getElementById("total").value;
	// var subTot=parseFloat(subtotal)+parseFloat(subt2)
	// var iva=parseFloat(subTot)*0.12;
	// var totalP=parseFloat(subTot)+parseFloat(iva);
	// document.getElementById("total").value=subTot.toFixed(2);
	// document.getElementById("iva").value=iva.toFixed(2);
	// document.getElementById("tpagar").value=totalP.toFixed(2);
}
var con=localStorage.getItem('conta_tb');
var a='<?php echo $idplaneacion; ?>'
var url1='guardar_insumos_planeacion.php?id='+a+'&cont='+con+'';
document.getElementById('form21').action=url1;
}

</script>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Asignar</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="form21" class="formulario2" action="" method="post">
                <fieldset class="fieldset_normal">
                  <h2>Insumos Producción</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Agregar</label>
                    <input type="button" value="+" onclick="agregar()" title="Agregar">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Quitar</label>
                    <input type="button" value="-" onclick="borrarUltima()" title="Quitar">
                  </div>

                  <table width="722" border="0" cellspacing="0" cellpadding="5" id="tabla2" class="table table-bordered">
                    <tr>
                      	<td><center><i><b>PRODUCTO</b></i></center></td>
                      	<td><center><i><b>CANTIDAD</b></i></center></td>
                      	<td><center><i><b>PRESENTACION</b></i></center></td>
                    </tr>
                    <tr>
                      	<td>
                      		<select name="producto" id="producto" onpaste="return false" required>
                      			<option value="">-</option>
                      			<?php $consulta=mysqli_query($con,"SELECT * from inventario_mp");
                        			while($row=mysqli_fetch_array($consulta)){ ?>
                      			<option value="<?php echo $row['id_inventario_mp']; ?>"><?php echo $row['nombre']; ?></option><?php } ?>
                    		</select>
                      	</td>
                      	<td><input type="text" size="2" id="cantidad" name="cantidad" placeholder="0" onKeyPress="return solonumeros(event)" onpaste="return false" maxlength="2" onChange="calculo(this.value);" required></td>
                      	<td>
                      		<select name="presentacion" id="presentacion" onpaste="return false" onChange="calculo(this.value);" required>
                      			<option value="">-</option>
                      			<?php $consulta=mysqli_query($con,"SELECT * from unidad");
                        			while($row=mysqli_fetch_array($consulta)){ ?>
                      			<option value="<?php echo $row['id_unidad']; ?>"><?php echo $row['descrip']; ?></option><?php } ?>
                    		</select>
                    	</td>
                    </tr>
                  </table>
                  <table border="0" width="722" cellspacing="0" cellpadding="5" id="tabla3" class="table table-bordered"></table>
                  <table border="0" width="722" cellspacing="0" cellpadding="5" id="tabla4" class="table table-bordered"></table>
                  <br/>
                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Guardar" class="acao" onclick="calculo(this.value);">
                    <a href="ingreso_planeacion.php" class="cancelar">Cancelar</a>
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
<?php include "footer.php" ?>

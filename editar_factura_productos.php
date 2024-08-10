<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];
  $consult3=mysqli_query($con,"SELECT * from factura_productos F INNER JOIN clientes C on C.id_clientes=F.id_clientes where id_factura_productos='$id' ");
  $rows3=mysqli_fetch_array($consult3);
?>

<script type="text/javascript">
$(buscar_produ_factura_prod());

function buscar_produ_factura_prod(consults){

  $.ajax({
    url: 'ajax/ajax_productos_facturas_prod.php',
    type: 'POST',
    dataType: 'html',
    data: {consults: consults},
  })
  .done(function(respuesta){
  if(respuesta!=0 || respuesta!=""){

    var cont=respuesta.split('***')[1];
    var respu=respuesta.split('***')[0];
    localStorage.setItem("conta_tb",cont);
    $('#tabla2').html(respu);
    var id=<?php echo $id; ?>;
    var url1='modificar_factura_producto.php?cont='+cont+'&id='+id+'';
    document.getElementById('form21').action=url1;
  }
  })
  .fail(function(){
    console.log("error")
  })
}
var id_fact=<?php echo $id; ?>;
buscar_produ_factura_prod(id_fact);


for (var i = 2; i <= localStorage.getItem('conta_tb'); i++) {
var abcd3="#producto_"+i;
$(document).on('change',abcd3, function(e){
  var valr= $(this).val();
  var idcomb=  e.target.id;
  idcomb= idcomb.split('_')[1];
  localStorage.setItem("id_comb",idcomb);
    if(valr!=""){
      buscar_leer_produ(valr);
    }
  });
}
</script>


<script type="text/javascript">
var contLin =0;

localStorage.setItem("id_prod_sele","#producto");
function agregar() {
  var tr, td, tabla2;
  contLin=parseInt(localStorage.getItem('conta_tb'))+parseInt(1);
  tabla2 = document.getElementById('tabla2');
  tr = tabla2.insertRow(tabla2.rows.length);
  td = tr.insertCell(tr.cells.length);

  td.innerHTML = "<select id='producto_" + contLin + "' name='producto" + contLin + "' value='' onpaste='return false' required>"+"<option>-SELECCIONE-</option>"+"<?php $consulta=mysqli_query($con,"SELECT * ,U.descrip descripU from inventario_produc IP inner join unidad U on U.id_unidad=IP.id_unidad where cantidad !='0'");
  while($row=mysqli_fetch_array($consulta)){ ?>"+"<option value='"+"<?php echo $row['id_inventario_produc']; ?>"+"'>"+"<?php echo $row['nombre']." - ".$row['cantidad_presenta']." ".$row['descripU']; ?>"+"</option>"+"<?php } ?>"+"</select>";

  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<input type='number' size='3' placeholder='0' id='cantidad_" + contLin + "' name='cantidad" + contLin + "' value='' onKeyPress='return solonumeros(event)' onpaste='return false' min='1' onChange='calculo(this.value);'>";
  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<input type='text'  placeholder='0' id='preciou_" + contLin + "' name='preciou" + contLin + "' value='' onKeyPress='return solonumeros(event)' onpaste='return false'  readonly>";
  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<input type='text'  placeholder='0' id='preciot_" + contLin + "' name='preciot" + contLin + "' value='' onKeyPress='return solonumeros(event)' onpaste='return false'  readonly>";



  var abcd="#producto_"+contLin;
  $(document).on('change',abcd, function(e){
    var valr= $(this).val();
    var idcomb=  e.target.id;
    idcomb= idcomb.split('_')[1];
    localStorage.setItem("id_comb",idcomb);
    if(valr!=""){
      buscar_leer_produ(valr);
    }
  });
    localStorage.setItem("conta_tb",contLin);
}
function borrarUltima() {
  ultima = document.all.tabla2.rows.length - 1;
  if(ultima > 1){
    document.all.tabla2.deleteRow(ultima);
    var  contLin2=parseInt(localStorage.getItem('conta_tb'))-parseInt(1);
    localStorage.setItem("conta_tb",contLin2);
  }
}
</script>
<script>

function calculo2total(){
  var valor1=document.getElementById('valor').value;
  var descuento=document.getElementById('descuento').value;
  var subt=valor1-descuento;
  document.getElementById('subtotal').value=subt.toFixed(2);
  var iva=subt*0.12;
  var total=parseFloat(subt)+parseFloat(iva);
  document.getElementById('totalp').value=total.toFixed(2);
}

</script>
  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Modificar Facturas </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <?php

            	$result = mysqli_query($con,"SELECT * FROM clientes");
            	$array = array();
            	if($result){
            		while ($row = mysqli_fetch_array($result)) {
            			$equipo = utf8_encode($row['ruc_ci']);
            			array_push($array, $equipo); // equipos
            		}
            	}
            ?>

           <div class="x_content" >   <!--style="display: none;" -->
              <form id="form21" class="formulario" action="" method="post" >
                <fieldset class="fieldset_grande">
                  <h2>FACTURAS</h2>
                  <hr><?php  ?>
                  <!-- <h3>algunas configuraciones</h3> -->
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja"># Factura</label>
                    <input type="txt" name="nfactura" value="<?php echo $rows3['num_factu'] ?>" placeholder="" required >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Fecha</label>
                    <input type="txt" name="fecha" value="<?php echo $rows3['fecha'] ?>" placeholder="" required readonly>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">RUC/CI - Cliente</label>
                    <input type="txt" name="cedula" id="cedula" value="<?php echo $rows3['ruc_ci'] ?>" placeholder="" required onkeypress="return solonumeros(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Nombres Cliente</label>
                    <input type="txt" name="cliente" id="cliente" value="<?php echo $rows3['nombre_comercial'] ?>" placeholder="" required onkeypress="return sololetras(event)" onpaste="return false">
                  </div>

                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Forma de Pago</label>
                    <select class="F_combo" name="tpago" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from tipo_pago");
                      while($row4=mysqli_fetch_array($consulta4)){
                          if($row4['id_tipo_pago']==$rows3['id_tipo_pago']){$sel="selected='selected'";}else{$sel="";}
                      echo "<option ".$sel." value='".$row4['id_tipo_pago']."'>"; echo $row4['descrip']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Empleados</label>
                    <select class="F_combo" name="empleado" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from Empleados where id_cargos='4'");
                      while($row4=mysqli_fetch_array($consulta4)){
                        if($row4['id_empleados']==$rows3['vendedor']){$sel="selected='selected'";}else{$sel="";}
                      echo "<option ".$sel." value='".$row4['id_empleados']."'>"; echo $row4['nombres']." - ".$row4['apellidos']; echo "</option>"; } ?> </select>
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
                      	<td><center><i><b>PRODUCTOS</b></i></center></td>
                        <td><center><i><b>CANTIDAD</b></i></center></td>
                      	<td><center><i><b>PRECIO UNIT.</b></i></center></td>
                      	<td><center><i><b>PRECIO TOTAL</b></i></center></td>
                    </tr>
                    <tr>
                      	<td>
                      		<select name="producto1" id="producto_1" onpaste="return false" required>
                      			<option value="">-SELECCIONE-</option>
                      			<?php $consulta=mysqli_query($con,"SELECT *,U.descrip descripU from inventario_produc IP inner join unidad U on U.id_unidad=IP.id_unidad where cantidad !='0'");
                        			while($row=mysqli_fetch_array($consulta)){ ?>
                      			<option value="<?php echo $row['id_inventario_produc']; ?>"><?php echo $row['nombre']." ".$row['cantidad_presenta']." ".$row['descripU']; ?></option><?php } ?>
                    		</select>
                      	</td>
                      	<td><input type="number" size="3" id="cantidad_1" name="cantidad1" placeholder="0" onKeyPress="return solonumeros(event)" onpaste="return false" min="1" onChange="calculo(this.value);" required></td>
                      	<td><input type="text"  id="preciou_1" name="preciou1" placeholder="0" onKeyPress="return solonumeros(event)" onpaste="return false" readonly  required></td>
                        <td><input type="text"  id="preciot_1" name="preciot1" placeholder="0" onKeyPress="return solonumeros(event)" onpaste="return false" readonly required></td>

                    </tr>
                  </table>

                  <div class="cont_cajas_peque2">
                    <label class="etiq_caja">Valor</label>
                    <input type="txt" name="valor" value="<?php echo $rows3['valort']; ?>" id="valor" required readonly>
                  </div>
                  <div class="cont_cajas_peque2">
                    <label class="etiq_caja">descuento</label>
                    <input type="txt" name="descuento" value="<?php echo $rows3['descuento']; ?>" id="descuento" required onkeypress="return solonumeros(event)" onpaste="return false" onChange="calculo2total(this.value);">
                  </div>
                  <div class="cont_cajas_peque2">
                    <label class="etiq_caja">Sub total</label>
                    <input type="txt" name="subtotal" value="<?php echo $rows3['subtotal']; ?>" id="subtotal" required readonly>
                  </div>
                  <div class="cont_cajas_peque2">
                    <label class="etiq_caja">iva</label>
                    <input type="txt" name="iva" value="<?php echo (int)$rows3['iva']; ?>" id="iva" required readonly>
                  </div>
                  <div class="cont_cajas_peque2">
                    <label class="etiq_caja">TOTAL P.</label>
                    <input type="txt" name="totalp" value="<?php echo $rows3['totalp']; ?>" id="totalp" required readonly>
                  </div>

                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="lista_factura_productos.php" class="cancelar">Cancelar</a>
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
  $(document).ready( function () {
    $('.tabla').DataTable();
  } );
</script>

<script type="text/javascript">
$(buscar_leer_produ());

function buscar_leer_produ(consul){
  $.ajax({
    url: 'ajax/ajax_leer_productos.php',
    type: 'POST',
    dataType: 'html',
    data: {consul: consul},
  })
  .done(function(respuesta){
  if(respuesta!=""){
    primera = respuesta.split('**')[0];
    segunda = respuesta.split('**')[1];
    //var cont_tabla=localStorage.getItem('conta_tb');
    var co_id_comb=localStorage.getItem('id_comb');
    // if(cont_tabla<=1){
    //     $("#cantidad_1").attr("max",parseInt(primera));
    //     document.getElementById('preciou_1').value=segunda;
    // }else if(cont_tabla>1) {
  	     var cantidad='#cantidad_'+co_id_comb;
  	      var preciou='preciou_'+co_id_comb;
          $(cantidad).attr("max",parseInt(primera));
          document.getElementById(preciou).value=segunda;
          calcu(co_id_comb);
    } //}
  })
  .fail(function(){
    console.log("error")
  })
}
$(document).on('change','#producto_1', function(e){
  var valr= $(this).val();
  var idcomb=  e.target.id;
  idcomb= idcomb.split('_')[1];

  localStorage.setItem("id_comb",idcomb);
  if(valr!=""){
    buscar_leer_produ(valr);
  }
});
</script>
<script type="text/javascript">
	$(document).ready(function () {
		var items = <?= json_encode($array) ?>

		$("#cedula").autocomplete({
			source: items,
			select: function (event, item) {
				var params = {
					equipo: item.item.value
				};
				$.get("cliente_autocomple.php", params, function (response) {
					var json = JSON.parse(response);
					if (json.status == 200){
					}else{

					}
				}); // ajax
			}
		});
	});

  $(buscar_leer_nom_client());

  function buscar_leer_nom_client(consul){
    $.ajax({
      url: 'ajax/ajax_leer_nom_client.php',
      type: 'POST',
      dataType: 'html',
      data: {consul: consul},
    })
    .done(function(respuesta){
    if(respuesta!=""){
      document.getElementById('cliente').value=respuesta;

    }
    })
    .fail(function(){
      console.log("error")
    })
  }

  $(document).on('change','#cedula', function(){
    var valr= $(this).val();
    if(valr!=""){
      buscar_leer_nom_client(valr);
    }
  });



</script>
<?php include "footer.php" ?>
<script type="text/javascript">

    $(document).on('change', function(e){
      var idcan=  e.target.id;
      c_id2 = idcan.split('_')[1];
      calcu(c_id2);


    });
    function calcu(c_id){
      cont_tabla=localStorage.getItem('conta_tb');
      var id_cantidad='cantidad_'+c_id;
      var id_preciou='preciou_'+c_id;
      var id_preciot='preciot_'+c_id;
      var cantidad1=document.getElementById(id_cantidad).value;
      var preciou1=document.getElementById(id_preciou).value;
      var preciov1=cantidad1*preciou1;
      document.getElementById(id_preciot).value=preciov1;

    var valor=0;
    for (var i = 1; i <= cont_tabla; i++) {
          var id_preciot3='preciot_'+i;
          valor+=+document.getElementById(id_preciot3).value;
    }
    document.getElementById("valor").value=valor;
    var con=localStorage.getItem('conta_tb');
    var id2=<?php echo $id; ?>;
    var url2='modificar_factura_producto.php?cont='+con+'&id='+id2+'';
    document.getElementById('form21').action=url2;

    }
</script>

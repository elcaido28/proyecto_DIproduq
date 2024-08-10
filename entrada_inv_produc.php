<?php
  $title ="Sistema DIproduq";
  include "head.php";
  include "sidebar.php";
  include('config/config.php');

  $id=$_REQUEST['id'];
  $consulta6="SELECT *,U.descrip descripU FROM inventario_produc IP inner join unidad U on U.id_unidad=IP.id_unidad WHERE IP.id_inventario_produc='$id'";
  $ejec6=mysqli_query($con,$consulta6);
  $row6=mysqli_fetch_array($ejec6);
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

  td.innerHTML = "<select id='producto" + contLin + "' name='producto" + contLin + "' value='' onpaste='return false' required>"+"<option>-SELECCIONE-</option>"+"<?php $consulta=mysqli_query($con,"SELECT *,U.descrip descripU, E.descrip descripE from inventario_insumo II inner join unidad U on U.id_unidad=II.id_unidad inner join empaque E on E.id_empaque=II.id_empaque");
  while($row=mysqli_fetch_array($consulta)){ ?>"+"<option value='"+"<?php echo $row['id_inventario_insumo']; ?>"+"'>"+"<?php echo $row['nombre']." ".$row['descripE']." ".$row['descripU']; ?>"+"</option>"+"<?php } ?>"+"</select>";

  td = tr.insertCell(tr.cells.length);
  td.innerHTML = "<input type='text' size='2' placeholder='0' id='cantidad" + contLin + "' name='cantidad" + contLin + "' value='' onKeyPress='return solonumeros(event)' onpaste='return false' maxlength='5' onChange='calculo(this.value);'>";

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
var con=localStorage.getItem('conta_tb');
var idpr=<?php echo $id; ?>;
var url1='guardar_entrada_inv_producto.php?cont='+con+'&id='+idpr+'';
document.getElementById('form21').action=url1;
}

</script>



  <div class="right_col" role=""> <!-- page content -->
    <div class="">
      <div class="page-title">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Registrar productos </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="form21" class="formulario" action="" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>INVENTARIO PRODUCTOS</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->

                  <div class="cont_cajas">
                    <label class="etiq_caja">Nombre Producto</label>
                    <input type="txt" name="nombre" value="<?php echo $row6['nombre']."   -   ".$row6['cantidad_presenta']." ".$row6['descripU'] ?>" placeholder="" readonly required >
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja"># de Orden Prod.</label>
                    <select class="F_combo" id="ordenp" name="orden" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from orden_produccion order by id_orden_produccion DESC ");
                      while($row4=mysqli_fetch_array($consulta4)){
                      echo "<option value='".$row4['id_orden_produccion']."'>"; echo $row4['num_orden']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Cantidad</label>
                    <input type="number" name="cantidad" id="cantipro" maxlength="3" value="" placeholder="" required>
                  </div>
                  <br><br>
                  <h3>INSUMOS UTILIZADOS</h3>
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
                        <td><center><i><b>INSUMOS</b></i></center></td>
                        <td><center><i><b>CANTIDAD</b></i></center></td>

                    </tr>
                    <tr>
                        <td>
                          <select name="producto" id="producto" onpaste="return false" required>
                            <option value="">-SELECCIONE-</option>
                            <?php $consulta=mysqli_query($con,"SELECT *,U.descrip descripU, E.descrip descripE from inventario_insumo II inner join unidad U on U.id_unidad=II.id_unidad inner join empaque E on E.id_empaque=II.id_empaque");
                              while($row=mysqli_fetch_array($consulta)){ ?>
                            <option value="<?php echo $row['id_inventario_insumo']; ?>"><?php echo $row['nombre']." ".$row['descripE']." ".$row['descripU']; ?></option><?php } ?>
                        </select>
                        </td>
                        <td><input type="text" size="2" id="cantidad" name="cantidad" placeholder="0" onKeyPress="return solonumeros(event)" onpaste="return false" maxlength="5" onChange="calculo(this.value);" required></td>

                    </tr>
                  </table>



                  <div class="conten_botom_formu">
                    <input  type="submit" name="enviar" value="Registrar" class="acao">
                    <a href="ingreso_inv_productos.php" class="cancelar">Cancelar</a>
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
                  <th>FECHA</th>
                  <th># ORDEN</th>
                  <th># LOTE</th>
                  <th>CANTIDAD</th>

                  </tr>
                </thead>
                <tr>
                <?php
                  $consulta=mysqli_query($con,"SELECT * from detalle_prod_orden DPO inner join orden_produccion OP on OP.id_orden_produccion=DPO.id_orden_produccion where DPO.id_inventario_produc='$id' ");
                  while($row=mysqli_fetch_array($consulta)){
                ?>

                  <td><?php echo $row['fecha'] ?> </td>
                  <td><?php echo $row['num_orden'] ?> </td>
                  <td><?php echo $row['num_lote'] ?> </td>
                  <td><?php echo $row['cantidad'] ?> </td>
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
$(buscar_entra_produ());

function buscar_entra_produ(consul){
  $.ajax({
    url: 'ajax/ajax_entrada_productos.php',
    type: 'POST',
    dataType: 'html',
    data: {consul: consul},
  })
  .done(function(respuesta){
  if(respuesta!=""){
    var cant_presentacion=<?php echo $row6['cantidad_presenta']; ?> ;
    var respu=respuesta/cant_presentacion;
    $("#cantipro").attr("max",parseInt(respu));
    document.getElementById('cantipro').value="";

  }
  })
  .fail(function(){
    console.log("error")
  })
}
$(document).on('change','#ordenp', function(){
  var valr= $(this).val();
  if(valr!=""){
    buscar_entra_produ(valr);
  }
});
</script>

<?php include "footer.php" ?>

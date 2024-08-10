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
              <h2>Registrar Orden de Producción </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <form id="form21" class="formulario" action="" method="post" >
                <fieldset class="fieldset_normal">
                  <h2>ORDEN DE PRODUCCIÓN</h2>
                  <hr>
                  <!-- <h3>algunas configuraciones</h3> -->
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Numero Orden</label>
                    <input type="txt" name="norden" value="" placeholder="" required onkeypress="return solonumeros(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Lote</label>
                    <input type="txt" name="nlote" value="" placeholder="" required onkeypress="return solonumeros(event)" onpaste="return false">
                  </div>
                  <div class="cont_cajas_peque">
                    <label class="etiq_caja">Producto</label>
                    <select class="F_combo" name="producto" id="produc" required><option value="" >-SELECCIONE-</option>
                    <?php $consulta4=mysqli_query($con,"SELECT * from recetas");
                      while($row4=mysqli_fetch_array($consulta4)){
                      echo "<option value='".$row4['id_recetas']."'>"; echo $row4['nombre']; echo "</option>"; } ?> </select>
                  </div>
                  <div class="cont_cajas_2peques">
                    <div class="cont_cajas_peque">
                      <label class="etiq_caja">Tamaño</label>
                      <input type="txt" name="tamano" id="tamano" value="" placeholder="" onkeypress="return solonumeros(event)" required>
                    </div>
                    <div class="cont_cajas_peque">
                      <label class="etiq_caja">Unidad</label>
                      <input type="txt" id="unidad" name="unidad" value="" placeholder="" readonly>
                    </div>
                  </div>

                  <table width="722" border="0" cellspacing="0" cellpadding="5" id="tabla2" class="table table-bordered">
                    <tr>
                        <td><center><i><b>ID</b></i></center></td>
                      	<td><center><i><b>COMPONENTES</b></i></center></td>
                      	<td><center><i><b>CANTIDAD</b></i></center></td>
                      	<td><center><i><b>UNIDAD</b></i></center></td>
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

      </div>
    </div>
  </div><!-- /page content -->

<script type="text/javascript">
$(buscar_comp_or());

function buscar_comp_or(consul){
  $.ajax({
    url: 'ajax/ajax_componentes_orden.php',
    type: 'POST',
    dataType: 'html',
    data: consul,
  })
  .done(function(respuesta){
  if(respuesta!=0 || respuesta!=""){
    var respu=respuesta.split('***')[0];
    var cont=respuesta.split('***')[1];
    var unid=respuesta.split('***')[2];
    document.getElementById('unidad').value=unid;
    localStorage.setItem("conta_tb",cont);
    $('#tabla2').html(respu);
    var url1='guardar_ordenP.php?cont='+cont+'';
    document.getElementById('form21').action=url1;
  }
  })
  .fail(function(){
    console.log("error")
  })
}

$(document).on('change','#tamano', function(){
  var valr1= $(this).val();
  var valr2= document.getElementById('produc').value;
  var id_datos='id_prod='+valr2+'&tama='+valr1;
  if(valr1!="" && valr2!=""){
    buscar_comp_or(id_datos);
  }
});
</script>


  <script type="text/javascript">
  $(document).unbind('keydown').bind('keydown', function (event) {
  if (event.keyCode === 8 || event.keyCode === 46) {
   var doPrevent = true;
   var types = [ "password","txt", "file", "search", "email", "date", "color", "datetime", "datetime-local", "month", "range", "search", "tel", "time", "url", "week"];
   var d = $(event.srcElement || event.target);
   var disabled = d.prop("readonly") || d.prop("disabled");
   if (!disabled) {
    if (d[0].isContentEditable) {
     doPrevent = false;
    } else if (d.is("input")) {
     var type = d.attr("type");
     if (type) {
      type = type.toLowerCase();
     }
     if (types.indexOf(type) > -1) {
      doPrevent = false;
     }
    } else if (d.is("textarea")) {
     doPrevent = false;
    }
   }
   if (doPrevent) {
    event.preventDefault();
    return false;
   }
  }
});
  </script>

  <script src="jquery.js"></script>
<script src="js/funcions.js" charset="utf-8"></script>
<script src="js/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
<script>
  $(document).ready( function () {
    $('.tabla').DataTable();
  } );
</script>

<?php include "footer.php" ?>

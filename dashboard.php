<?php
    $title ="DIproduq";
    include "head.php";
    include "sidebar.php";

?>
    <div class="right_col" role="main"> <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="row top_tiles">

                    <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fab fa-houzz"></i></div>

                          <div class="count">1<?php //echo mysqli_num_rows($TicketData) ?></div>
                          <h3>Cusos</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-user-tie"></i></div>

                          <div class="count">1<?php //echo mysqli_num_rows($ProjectData) ?></div>
                          <h3>Profesores</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-user-graduate"></i></div>

                          <div class="count">1<?php //echo mysqli_num_rows($CategoryData) ?></div>
                          <h3>Estudiantes</h3>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-user"></i></div>

                          <div class="count">1<?php //echo mysqli_num_rows($CategoryData) ?></div>
                          <h3>Representante</h3>
                        </div>
                    </div>
 -->
                    <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-users"></i></div>
                          <div class="count"><?php// echo 1;//echo mysqli_num_rows($UserData) ?></div>
                          <h3>Usuarios</h3>
                        </div>
                    </div> -->
                </div>
                <!-- content -->
                <br><br>
                <div class="row">
                    <div class="col-md-4">
                    
                        <div id="respuesta"></div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /page content -->
    <?php if(isset($_SESSION['ID_usu']) && isset($_SESSION['NU'])){    ?>
  <?php
      $consulta123=mysqli_query($con,"SELECT * from inventario_mp I inner join unidad U on U.id_unidad=I.id_unidad");
      while($row=mysqli_fetch_array($consulta123)){
      if ($row['cantidad'] > 50) {
      ?>
   <script type="text/javascript">
    var nom='<?php echo $row['nombre']; ?>';
    var cant='<?php echo $row['cantidad']." ".$row['descrip']; ?>';

     Push.create(nom+" - Materia Prima",{
           body:"Ya solo tienes "+cant+", relizar pedido!!",
           icon:"images/icono_pedidos.jpg",
           onClick:function() {
             window.location="ingreso_pedidos.php";
             this.close();
           }
     });

   </script>
   <?php }}   } ?>
<?php  include "footer.php" ?>
<script type="text/javascript">
   Swal.fire( "Alerta hola mundo" );
</script>

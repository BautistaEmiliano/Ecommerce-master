<?php 
session_start();  
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./templates/top.php"; 

?>
 
<?php include "./templates/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <h2>Otros Administradores</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Estatus</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="admin_list">
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>sit</td>
            </tr>
          </tbody>
        </table>
      </div>


      <h2>Comentarios</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>FUNDA</th>
              <th>NOMBRE</th>
              <th>COMENTARIO</th>
              <th>ESTRELLAS DEL 1-5</th>
              <th>COMPRARIAS DE NUEVO?</th>
            </tr>
          </thead>
          <tbody id="admin_list">
            <tr>
              <td>#1</td>
              <td>PEDRO</td>
              <td>Es un gran producto, resistente y muy bien diseñado!!!</td>
              <td>5</td>
              <td>si</td>
            </tr>

            <tr>
              <td>#2</td>
              <td>JUAN</td>
              <td>Quedé muy satisfecho con el producto. La compré porque la antigua que tenía estaba muy gruesa para carga inalámbrica, y no quería que se rayara mi celular al ponerlo sin funda. Esta es justo lo que buscaba</td>
              <td>5</td>
              <td>si</td>
            </tr>


            <tr>
              <td>#6</td>
              <td>JORGE</td>
              <td>Definitivamente lo volveré a comprar, lo adquirí para lo a71, todas las partes de los botones le quedan bien, se me a caído un para de veces mi celular y lo a protegido bastante bien aunque solo sea de acrigel la funda, es fácil de pintar por encima también y viene con su protector para que no se raye la mica hasta que se la quitas, muy bueno!.</td>
              <td>5</td>
              <td>si</td>
            </tr>

            <tr>
              <td>#4</td>
              <td>FRANCISCO</td>
              <td>Buena funda, queda bien y cubre bien el celular, tiene refuerzo en las esquinas, solamente se me ha caido 1 vez y cubrió el telefono perfectamente, le doy 4 estrellas porque despues de 6/7 meses la funda empieza a timar un color naranja/amarillento pero por el precio vale la pena, yo compre nuevamente otra funda y vale la pena cambirla cada 6/7 meses.</td>
              <td>4</td>
              <td>si</td>
            </tr>

          </tbody>
        </table>
      </div>



      <h2>Preguntas</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>FUNDA</th>
              <th>MODELO</th>
              <th>PREGUNTA</th>
              <th>RESPONDER</th>
            </tr>
          </thead>
          <tbody id="admin_list">
            <tr>
              <td>#1</td>
              <td>P20</td>
              <td>Hola buenas tardes, tienen disponible?</td>
              <td><a class="boton_personalizado" href="http://localhost/Ecommerce-master/admin/index.php">Contestar</a></td>
            </tr>


            <tr>
              <td>#3</td>
              <td>Iphone</td>
              <td>Hola manejas funda para el Xiaomi Redmi 9a?</td>
              <td><a class="boton_personalizado" href="http://localhost/Ecommerce-master/admin/index.php">Contestar</a></td>
            </tr>

            


          </tbody>
        </table>
      </div>




    </main>
  </div>
</div>

<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>

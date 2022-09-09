<!DOCTYPE html>
<html lang="en">
<?php require "../partials/head.php" ?>

  <body>
  <?php require "../partials/header.php" ?>
    <div class="m-2 p-2 bg-primary text-white rounded text-center" >
      <h1>Funcion Eliminar Estudiante</h1>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 text-center">   
          <div class="cardtext-center"  >
            <img class="card-img-top img-fluid" src="../../public/img/eliminar1.png" alt="Card image" style="max-height: 700px; max-width: 500px">
            <div class="card-body">
              <hr>
              <p class="card-text">Para realizar la eliminacion de un Estudiante debemos seleccionar el registro en la tabla, posteriormente se abrira el formulario con los datos seleccionados, Tendremos los botones de Modificar y Eliminar Para el ejemplo usaremos el boton de <strong>Eliminar</strong> y seleccionaremos el registro con carne <strong>E012</strong></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-center">   
            <div class="cardtext-center"  >
              <img class="card-img-top img-fluid" src="../../public/img/eliminar2.png" alt="Card image" style="max-height: 700px; max-width: 500px">
              <div class="card-body">
                <hr>
                <p class="card-text">Al Momento de Dar Click en el boton <strong>Eliminar</strong> del formulario la pagina nos consultara si deseamos eliminar al estudiante, si se preciona <strong>Aceptar</strong> el registro del estudiante sera eliminado, si se preciona <strong>Cancelar</strong> el registro no sera borrado</p>
              </div>
            </div>
            <div class="cardtext-center"  >
                <img class="card-img-top img-fluid" src="../../public/img/eliminar3.png" alt="Card image" style="max-height: 700px; max-width: 500px">
                <div class="card-body">
                  <hr>
                  <p class="card-text">Luego de Seleccionar <strong>Aceptar</strong> en la pregunta nos mostrara la tabla ya actualizada sin el registro que previamente elminamos</p>
                </div>
              </div>
          </div>
      </div>
    </div>


    <?php require "../partials/footer.php" ?>
  </body>
</html>

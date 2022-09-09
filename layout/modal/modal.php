  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Datos del Estudiante</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="crud_estudiantes.php" method="post">
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Id:</label>
              <input type="text" class="form-control" id="txt_id" name="txt_id" placeholder="0" readonly/>
            </div>
            <div class="mb-3 mt-3">
              <label for="text" class="form-label">Carne:</label>
              <input type="text" class="form-control" id="txt_carne" name="txt_carne" placeholder="E001"
                onchange="carnetValidation(this);" required/>
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Nombres:</label>
              <input type="text" class="form-control" id="txt_nombres" name="txt_nombres" placeholder="Ingrese Nombres" required/>
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Apellidos:</label>
              <input type="text" class="form-control" id="txt_apellidos" name="txt_apellidos"
                placeholder="Ingrese Apellidos" required/>
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Direccion:</label>
              <input type="text" class="form-control" id="txt_direccion" name="txt_direccion"
                placeholder="Ingrese Direccion" required/>
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Telefono:</label>
              <input type="text" class="form-control" id="txt_telefono" name="txt_telefono"
                placeholder="Ingrese Telefono" required/>
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Email:</label>
              <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Ingrese Email" required/>
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Tipo de Sangre:</label>
              <select name="txt_tipo_sangre" id="txt_tipo_sangre" class="form-select" required />
                <option selected>Seleccione el tipo de sangre</option>
                <?php
                include("db_conexion.php");
                $db_conexion=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                $db_conexion->real_query("SELECT id_tipos_sangre,sangre FROM tipos_sangre;");
                $result=$db_conexion->use_result();
                while($row=$result->fetch_assoc()){
                  echo "<option value=".$row['id_tipos_sangre'].">".$row['sangre']."</option>";
                }
                $db_conexion->close();
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Fecha Nacimiento:</label><br>
              <input type="date" class="form-control" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento"
                placeholder="Ingrese Fecha Nacimiento Formato (YYYY-MM-DD)" required/>
            </div>


            <button type="submit" class="btn btn-success" id="btn_agregar" name="btn_agregar" value="agregar">Agregar</button>
            <button type="busubmittton" class="btn btn-secondary" id="btn_modificar" name="btn_modificar" value="modificar">Modificar</button>
            <button type="submit" class="btn btn-danger" id="btn_eliminar" name="btn_eliminar"
              onclick="javascript:if(!confirm('Desea Eliminar Este Estudiante?')) return false " value="borrar">Eliminar</button>
          </form>
        </div>

      </div>
    </div>
  </div>
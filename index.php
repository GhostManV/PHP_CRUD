<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <title>CRUD Estudiantes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <!-- CSS (load bootstrap from a CDN) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>


<body>

<header>
  
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark text-white>
    <div class="container-fluid">
      <a class="navbar-brand" href="/php_crud/index.php">RV</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-github"></i>&nbsp;Codigo Github</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Funcionamiento</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="manAgregarEstudiante.php">Agregar Estudiante</a></li>
                <li><a class="dropdown-item" href="manModificarEstudiante.php">Modificar Estudiante</a></li>
              <li><a class="dropdown-item" href="manEliminarEstudiante.php">Eliminar Estudiante</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </header>


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
              <input type="datetime" class="form-control" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento"
                placeholder="Ingrese Fecha Nacimiento Formato (YYYY-MM-DD)" required/>
            </div>


            <button type="submit" class="btn btn-success" id="btn_agregar" name="btn_agregar" value="agregar">Agregar</button>
            <button type="busubmittton" class="btn btn-secondary" id="btn_modificar" name="btn_modificar" value="modificar">Modificar</button>
            <button type="submit" class="btn btn-danger" id="btn_eliminar" name="btn_eliminar"
              onclick="javascript:if(!confirm('Desea Eliminar Este Estudiante?')) return false" value="borrar">Eliminar</button>
          </form>
        </div>

      </div>
    </div>
  </div>
      <div class="container pt-5 mb-5 text-center" >
    <h2>Crud Estudiantes</h2>
    
    <br />
    <br />
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="limpiarForm();"  data-bs-placement="right" title="Agregar Estudiante Nuevo">
      Nuevo Estudiante
    </button>
    <br />
    <br />
    <table class="table table-dark table-hover pb-5 text-center" >
      <thead>
        <tr>
          <th>Carne</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Tipo de Sangre</th>
          <th>Fecha de Nacimiento</th>
        </tr>
      </thead>
      <tbody id="tbl_estudiantes" style="cursor: pointer;">
        <?php
            include("db_conexion.php");
            $db_conexion=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
            $db_conexion->real_query("select e.id_estudiante,e.carne,e.nombres,e.apellidos,e.direccion,e.telefono,e.correo_electronico,ts.id_tipos_sangre,ts.sangre,date_format(e.fecha_nacimiento,'%Y-%m-%d')as fecha_nacimiento from estudiantes as e inner join tipos_sangre as ts on e.id_tipo_sangre=ts.id_tipos_sangre order by e.id_estudiante;");
            $result=$db_conexion->use_result();
            while($row=$result->fetch_assoc()){
              echo "<tr data-id_estudiante=".$row['id_estudiante']." data-id_tipo_sangre=".$row['id_tipos_sangre'].">";
              echo "<td>".$row['carne']."</td>";
              echo "<td>".$row['nombres']."</td>";
              echo "<td>".$row['apellidos']."</td>";
              echo "<td>".$row['direccion']."</td>";
              echo "<td>".$row['telefono']."</td>";
              echo "<td>".$row['correo_electronico']."</td>";
              echo "<td>".$row['sangre']."</td>";
              echo "<td>".$row['fecha_nacimiento']."</td>";
              echo "</tr>";
            }
            $db_conexion->close();
        ?>
        
            

      </tbody>
    </table>
  </div>

  
  <div class="mt-5 p-4 bg-dark text-white text-center footer">
<p>CRUD de la tabla Estudiantes realizado con PHP </p>
<p>© Copyright 2022 R.V.Enterprises</p>
</div>

  <script type="text/javascript">
    $('#tbl_estudiantes').on('click','tr td',(e)=>{
      var target;
      var id_estudiante,carnet,nombres,apellidos,direccion,telefono,correo_electronico,id_tipo_sangre,fecha_nacimiento;
      target = $(e.target);
      id_estudiante=target.parent().data('id_estudiante');
      id_tipo_sangre=target.parent().data('id_tipo_sangre');
      carnet=target.parent("tr").find("td").eq(0).html();
      nombres=target.parent("tr").find("td").eq(1).html();
      apellidos=target.parent("tr").find("td").eq(2).html();
      direccion=target.parent("tr").find("td").eq(3).html();
      telefono=target.parent("tr").find("td").eq(4).html();
      correo_electronico=target.parent("tr").find("td").eq(5).html();
      fecha_nacimiento=target.parent("tr").find("td").eq(7).html();
      $('#txt_id').val(id_estudiante);
      $('#txt_carne').val(carnet);
      $('#txt_nombres').val(nombres);
      $('#txt_apellidos').val(apellidos);
      $('#txt_direccion').val(direccion);
      $('#txt_telefono').val(telefono);
      $('#txt_email').val(correo_electronico);
      $('#txt_tipo_sangre').val(id_tipo_sangre);
      $('#txt_fecha_nacimiento').val(fecha_nacimiento);
      $('#btn_agregar').hide();
      $('#btn_modificar').show();
      $('#btn_eliminar').show();
      $('#myModal').modal('show');

    });
  </script>
  <script>
    $(document).ready(() => {
      $("#btn_modificar").hide();
      $("#btn_eliminar").hide();
      $("#btn_agregar").show();
    });
  </script>
  <script>
    function carnetValidation(textbox) {
      const pattern = /(^E{1})([0-9]{3})$/;
      if (textbox.value === "") {
        textbox.setCustomValidity
          ('Ingrese el Carnet');
      } else if (!pattern.test(textbox.value)) {
        textbox.setCustomValidity
          ('Ingrese un carnet Valido: E001-E999');
      }else {
        textbox.setCustomValidity('');
    }
    return true;
    }

    function limpiarForm(){
      $('#txt_id').val(0);
      $("#txt_carne").val("");
      $("#txt_nombres").val("");
      $("#txt_apellidos").val("");
      $("#txt_direccion").val("");
      $("#txt_telefono").val("");
      $("#txt_email").val("");
      $("#txt_tipo_sangre").val("Seleccione el tipo de sangre");
      $("#txt_fecha_nacimiento").val("");
      $("#btn_agregar").show();
      $("#btn_modificar").hide();
      $("#btn_eliminar").hide();
      
    }
  </script>
  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>
</body>

</html>
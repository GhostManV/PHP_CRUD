<!DOCTYPE html>
<html lang="en">
<?php require "layout/partials/head.php" ?>
<body>
<?php require "layout/partials/header.php" ?>

<?php require "layout/modal/modal.php" ?>
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
 
  <?php require "layout/partials/footer.php" ?>
  <?php require "layout/partials/scripts.php" ?>
  
    </body>
</html>
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
   

<?php
    if(!empty($_POST)){
        $txt_id = utf8_decode($_POST["txt_id"]);
        $txt_carne = utf8_decode($_POST["txt_carne"]);
        $txt_nombres = utf8_decode($_POST["txt_nombres"]);
        $txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
        $txt_direccion = utf8_decode($_POST["txt_direccion"]);
        $txt_telefono = utf8_decode($_POST["txt_telefono"]);
        $txt_correo_electronico = utf8_decode($_POST["txt_email"]);
        $txt_fecha_nacimiento = utf8_decode($_POST["txt_fecha_nacimiento"]);
        $txt_id_tipo_sangre = utf8_decode($_POST["txt_tipo_sangre"]);

        include("db_conexion.php");
        $db_conexion=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        $query="";
        if(isset($_POST['btn_agregar'])){
            $query="INSERT INTO estudiantes (carne, nombres, apellidos, direccion, telefono, correo_electronico,id_tipo_sangre, fecha_nacimiento) VALUES ('".$txt_carne."','".$txt_nombres."','".$txt_apellidos."','".$txt_direccion."','".$txt_telefono."','".$txt_correo_electronico."','".$txt_id_tipo_sangre."','".$txt_fecha_nacimiento."');";
        }
        if(isset($_POST['btn_modificar'])){
            $query="UPDATE estudiantes SET carne='".$txt_carne."', nombres='".$txt_nombres."', apellidos='".$txt_apellidos."', direccion='".$txt_direccion."', telefono='".$txt_telefono."', correo_electronico='".$txt_correo_electronico."', id_tipo_sangre='".$txt_id_tipo_sangre."', fecha_nacimiento='".$txt_fecha_nacimiento."' WHERE id_estudiante='".$txt_id."';";
        }
        if(isset($_POST['btn_eliminar'])){
            $query="DELETE FROM estudiantes WHERE id_estudiante='".$txt_id."';";
        }

        if($db_conexion->query($query)){
            $db_conexion->close();
            header("Location: index.php");
        }else{
            $db_conexion->close();
        }
    }
?> 
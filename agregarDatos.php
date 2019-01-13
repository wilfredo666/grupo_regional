<?php
    include 'conexion.php';
    $id_usuario=$_POST['id_usuario'];
    $ci_usuario=$_POST['ci_usuario'];
    $nombre_usuario=$_POST['nombre_usuario'];
    $clave=$_POST['clave'];
    $nivel_usuario=$_POST['nivel_usuario'];

    $inserccion="insert into usuario (id_usuario,ci_empleado,nombre_usuario,clave,nivel) values ('$id_usuario','$ci_usuario','$nombre_usuario','$clave','$nivel_usuario')";

    echo $usuario_nuevo=mysqli_query($con,$inserccion);
?>
<?php
    include 'conexion.php';
    $id_usuario=$_POST['id_usuario'];
    $ci_usuario=$_POST['ci_usuario'];
    $nombre_usuario=$_POST['nombre_usuario'];
    $clave=$_POST['clave'];
    $nivel_usuario=$_POST['nivel_usuario'];

    $actualizacion="update usuario set 
    ci_empleado='$ci_usuario',
    nombre_usuario='$nombre_usuario',
    clave='$clave',
    nivel='$nivel_usuario' where id_usuario='$id_usuario'";

    echo $usuario_nuevo=mysqli_query($con,$actualizacion);
?>
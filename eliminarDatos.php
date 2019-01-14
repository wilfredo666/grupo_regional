<?php
    include 'conexion.php';
    $id_usuario=$_POST['id_usuario'];
     $eliminacion="DELETE from usuario where id_usuario='$id_usuario'";
    echo $usuario_nuevo=mysqli_query($con,$eliminacion);
?>
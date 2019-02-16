<?php
include 'conexion.php';
$usuario=$_GET['id'];
$id_hoja_costos=$_GET['id_hoja_costos'];
mysqli_query($con,"delete from hoja_costos_atl where id_hoja_costos=$id_hoja_costos");
header("location: menu.php?id=$usuario");
?>
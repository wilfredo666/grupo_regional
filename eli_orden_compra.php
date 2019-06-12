<?php
include 'conexion.php';
$usuario=$_GET['id'];
$id_ordenCompra=$_GET['id_ordenCompra'];
mysqli_query($con,"delete from orden_compra where id_ordenCompra=$id_ordenCompra");
header("location: orden_compra.php?id=$usuario");
?>
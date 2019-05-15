<?php
include 'conexion.php';
mysqli_set_charset($con,'utf-8');
header("Content-Type: text/html;charset=utf-8");

$proveedor=$_POST['proveedor'];
$codigo=$_POST['codigo'];
$usuario=$_GET['id'];

$consulta_guardar="insert into orden_compra(cod_ordenCompra,id_proveedor,id_empleado) values('$codigo','$proveedor','$usuario')";
mysqli_query($con,$consulta_guardar);

/*recuperando el ultimo registro de orden de compra*/
$ultimo_registro=mysqli_fetch_row(mysqli_query($con,"SELECT MAX(id_ordenCompra) FROM orden_compra"));

/*detalle orden de compra*/
$cantidad=$_POST['t5_can'];
$detalle=$_POST['t5_pro'];
$costo_unitario=$_POST['t5_cos'];
$costo_total=$_POST['t5_coT'];

if ($cantidad[0]>0){
    for($i=0;$i<sizeof($detalle);$i++){
        mysqli_query($con,"insert into detalle_ordencompra(id_ordenCompra,cantidad,descripcion,costo_unitario,total) values('$ultimo_registro[0]','$cantidad[$i]','$detalle[$i]','$costo_unitario[$i]','$costo_total[$i]')");
    }
}

header("location: orden_compra.php?id=$usuario");

?>
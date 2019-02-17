<?php
include 'conexion.php';
mysqli_set_charset($con,'utf-8');
header("Content-Type: text/html;charset=utf-8");

/*datos iniciales - hoja de costos*/
$cliente=$_POST['cliente'];
$email_cliente=$_POST['email_cliente'];
$cod_proyecto=$_POST['cod_proyecto'];
$nom_proyecto=$_POST['nom_proyecto'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
$tiempo_credito=$_POST['tiempoC'];
$tipo_proyecto=$_POST['tipo'];
$usuario=$_GET['id'];
$ubicacion=$_GET['dir'];

$consulta_guardar="insert into hoja_costos_atl(codigo_hoja_costos,cliente,correo_cliente,fecha_inicio,tiempo_credito,nombre_proyecto,fecha_fin,tipo_proyecto,id_usuario,estado) values('$cod_proyecto','$cliente','$email_cliente','$fecha_inicio','$tiempo_credito','$nom_proyecto','$fecha_fin','$tipo_proyecto','$usuario',1)";
mysqli_query($con,$consulta_guardar);


?>

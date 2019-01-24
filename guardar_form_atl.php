<?php
include 'conexion.php';

/*datos iniciales - hoja de costos*/
$cliente=$_POST["cliente"];
$email_cliente=$_POST['email_cliente'];
$cod_proyecto=$_POST['cod_proyecto'];
$nom_proyecto=$_POST['nom_proyecto'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
$tiempo_credito=$_POST['tiempo_credito'];
$tipo_proyecto=$_POST['exoin'];
$usuario=$_GET['id'];

$consulta_guardar="insert into hoja_costos_atl(codigo_hoja_costos,cliente,correo_cliente,fecha_inicio,tiempo_credito,nombre_proyecto,fecha_fin,tipo_proyecto,id_usuario,estado) values('$cod_proyecto','$cliente','$email_cliente','$fecha_inicio','$tiempo_credito','$nom_proyecto','$fecha_fin','$tipo_proyecto','$usuario',1)";
mysqli_query($con,$consulta_guardar);

/*recuperando el ultimo registro*/
$ultimo_registro=mysqli_fetch_row(mysqli_query($con,"SELECT MAX(id_hoja_costos) FROM hoja_costos_atl"));

/*personal directo que interviene en la operacion*/
$detalle=$_POST['staf'];
$nom_personal=$_POST['detalle'];
$tiempo=$_POST['dayorhour'];
$t_programado=$_POST['time'];
$cant_personas=$_POST['nrop'];
$t_presupuestaria=$_POST['tasa'];
$tot_pro_mod=$_POST['costop'];
$pre_cot_sin_fee=$_POST['precioC'];

for($i=0;$i<sizeof($detalle);$i++){
    mysqli_query($con,"insert into personal_directo_atl(id_hoja_costos_atl,detalle,nombre_personal,tiempo,tiempo_programado,cantidad_personas,tasa_presupuestaria,costo_total_programado,precio_cotizado_sin_fee) values('$ultimo_registro[0]','$detalle[$i]','$nom_personal[$i]','$tiempo[$i]','$t_programado[$i]','$cant_personas[$i]','$t_presupuestaria[$i]','$tot_pro_mod[$i]','$pre_cot_sin_fee[$i]')");
}


header("location: menu.php?id=$usuario");
?>
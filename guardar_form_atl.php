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
$tiempo_credito=$_POST['tiempo_credito'];
$tipo_proyecto=$_POST['exoin'];
$usuario=$_GET['id'];

$consulta_guardar="insert into hoja_costos_atl(codigo_hoja_costos,cliente,correo_cliente,fecha_inicio,tiempo_credito,nombre_proyecto,fecha_fin,tipo_proyecto,id_usuario,estado) values('$cod_proyecto','$cliente','$email_cliente','$fecha_inicio','$tiempo_credito','$nom_proyecto','$fecha_fin','$tipo_proyecto','$usuario',1)";
mysqli_query($con,$consulta_guardar);

/*recuperando el ultimo registro de hoja de costos*/
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
if ($tot_pro_mod[0]>0){
    for($i=0;$i<sizeof($detalle);$i++){
        mysqli_query($con,"insert into personal_directo_atl(id_hoja_costos_atl,detalle,nombre_personal,tiempo,tiempo_programado,cantidad_personas,tasa_presupuestaria,costo_total_programado,precio_cotizado_sin_fee) values('$ultimo_registro[0]','$detalle[$i]','$nom_personal[$i]','$tiempo[$i]','$t_programado[$i]','$cant_personas[$i]','$t_presupuestaria[$i]','$tot_pro_mod[$i]','$pre_cot_sin_fee[$i]')");
    }
}
/*materiales que intervienen en la operacion*/
$t2_mat=$_POST['t2_mat'];
$t2_nom=$_POST['t2_nom'];
$t2_can=$_POST['t2_can'];
$t2_cos=$_POST['t2_cos'];
$t2_doc=$_POST['t2_doc'];
$t2_tot=$_POST['t2_tot'];
$t2_pre=$_POST['t2_pre'];
if($t2_tot[0]>0){
    for($i=0;$i<sizeof($t2_mat);$i++){
        mysqli_query($con,"insert into materiales_atl(id_hoja_costos_atl,descripcion_material,nombre_proveedor,cantidad_estimada,costo_unitario,tipo_documento,costo_total_estimado,precio_cotizado_sin_fee)values('$ultimo_registro[0]','$t2_mat[$i]','$t2_nom[$i]','$t2_can[$i]','$t2_cos[$i]','$t2_doc[$i]','$t2_tot[$i]','$t2_pre[$i]')");
    }
}

/*servicios que intervienen en la operacion*/
$t3_ser=$_POST['t3_ser'];
$t3_nom=$_POST['t3_nom'];
$t3_dia=$_POST['t3_dia'];
$t3_can=$_POST['t3_can'];
$t3_cos=$_POST['t3_cos'];
$t3_tip=$_POST['t3_tip'];
$t3_tot=$_POST['t3_tot'];
$t3_pre=$_POST['t3_pre'];
if($t3_tot[0]>0){
    for($i=0;$i<sizeof($t3_ser);$i++){
        mysqli_query($con,"insert into servicios_contratados_atl(id_hoja_costos_atl,descripcion_servicios,nombre_proveedor,tiempo,cantidad,costo_unitario,tipo_documento,costo_total_programado,precio_cotizado_sin_fee)values('$ultimo_registro[0]','$t3_ser[$i]','$t3_nom[$i]','$t3_dia[$i]','$t3_can[$i]','$t3_cos[$i]','$t3_tip[$i]','$t3_tot[$i]','$t3_pre[$i]')");
    } 
}

/*productos propios de taller*/
$t4_pro=$_POST['t4_pro'];
$t4_can=$_POST['t4_can'];
$t4_cos=$_POST['t4_cos'];
$t4_coT=$_POST['t4_coT'];
$t4_pre=$_POST['t4_pre'];
if($t4_coT[0]>0){
    for($i=0;$i<sizeof($t4_pro);$i++){
        mysqli_query($con,"insert into producto_propio_taller_atl(id_hoja_costos_atl,descripcion_producto,cantidad,costo_unitario,costo_total,precio_cotizado_sin_fee)values('$ultimo_registro[0]','$t4_pro[$i]','$t4_can[$i]','$t4_cos[$i]','$t4_coT[$i]','$t4_pre[$i]')");
    }
}

/*equipos propios*/
$t5_det=$_POST['t5_det'];
$t5_can=$_POST['t5_can'];
$t5_coU=$_POST['t5_coU'];
$t5_coT=$_POST['t5_coT'];
$t5_pre=$_POST['t5_pre'];
if($t5_can[0]>0){
    for($i=0;$i<sizeof($t5_det);$i++){
        mysqli_query($con,"insert into equipo_propio_atl(id_hoja_costos_atl,descripcion_equipo,cantidad,costo_unitario,costo_total,precio_cotizado_sin_fee)values('$ultimo_registro[0]','$t5_det[$i]','$t5_can[$i]','$t5_coU[$i]','$t5_coT[$i]','$t5_pre[$i]')");
    }  
}
/*costo de valor agragado + costos indirectos + costo financiero + fee programado, fee variable + costo tottal del proyecto, fee, costo tottal del proyecto mas fee, costo tottal del proyecto mas impuesto*/

/*cosoto de valor agregado*/
$costoVA=$_POST['costoVA'];
$costoED=$_POST['costoED'];
$diferencia=$_POST['diferencia'];
/*costos indirectos de operaciones*/
$costoAp=$_POST['costoAp'];
$tasaDa=$_POST['tasaDa'];
$costoPd=$_POST['costoPd'];
/*costo financiero*/
$tiempoPr=$_POST['tiempoPr'];
$tasaFi=$_POST['tasaFi'];
$costoTo=$_POST['costoTo'];

$feeP=$_POST['feeP'];
$feeV=$_POST['feeV'];

$totalE1=$_POST['totalE1'];
$totalF1=$_POST['totalF1'];
$totalE2=$_POST['totalE2'];
$totalF2=$_POST['totalF2'];
$totalE3=$_POST['totalE3'];
$totalE4=$_POST['totalE4'];
$totalF4=$_POST['totalF4'];


$consulta_guardar2="insert into costos_totales_atl(id_hoja_costos_atl,costo_programado_proyecto,costo_estimado_proyecto,
diferencia,costo_acumulado_programado,tas_apliacacion,costo_programado_costos_indirectos,tiempo_programado,tasa_fiannciera,total_programado_financiero,fee_programado,fee_variable,costo_total_proyecto_ejcutado,costo_total_proyecto_feevariable,fee_ejecutado,fee_feevariable,costo_total_proyecto_mas_feeejecutado,costo_total_proyecto_mas_impuestos_ejecutado,costo_total_proyecto_mas_impuestos_feevariable)values('$ultimo_registro[0]','$costoVA','$costoED','$diferencia','$costoAp','$tasaDa','$costoPd','$tiempoPr','$tasaFi','$costoTo','$feeP','$feeV','$totalE1','$totalF1','$totalE2','$totalF2','$totalE3','$totalE4','$totalF4')";

mysqli_query($con,$consulta_guardar2);

header("location: menu.php?id=$usuario");
?>
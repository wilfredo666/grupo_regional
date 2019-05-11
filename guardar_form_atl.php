<?php
include 'conexion.php';
mysqli_set_charset($con,'utf-8');
header("Content-Type: text/html;charset=utf-8");


/*datos iniciales - hoja de costos*/
$cliente=$_POST['cliente'];
    $cod_cliente=explode("-", $cliente);
$email_cliente=$_POST['email_cliente'];
$cod_proyecto=$_POST['cod_proyecto'];
$nom_proyecto=$_POST['nom_proyecto'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
$tiempo_credito=$_POST['tiempo_credito'];
$tipo_proyecto=$_POST['exoin'];
$usuario=$_GET['id'];
$fecha_aprobacion=$_POST['fecha_aprobacion'];//habra una fecha solo en caso de que haya codigo de proyecto

$consulta_guardar="insert into hoja_costos_atl(codigo_hoja_costos,cliente,correo_cliente,fecha_inicio,tiempo_credito,nombre_proyecto,fecha_fin,tipo_proyecto,id_usuario,estado,fecha_aprobacion) values('$cod_proyecto','$cod_cliente[0]','$email_cliente','$fecha_inicio','$tiempo_credito','$nom_proyecto','$fecha_fin','$tipo_proyecto','$usuario',1,'$fecha_aprobacion')";
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
/*materiales/servicios que intervienen en la operacion*/
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
/*productos/equipos propios de taller*/
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

header("location: menu.php?id=$usuario");
?>
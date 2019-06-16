<?php
/*registrar cambios de form_edicion_atl.php */
include 'conexion.php';
mysqli_set_charset($con,'utf-8');
header("Content-Type: text/html;charset=utf-8");

/*id hoja de costos*/
$id_hoja_costos=$_GET['id_hoja_costos'];


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
$fecha_facturacion=$_POST['fecha_facturacion'];
$num_factura=$_POST['num_factura'];

/*echo $cliente;
echo $email_cliente;
echo $cod_proyecto;
echo $nom_proyecto;
echo $fecha_inicio;
echo $fecha_fin;
echo $tiempo_credito;
echo $tipo_proyecto;
echo $usuario;
echo $fecha_facturacion;
echo $num_factura;*/

$consulta_guardar="update hoja_costos_atl set codigo_hoja_costos='$cod_proyecto',correo_cliente='$email_cliente',fecha_inicio='$fecha_inicio',tiempo_credito='$tiempo_credito',nombre_proyecto='$nom_proyecto',fecha_fin='$fecha_fin',tipo_proyecto='$tipo_proyecto',fecha_facturacion='$fecha_facturacion',numero_factura='$num_factura' where id_hoja_costos='$id_hoja_costos'";
mysqli_query($con,$consulta_guardar);
/*nota.- el id usuario no se cambia porque debe permanecer con el que se creo*/


/*personal directo que interviene en la operacion*/
$detalle=$_POST['staf'];
$nom_personal=$_POST['detalle'];
$tiempo=$_POST['dayorhour'];
$t_programado=$_POST['time'];
$cant_personas=$_POST['nrop'];
$t_presupuestaria=$_POST['tasa'];
$tot_pro_mod=$_POST['costop'];
$pre_cot_sin_fee=$_POST['precioC'];
if (sizeof($detalle)>0){
    mysqli_query($con,"delete from personal_directo_atl where id_hoja_costos_atl='$id_hoja_costos'");
    for($i=0;$i<sizeof($detalle);$i++){
        mysqli_query($con,"insert into personal_directo_atl(id_hoja_costos_atl,detalle,nombre_personal,tiempo,tiempo_programado,cantidad_personas,tasa_presupuestaria,costo_total_programado,precio_cotizado_sin_fee) values('$id_hoja_costos','$detalle[$i]','$nom_personal[$i]','$tiempo[$i]','$t_programado[$i]','$cant_personas[$i]','$t_presupuestaria[$i]','$tot_pro_mod[$i]','$pre_cot_sin_fee[$i]')");
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
if(sizeof($t3_ser)>0){
    mysqli_query($con,"delete from servicios_contratados_atl where id_hoja_costos_atl='$id_hoja_costos'");
    for($i=0;$i<sizeof($t3_ser);$i++){
        mysqli_query($con,"insert into servicios_contratados_atl(id_hoja_costos_atl,descripcion_servicios,nombre_proveedor,tiempo,cantidad,costo_unitario,tipo_documento,costo_total_programado,precio_cotizado_sin_fee)values('$id_hoja_costos','$t3_ser[$i]','$t3_nom[$i]','$t3_dia[$i]','$t3_can[$i]','$t3_cos[$i]','$t3_tip[$i]','$t3_tot[$i]','$t3_pre[$i]')");
    } 
}

/*productos/equipos propios de taller*/
$t4_pro=$_POST['t4_pro'];
$t4_can=$_POST['t4_can'];
$t4_cos=$_POST['t4_cos'];
$t4_coT=$_POST['t4_coT'];
if(sizeof($t4_pro)>0){
    mysqli_query($con,"delete from producto_propio_taller_atl where id_hoja_costos_atl='$id_hoja_costos'");
    for($i=0;$i<sizeof($t4_pro);$i++){
        mysqli_query($con,"insert into producto_propio_taller_atl(id_hoja_costos_atl,descripcion_producto,cantidad,costo_unitario,costo_total)values('$id_hoja_costos','$t4_pro[$i]','$t4_can[$i]','$t4_cos[$i]','$t4_coT[$i]')");
    }
}


/*costos*/
$costoAp=$_POST['costoAp'];//total en items
$tasaDa=$_POST['tasaDa'];//tasa de aplicacion
$costoPd=$_POST['costoPd'];//costo indirecto
$tiempoPr=$_POST['tiempoPr'];//tiempo programado
$tasaFi=$_POST['tasaFi'];//tasa financiera
$costoTo=$_POST['costoTo'];//costo financiero
$totalE1=$_POST['totalE1'];//total cotizacion sin fee
$feeV=$_POST['feeV'];//fee
$totalF2=$_POST['totalF2'];//fee de total cotizacion sin fee
$costoED=$_POST['costoED'];//cotizacion para cliente
$diferencia=$_POST['diferencia'];//diferencia entre: cotizacion para cliente && costo del proyecto
$costoVA=$_POST['costoVA'];//costo del proyecto

$consulta_guardar2="update costos_totales_atl set
total_item='$costoAp',
tasa_aplicacion='$tasaDa',
costo_indirecto='$costoPd',
tiempo_programado='$tiempoPr',
tasa_financiera='$tasaFi',
costo_financiero='$costoTo',
total_sin_fee='$totalE1',
fee='$feeV',
fee_cot_sin_fee='$totalF2',
cotizacion_cliente='$costoED',
diferencia='$diferencia',
costo_proyecto='$costoVA' where id_hoja_costos_atl='$id_hoja_costos'";

mysqli_query($con,$consulta_guardar2);

header("location: menu.php?id=$usuario");
?>
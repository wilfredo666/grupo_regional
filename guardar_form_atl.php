<?php
/*variables extraidas del formulario*/
include 'conexion.php';

/*$cliente=$_POST["cliente"];
$email_cliente=$_POST['email_cliente'];
$cod_proyecto=$_POST['cod_proyecto'];
$nom_proyecto=$_POST['nom_proyecto'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
$tiempo_credito=$_POST['tiempo_credito'];
$tipo_proyecto=$_POST['tipo_proyecto'];*/

/*datos - personal directo que interviene en la operacion*/
$staf=$_POST['staf'];
for($i=0;$i<count($staf);$i++){
    echo $staf[$i]. "<br>";
}
/*$staf=$_POST['staf'];
echo count($staf). "<br>";
echo $staf;*/
/*$detalle=$_POST['staf0'];
$nom_personal=$_POST['nom_personal0'];
$tiempo=$_POST['dayorhour0'];
$t_programado=$_POST['time0'];
$cant_personas=$_POST['nrop0'];
$t_presupuestaria=$_POST['tasa0'];
$tot_pro_mod=$_POST['costop0'];
$pre_cot_sin_fee=$_POST['precioC0'];

for($i=0;$i<sizeof($); ++$i)
{
mysqli_query($con,"insert into personal_directo_atl(cod_hoja_costos_atl,detalle,nombre_personal,tiempo,tiempo_programado,cantidad_personas,tasa_presupuestaria,costo_total_programado,precio_cotizado_sin_fee) values(0101,'$detalle','$nom_personal','$tiempo','$t_programado','$cant_personas','$t_presupuestaria','$tot_pro_mod','$pre_cot_sin_fee')");
	};*/
/*consulta para la inserccion de datos*/
/*$consulta_guardar="insert into hoja_costos_atl(codigo_hoja_costos,cliente,correo_cliente,fecha_inicio,tiempo_credito,nombre_proyecto,fecha_fin,tipo_proyecto) values('$cod_proyecto','$cliente','$email_cliente','$fecha_inicio','$tiempo_credito','$nom_proyecto','$fecha_fin','$tipo_proyecto')";
mysqli_query($con,$consulta_guardar);*/
/*consulta para insertar las tablas*/
/*for($i=0;$i<sizeof($); ++$i)
	{
		mysql_query("insert into ()values();");
	}*/
/*echo $cliente;*/
?>
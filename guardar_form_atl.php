<?php
include 'conexion.php';
mysqli_set_charset($con,'utf-8');
header("Content-Type: text/html;charset=utf-8");

/*datos iniciales - hoja de costos*/


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
            echo "el total de filas";
    echo "</br>";
    for($i=0;$i<sizeof($detalle);$i++){
        echo $i;
        echo "</br>";
/*        mysqli_query($con,"insert into personal_directo_atl(id_hoja_costos_atl,detalle,nombre_personal,tiempo,tiempo_programado,cantidad_personas,tasa_presupuestaria,costo_total_programado,precio_cotizado_sin_fee) values('$ultimo_registro[0]','$detalle[$i]','$nom_personal[$i]','$tiempo[$i]','$t_programado[$i]','$cant_personas[$i]','$t_presupuestaria[$i]','$tot_pro_mod[$i]','$pre_cot_sin_fee[$i]')");*/
    }
    echo "el indice de un array";
    echo "</br>";
    echo key($pre_cot_sin_fee);
    echo "</br>";
    echo "el valor del ultimo elemento de un array";
    echo "</br>";
    echo end($pre_cot_sin_fee);
    echo "</br>";
    echo "el valor maximo de un array";
    echo "</br>";
    echo max($pre_cot_sin_fee);
    echo "</br>";
    function endKey( $array ){

    //Aquí utilizamos end() para poner el puntero
    //en el último elemento, no para devolver su valor
    end( $array );

    return key( $array );

}

echo endKey( $pre_cot_sin_fee); 
    echo "....";
    echo "</br>";
    end($pre_cot_sin_fee);
    echo key($pre_cot_sin_fee);
    reset($pre_cot_sin_fee);
}

?>
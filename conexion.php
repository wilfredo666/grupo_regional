<?php
$con=mysqli_connect("localhost", "root", "", "grupo_regional");
$empleado=$_GET['id'];
mysqli_query($con,"SET charset 'utf8'");
mysqli_set_charset($con,'utf-8');
header("Content-Type: text/html;charset=utf-8");
/*if(!$con){
    echo 'Erro de conexion a la base de datos';
}
else{
    echo 'Conexion satisfactoria';
}*/
function mostrar_cliente(){
    global $con;
    $sql="select * from cliente";
    $cliente=mysqli_query($con,$sql);
    while($fila=mysqli_fetch_array($cliente)){
        echo '<option value='.$fila['codigo'].'>'.$fila['nombre'].'</option>';
    }
}
function mostrar_ciudad(){
    global $con;
    $sql="select * from ciudad";
    $ciudad=mysqli_query($con,$sql);
    while($fila=mysqli_fetch_array($ciudad)){
        echo '<option value='.$fila[0].'>'.$fila[1].'</option>';
    }
}
function mostrar_centro_costos(){
    global $con;
    $sql="select * from centro_costos";
    $ciudad=mysqli_query($con,$sql);
    while($fila=mysqli_fetch_array($ciudad)){
        echo '<option value='.$fila[1].'>'.$fila[2].'</option>';
    }
}
function ultimo_codigo_proyecto_atl(){
    global $con;
    $sql="SELECT codigo_hoja_costos FROM hoja_costos_atl WHERE id_hoja_costos=(SELECT MAX(id_hoja_costos) FROM hoja_costos_atl)";
    $ultimo_registro=mysqli_fetch_row(mysqli_query($con,$sql));
    $codigo=$ultimo_registro[0] + 1;
    echo '<input id="ultimo_codigo" type="hidden" value='.$codigo.'>';
}
function ultimo_codigo_proyecto_taller(){
    global $con;
    $sql="SELECT codigo_hoja_costos FROM hoja_costos_atl WHERE id_hoja_costos=(SELECT MAX(id_hoja_costos) FROM hoja_costos_atl)";
    $ultimo_registro=mysqli_fetch_row(mysqli_query($con,$sql));
    $codigo=$ultimo_registro[0] + 1;
    echo '<input id="ultimo_codigo" type="hidden" value='.$codigo.'>';
}
function ultimo_codigo_proyecto_btl(){
    global $con;
    $sql="SELECT codigo_hoja_costos FROM hoja_costos_atl WHERE id_hoja_costos=(SELECT MAX(id_hoja_costos) FROM hoja_costos_atl)";
    $ultimo_registro=mysqli_fetch_row(mysqli_query($con,$sql));
    $codigo=$ultimo_registro[0] + 1;
    echo '<input id="ultimo_codigo" type="hidden" value='.$codigo.'>';
}
function ultimo_codigo_proyecto_btl2(){
    global $con;
    $sql="SELECT codigo_hoja_costos FROM hoja_costos_atl WHERE id_hoja_costos=(SELECT MAX(id_hoja_costos) FROM hoja_costos_atl)";
    $ultimo_registro=mysqli_fetch_row(mysqli_query($con,$sql));
    $codigo=$ultimo_registro[0] + 1;
    echo '<input id="ultimo_codigo" type="hidden" value='.$codigo.'>';
}
function reporte_atl(){
    global $con;
    global $empleado;
    $sql="SELECT id_hoja_costos, codigo_hoja_costos, nombre, nombre_proyecto, fecha_hora_creacion, nombre_usuario, estado, fecha_inicio, fecha_fin, fecha_facturacion, costo_programado_proyecto, costo_estimado_proyecto from hoja_costos_atl JOIN usuario ON hoja_costos_atl.id_usuario=usuario.id_usuario JOIN cliente ON hoja_costos_atl.cliente=cliente.codigo JOIN costos_totales_atl ON hoja_costos_atl.id_hoja_costos=costos_totales_atl.id_hoja_costos_atl";
    $r_atl=mysqli_query($con,$sql);
    while($campo=mysqli_fetch_array($r_atl)){
        echo '<tr>';
        echo '<td>'.$campo[1].'</td>';
        echo '<td>'.$campo[2].'</td>';
        echo '<td>'.$campo[3].'</td>';
        echo '<td>'.$campo[4].'</td>';
        echo '<td>'.$campo[5].'</td>';
        echo '<td>'.$campo[7].'</td>';
        echo '<td>'.$campo[8].'</td>';
        echo '<td>'.$campo[9].'</td>';
        echo '<td>'.$campo[10].'</td>';
        echo '<td>'.$campo[11].'</td>';
        echo '<td><a href="pdf_atl.php?id_hoja_costos='.$campo[0].'&id='.$empleado.'"><button type="button" class="btn btn-primary">PDF</button></a></td>';
        echo '<td><a href="form_edicion_atl.php?id_hoja_costos='.$campo[0].'&id='.$empleado.'"><button type="button" class="btn btn-warning">Editar</button></td>';
        echo '<td><a href="eli_hoja_atl.php?id_hoja_costos='.$campo[0].'&id='.$empleado.'"><button type="button" class="btn btn-danger">Eliminar</button></td>';
        echo '</tr>';
    }
}
/*datos insertados atl*/

/*correlativo_codigo_proyecto_atl();/* --> asi se puede revisar basta con llamar a la funcion*/
?>
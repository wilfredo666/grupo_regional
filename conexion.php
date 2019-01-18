<?php
$con=mysqli_connect("localhost", "root", "", "grupo_regional");
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
function correlativo_codigo_proyecto_atl(){
    global $con;
    $sql="select max(codigo_hoja_costos) from hoja_costos_atl";
    $codigo=mysqli_query($con,$sql);
    $row = mysqli_fetch_row($codigo);
    echo $row[0] + 5;
}
/*echo correlativo_codigo_proyecto_atl();/* --> asi se puede revisar */
?>
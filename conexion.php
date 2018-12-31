<?php
$con=mysqli_connect("localhost", "root", "", "grupo_regional");

function mostrar_cliente(){
    global $con;
    $sql="select * from cliente";
    $cliente=mysqli_query($con,$sql);
    while($fila=mysqli_fetch_array($cliente)){
    echo $fila['nombre'];
    echo "</br>";
    }
}
/*if(!$con){
    echo 'Erro de conexion a la base de datos';
}
else{
    echo 'Conexion satisfactoria';
}*/
?>
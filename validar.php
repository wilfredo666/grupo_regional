<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$cat=$_POST['categoria'];
$conexion=mysqli_connect("localhost","root","","grupo_regional");
/*$conexion=mysqli_connect("mysqlcluster25","costos","Admin123","grupo_regional");*/
$consulta="select * from usuario where nombre_usuario='$usuario' and clave='$clave' and nivel='$cat' ";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_fetch_row($resultado);
if($filas>0){
    header("Location:menu.php?id=$filas[0]");
}
else{
    echo "Error de autenticacion";
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>
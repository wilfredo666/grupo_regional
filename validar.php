<?php
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];
	$conexion=mysqli_connect("localhost","root","","grupo_regional");
	$consulta="select * from usuario where nombre_usuario='$usuario' and clave='$clave'";
	$resultado=mysqli_query($conexion,$consulta);
	$filas=mysqli_num_rows($resultado);
	if($filas>0){
		header("Location:menu.html");
	}
	else{
		echo "Error de autenticacion";
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>
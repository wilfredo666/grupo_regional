<!--<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>probando envio de cotroles</title>
</head>
<body>
<form action="muestra_prueba2.php" method="post">
<label for="input" value="hola mio"></label>
<input type="text" name="input" id="input" value="hola bebe este es un input">
<input type="submit" value="enviar">
</form>
</body>
</html>-->
<?php
setlocale(LC_ALL,'es_ES'); //estableciendo la configuracion local
date_default_timezone_set('America/La_Paz'); //estableciendo la zona horaria
/*$fecha_actual=date("l-d-F-Y");*/
$fecha=strftime("%A %d de %B del %Y"); //strftime igual a date() pero dependiente de setlocale
echo $fecha;
echo "</br>";
/*setlocale(LC_ALL, 'es_ES');
$fecha = strftime("Hoy es %A día %d de %B");
echo $fecha;*/
/*
$hoy = getdate();
print_r($hoy);*/
?>
<?php
/*forma 1 - llamando a la funsion de la clase conexion
    include 'conexion.php';
    mostrar_cliente();
*/
/*forma 2 - escribiendo el codigo completo
    $con=mysqli_connect("localhost", "root", "", "grupo_regional");
    $cliente=mysqli_query($con,"select * from cliente");
    while($fila=mysqli_fetch_array($cliente)){
    echo $fila['nombre'];
    echo "</br>";
    }*/
/*form 3 - utilizando solo la clase, las variables se pueden usar siempre que no esten dentro una funsion*/
    include 'conexion.php';
    $cliente=mysqli_query($con,"select * from cliente");
    while($fila=mysqli_fetch_array($cliente)){
        echo $fila['nombre'];
        echo "</br>";
    }
?>
<?php
include 'conexion.php';
$empleado=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reportes hojas de costo</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script type="text/javascript" src="js/form_atl.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <table class="table">
                   <!--tabla ATL-->
                    <thead>
                        <tr class="table-success">
                            <th colspan="8" style="text-align:center">ATL</th>
                        </tr>
                        <tr class="table-active">
                            <th>Codigo Proyecto</th>
                            <th>Cliente</th>
                            <th>Nombre Proyecto</th>
                            <th>Fecha de cotizacion</th>
                            <th>Responsable</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de conclucion</th>
                            <th>Fecha de facturacion</th>
                            <th>Monto presupuestado</th>
                            <th>Monto cotizado</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php reporte_atl(); ?>
                    </tbody>
                    <!--tabla BTL-->
                     <thead>
                        <tr class="table-primary">
                            <th colspan="8" style="text-align:center">BTL - personal eventual</th>
                        </tr>
                        <tr class="table-active">
                            <th>Codigo Proyecto</th>
                            <th>Cliente</th>
                            <th>Nombre Proyecto</th>
                            <th>Fecha de creacion</th>
                            <th>Responsable</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <!--tabla BTL 2-->
                    <thead>
                        <tr class="table-primary">
                            <th colspan="8" style="text-align:center">BTL - personal indefinido</th>
                        </tr>
                        <tr class="table-active">
                            <th>Codigo Proyecto</th>
                            <th>Cliente</th>
                            <th>Nombre Proyecto</th>
                            <th>Fecha de creacion</th>
                            <th>Responsable</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <!--tabla taller-->
                    <thead>
                        <tr class="table-warning">
                            <th colspan="8" style="text-align:center">Taller</th>
                        </tr>
                        <tr class="table-active">
                            <th>Codigo Proyecto</th>
                            <th>Cliente</th>
                            <th>Nombre Proyecto</th>
                            <th>Fecha de creacion</th>
                            <th>Responsable</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                        <div class="col-sm-6"><a href="menu.php?id=<?php echo $empleado; ?>">
                            <input name="salir" type="button" value="Salir" class="btn btn-info">
                        </a>
                        </div>
                        <div class="col-sm-2"></div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>
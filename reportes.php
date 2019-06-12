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
                            <th colspan="14" style="text-align:center">Eventos</th>
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
                            <th>Costo del proyecto</th>
                            <th>Cotizacion</th>
                            <th>Diferencia</th>
                            <th></th>
                            <th><a href="rep_eventos_exel.php"><input type="button" class="btn btn-success" value="Descargar"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php reporte_atl(); ?>
                    </tbody>
                    <!--tabla BTL-->
                     <!--<thead>
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

                    </tbody>-->
                    <!--tabla BTL 2-->
<!--                    <thead>
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
                    </tbody>-->
                    <!--tabla taller-->
                   <!-- <thead>
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
                            
                    </tbody>-->
                </table>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                        <div class="col-sm-6"><input name="button" type="button" class="btn btn-info" onclick="window.close();" value="Salir"/>
                        </div>
                        <div class="col-sm-2"></div>
            </div>
        </div>
        <script src="js/jquery-3.3.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>
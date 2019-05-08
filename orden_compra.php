<?php
include 'conexion.php';
include 'modal_orden_compra.php';
$usuario=$_GET['id'];
?>
<!doctype html>
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
                    <thead>
                        <tr class="table-success">
                            <th colspan="14" style="text-align:center">Ordenes de compra</th>
                        </tr>
                        <tr class="table-active">
                            <th>Codigo de orden</th>
                            <th>Proveedor</th>
                            <th>Responsable:</th>
                            <th>Fecha generada</th>
                            <th>Importe</th>
                            <th><button data-backdrop="static" type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo_orden_compra">Nuevo</button></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php /*reporte_orden_compra();*/ ?>
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

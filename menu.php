<?php
    include 'conexion.php';
    $usuario=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/menu_estilos.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="alert alert-primary">Menu Administrador</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <a href="form_atl.php?id=<?php echo $usuario; ?>" target="_blank" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Eventos</a>
                                    <a href="form_taller.php?id=<?php echo $usuario; ?>" target="_blank" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Taller</a>
                                    <a href="form_btl.php?id=<?php echo $usuario; ?>" target="_blank" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>BTL</a>
                                    <a href="form_btl2.php?id=<?php echo $usuario; ?>" target="_blank" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>BTL 2</a>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <a href="reportes.php?id=<?php echo $usuario; ?>" target="_blank" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Reportes</a>
                                    <a href="orden_compra.php?id=<?php echo $usuario; ?>" target="_blank" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Orden de compra</a>
                                    <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-picture"></span> <br/>-</a>
                                    <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-tag"></span> <br/>-</a>
                                </div>
                            </div>
                            <a href="salir.php" class="btn btn-danger btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span>Salir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
       
    </body>
</html>
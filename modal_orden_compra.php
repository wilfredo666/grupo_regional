<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
        <div class="modal fade bd-example-modal-lg" id="nuevo_orden_compra">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ingresar datos</h5>
                        <button class="close" type="button" data-dismiss="modal" arial-label="close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Proveedor:</div>
                                        </div>
                                        <input type="text" class="form-control" name="proveedor" id="proveedor">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" title="fsdfsdf">Codigo:</div>
                                        </div>
                                        <input name="cod_proyecto" type="text" class="form-control" id="form_codigo">
                                        <button data-backdrop="static" type="button" class="btn btn-primary" data-toggle="modal" data-target="#generar_codigo_proyecto_atl">Generar</button>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Cantidad:</div>
                                        </div>
                                        <input type="number" class="form-control" name="cantidad" id="cantidad">
                                         <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Precio:</div>
                                        </div>
                                        <input type="text" class="form-control" name="precio" id="precio">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Total:</div>
                                        </div>
                                        <input type="text" class="form-control" name="total" id="total">
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Descripcion:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                   
                                </div>
                                <div class="col-sm-6">

                                </div>
                                <!--<div class="col-sm-6">
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text">Precio:</div>
</div>
<input type="text" class="form-control" name="precio" id="precio">
</div>
</div>
<div class="col-sm-6">
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text">Total:</div>
</div>
<input type="text" class="form-control" name="total" id="total">
</div>
</div>-->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info">Guardar</button>
                    </div>
                </div>

            </div>
        </div>
        </div>
    <script type="text/javascript" src="js/cod_proyecto.js"></script>
    </body>
</html>

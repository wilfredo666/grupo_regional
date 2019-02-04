<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script type="text/javascript" src="js/cod_proyecto.js"></script>
    </head>
    <body>
        <div class="modal fade bd-example-modal-lg" id="generar_codigo_proyecto">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Indique los elementos para generar el codigo de proyecto</h5>
                        <button class="close" type="button" data-dismiss="modal" arial-label="close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="" class="col-form-label">Area</label>
                                <select name="" id="area" class="form-control" onchange="codigo_proyecto()">
                                    <?php mostrar_centro_costos(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label" value="ciudad">Ciudad</label>
                                <select name="" id="ciudad" class="form-control" onchange="codigo_proyecto()">
                                    <?php mostrar_ciudad(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Cliente</label>
                                <select name="" id="cliente" class="form-control" onchange="codigo_proyecto()">
                                    <?php mostrar_cliente(); ?>
                                </select>
                                <?php ultimo_codigo_proyecto(); ?>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Codigo</label>
                                <input type="text" id="codigo" readonly class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

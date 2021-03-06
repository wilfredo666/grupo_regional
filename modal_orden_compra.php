<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
        <form action="guardar_orden_compra.php?id=<?php echo $empleado;?>" method="post">
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Proveedor:</div>
                                        </div>
                                        <select name="proveedor" id="proveedor" class="form-control" onchange="">
                                            <?php mostrar_proveedor();?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Codigo:</div>
                                        </div>
                                        <select name="codigo" class="form-control" id="form_codigo" title="Insertar codigo de proyecto o de centro de costos">
                                            <optgroup label="Centro de Costos">
                                                <?php mostrar_centro_costos_interno();?>
                                            </optgroup>
                                            <optgroup label="Proyecto">
                                                <?php mostrar_hoja_costos_atl();?>
                                            </optgroup>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Dias de credito:</div>
                                        </div>
                                        <input type="number" class="form-control" id="dias_credito" name="dias_credito">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Ciudad:</div>
                                        </div>
                                        <select name="ciudad" id="ciudad" class="form-control" onchange="">
                                            <option value="LPZ">LA PAZ</option>
                                            <option value="CBBA">COCHABAMBA</option>
                                            <option value="SCZ">SANTA CRUZ</option>
                                        </select>
                                    </div>
                                    <P></P>
                                </div>
                                <table class="table table-sm">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">CANTIDAD</th>
                                            <th scope="col">DESCRIPCION</th>
                                            <th scope="col">DOCUMENTO</th>
                                            <th scope="col">COSTO UNITARIO</th>
                                            <th scope="col">COSTO TOTAL</th>
                                            <th cope="col"><button type="button" class="btn btn-success" onclick="addRow_t5()">+</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="tablita5">
                                            <th>TOTAL</th>
                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td><label id="t5_costoT">0</label></td>    
                                        </tr>
                                    </tbody>
                                </table>               
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Guardar</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <script type="text/javascript" src="js/form_atl.js"></script>
        <script type="text/javascript" src="js/cod_proyecto.js"></script>
    </body>
</html>

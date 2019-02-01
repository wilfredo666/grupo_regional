<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario BTL</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="css/atl.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <h1>HOJA DE COSTO DE ACTIVACIONES Y SERVICIOS BTL - PERSONAL INDEFINIDO</h1>
        </div>
        <form id="form1" name="form1" method="post">
            <div class="row">
                <!--formulario parte 1-->
                <div class="col-9">
                    <!--ingreso de datos iniciales-->
                    <div class="form-row align-items-center">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Cliente:</div>
                                </div>
                                <select name="select3" id="select3" class="form-control">
                                    <?php
                                    include 'conexion.php';
                                    $cliente=mysqli_query($con,"select nombre from cliente");
                                    while($fila=mysqli_fetch_array($cliente)){
                                    ?>
                                    <option value=""><?php echo $fila['nombre'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Codigo de proyecto:</div>
                                </div>
                                <input type="text" class="form-control">
                                <buttom class="btn btn-success">Generar</buttom>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Correo electronico (cliente):</div>
                                </div>
                                <input type="text" class="form-control" name="textfield" id="textfield">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Proyecto / Evento:</div>
                                </div>
                                <input type="text" class="form-control" name="textfield2" id="textfield2">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Fecha de inicio del proyecto:</div>
                                </div>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Fecha de conclucion del proyecto:</div>
                                </div>
                                <input type="date" class="form-control" name="date2" id="date2">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tiempo de credito (en dias):</div>
                                </div>
                                <input type="number" class="form-control" name="tiempoC" id="tiempoC" onkeyup="costosExternos()" onclick="this.select()" value="0">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Forma de pago:</div>
                                </div>
                                <select class="form-control" name="exoin" id="exoin" onchange="costosExternos()">
                                    <option>CONTADO</option>
                                    <option>CREDITO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--tablas para la insercion de datos a calcular-->
                    <br>
                    <table class="table table-sm" id="tablita1">
                        <!--tablas para la insercion de datos a calcular-->
                        <thead class="thead-light">
                            <tr>
                                <th colspan="8"><h2>1) POTENCIALES COSTOS LABORALES A TOMAR EN CUENTA</h2></th>
                            </tr>
                            <tr>
                                <th colspan="5">COSTOS PATRONALES</th>
                                <th colspan="3">BONOS/OTROS INGRESOS</th>
                            </tr>

                            <tr>
                                <th scope="col">PREVISION SEGUNDO AGUINALDO</th>  
                                <th scope="col">SEGURO DE ACCIDENTE</th>
                                <th scope="col">VACAIONES</th>
                                <th scope="col">PREVISION DE SUBSIDIO</th>
                                <th scope="col">PREVICION DE DESAHUCIO</th>
                                <th scope="col">BONO META</th>
                                <th scope="col">BONO DE TRANSPORTE (SEGUN OPERACION)</th>
                                <th scope="col">BONO DE ANTIGUEDAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm" id="tablita2">
                        <thead class="thead-light">
                            <tr><th colspan="9"><h2>2) PERSONAL DEL PROYECTO</h2></th></tr>
                            <tr>
                                <th colspan="2" scope="col">CIUDAD</th>
                                <th colspan="2" scope="col">DESCRIPCION</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">LIQUIDO GANADO</th>
                                <th scope="col">TOTAL MAS CARGAS SOCIALES</th>
                                <th scope="col">TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2"><select class="form-control">
                                    <option>LA PAZ</option>
                                    <option>ORURO</option>
                                    <option>POTOSI</option>
                                    <option>COCHABAMBA</option>
                                    <option>SUCRE</option>
                                    <option>TARIJA</option>
                                    <option>PANDO</option>
                                    <option>BENI</option>
                                    <option>SANTA CRUZ</option>
                                    </select></td>
                                <td colspan="2"><input type="text" class="form-control"></td>
                                <td><input type="number" value="0" class="form-control"></td>
                                <td><input type="number" value="0" class="form-control"></td>
                                <td><input type="number" value="0" class="form-control" readonly></td>
                                <td><input type="number" value="0" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-success" onClick="">+</button></td>
                            </tr>
                            <tr>
                                <th colspan="4"><label>TOTAL</label></th>
                                <td><label id="">0</label></td>
                                <td><label id="">0</label></td>
                                <td><label id="">0</label></td>
                                <td><label id="">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--Equipos, meteriales y servicios totales del proyecto-->
                    <!--tabla - materiales-->
                    <table class="table table-sm" id="tablita3">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h2>3) EQUIPOS Y MATERIALES DEL PROYECTO</h2></th>
                            </tr>
                            <tr>
                                <th colspan="4">MATERIALES</th>
                                <th colspan="4">COSTOS MATERIALES ESTIMADOS</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="2">MATERIAL ADQUIRIDO/ENTREGADO POR ALMACEN</th>
                                <th>UNIDAD DE MEDIDA</th>
                                <th>CANTIDAD ESTIMADA</th>
                                <th>COSTO UNITARIO</th>
                                <th>SUB TOTAL</th>
                                <th>DOCUMENTO</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="2"><input type="text" name="t3_mate" id="t3_mate" class="form-control"></td>
                            <td><select name="t3_unid" id="t3_unid" class="form-control">
                                <option>PIEZAS</option>
                                </select></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" value="0" class="form-control"></td>
                            <td><input type="number" value="0" class="form-control"></td>
                            <td><select class="form-control">
                                <option>FACTURA</option>
                                <option>RECIBO</option>
                                <option>ALMACEN</option>
                                </select></td>
                            <td><input type="number" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-success" onClick="">+</button></td>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label id="t3_co">0</label></td>
                                <td></td>
                                <td><label id="t3_to">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--tabla - servicios-->
                    <table class="table table-sm" id="tablita3">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h2>4) SERVICIOS DEL PROYECTO</h2></th>
                            </tr>
                            <tr>
                                <th colspan="4">SERVICIOS</th>
                                <th colspan="4">COSTOS SERVICIOS ESTIMADOS</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="2">SERVICIOS CONTRATADOS</th>
                                <th>CANTIDAD ESTIMADA</th>
                                <th>PRECIO</th>
                                <th>SUB TOTAL</th>
                                <th>DOCUMENTO</th>
                                <th>TOTAL</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="2"><input type="text" name="t3_mate" id="t3_mate" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" value="0" class="form-control"></td>
                            <td><input type="number" value="0" class="form-control"></td>
                            <td><select class="form-control">
                                <option>FACTURA</option>
                                <option>RECIBO</option>
                                <option>SIN IMPUESTO</option>
                                <option>ALQUILER SIN RECIBO</option>
                                <option>VIATICO</option>
                                </select></td>
                            <td><input type="number" class="form-control" readonly></td>
                            <td></td>
                            <td><button type="button" class="btn btn-success" onClick="">+</button></td>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label id="t3_co">0</label></td>
                                <td></td>
                                <td><label id="t3_to">0</label></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--tabla - COSTOS IMPLICITOS POR APOYO EN EL PROYECTO -->
                    <table class="table table-sm" id="tablita4">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h2>COSTOS IMPLICITOS POR APOYO EN EL PROYECTO</h2></th>
                            </tr>
                            <tr>
                                <th colspan="9"><h4>PERSONAL, MATERIALES Y SERVICIOS</h4></th>
                            </tr>
                            <tr>
                                <th colspan="4">PERSONAL</th>
                                <th colspan="4">COSTOS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="4"><select name="" class="form-control">
                                <option>SERVICIOS GERENCIA GENERAL</option>
                                <option>SUPERVISION JEFATURA ACTIVACIONES Y BTL</option>
                                <option>SERVICIO DE RECURSOS HUMANOS Y PLANTILLAJE</option>
                                <option>SERVICIOS DE CONTABILIDAD</option>
                                <option>PAPELERIA Y MATERIALES</option>
                                <option>SERVICIOS BASICOS</option>
                                </select></td>
                            <td colspan="2"><input type="number" class="form-control"></td>
                            <td colspan="2"><input type="number" class="form-control"></td>
                            <td><button type="button" class="btn btn-success" onclick="t4_addRow()">+</button></td>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="2"><label id="t4_co">0</label></td>
                                <td colspan="2"><label id="t4_to">0</label></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--formulario parte 2-->
                <div class="col-3">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="3"><h5>COSTOS INDIRECTOS DEL PROYECTO</h5></th>
                            </tr>
                            <tr>
                                <th>COSTO ACUMULADO PROGRAMADO</th>
                                <th>TASA DE APLICACIÓN</th>
                                <th>COSTO PROGRAMADO DE COSTOS INDIRECTOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label id="cap">0</label></td>
                                <td><label id="tda">0</label></td>
                                <td><label id="cpc">0</label></td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th colspan="3"><h5>COSTO FINANCIERO</h5></th>
                            </tr>
                            <tr>
                                <th>TIEMPO PROGRAMADO</th>
                                <th>TASA FINANCIERA</th>
                                <th>COSTO TOTAL PROGRAMADO FINANCIERO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label id="tio">0</label></td>
                                <td><label id="taf">0</label></td>
                                <td><label id="ctp">0</label></td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th colspan="3" scope="col">TOTAL PRESUPUESTADO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">COSTO TOTAL DEL PROYECTO</th>
                                <td><label id="tp1">0</label></td>
                            </tr>
                            <tr>
                                <th scope="row">F.E.E. PROGRAMADO</th>
                                <td><label id="tp2">0</label></td>
                                <td><input type="number" class="form-control"></td>
                            </tr>
                            <tr>
                                <th scope="row">COSTO TOTAL DEL PROYECTO MAS F.E.E.</th>
                                <td><label id="tp3">0</label></td>
                            </tr>
                            <tr>
                                <th scope="row">COSTO TOTAL DEL PROYECTO MAS IMPUESTO</th>
                                <td><label id="tp4">0</label></td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th colspan="3">TOTAL PROFORMA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>PERSONAL ACTIVO</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th>MATERIAL Y SERVICIOS</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#estructura_activacion" type="button" class="btn btn-primary btn-lg" data-toggle="modal">ESTRUCTURA DE COSTOS POR PERSONAL</a>
                    <div class="modal fade bd-example-modal-lg" id="estructura_activacion">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Escojer personal:</div>
                                        </div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Empleado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Cargo:</div>
                                                        </div>
                                                        <label for="" class="form-control">-</label>
                                                        </div></td>
                                                    <td colspan="3"><div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Cantidad:</div>
                                                        </div>
                                                        <label for="" class="form-control">-</label>
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td>Costo liquito pagable</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><label for="">0</label></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">Crossing-impuestos por servicios</td>
                                                </tr>
                                                <tr>
                                                    <th>Carga impositiva</th>
                                                    <td></td>
                                                    <td><label for="">0</label></td>
                                                    <td><label for="">0</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Retenciones IUE servicios</td>
                                                    <td><label for="">0</label></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Retenciones IT servicios</td>
                                                    <td><label for="">0</label></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Servicio de respaldo administrativo</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><label for="">0</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Costo financiero</td>
                                                    <td><label for="">0</label></td>
                                                    <td></td>
                                                    <td><label for="">0</label></td>
                                                </tr>
                                                <tr>
                                                    <td>F.E.E. Grupo Regional</td>
                                                    <td><label for="">0</label></td>
                                                    <td></td>
                                                    <td><label for="">0</label></td>
                                                </tr>
                                            </tbody>
                                            <tr>
                                                <th>=Impuesto de facturacion en favor del cliente</th>
                                                <td></td>
                                                <td></td>
                                                <td><label for="">0</label></td>
                                            </tr>
                                            <tr>
                                                <td>(+)Grossing-up Tributario</td>
                                                <td><label for="">0</label></td>
                                                <td></td>
                                                <td><label for="">0</label></td>
                                            </tr>
                                            <tr>
                                                <td>IVA</td>
                                                <td><label for="">0</label></td>
                                            </tr>
                                            <tr>
                                                <td>IT</td>
                                                <td><label for="">0</label></td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">=TOTAL PRECIO FACTURADO DEL SERVICIO</th>
                                                <td><label for="">0</label></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--bloque de botones-->
            <div class="row">
                <input name="guardar" type="submit" value="Guardar" class="btn btn-success">
                <input name="salir" type="button" value="Salir" class="btn btn-success">
            </div>
        </form>
        <script type="text/javascript" src="js/form_btl.js"></script>
        <script src="js/jquery-3.3.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>

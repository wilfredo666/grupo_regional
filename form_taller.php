<?php
include 'conexion.php';
include 'modal_generar_codigo_taller.php';
$usuario=$_GET['id'];
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario taller</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="css/atl.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="js/form_taller.js"></script>
        <script src="js/jquery-3.3.1.js"></script>
    </head>
    <body>
        <div class="container-fluid bg-warning">
            <h1>HOJA DE COSTO DE TALLER</h1>
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
                                <select name="cliente" id="select3" class="form-control">
                                    <?php mostrar_cliente();?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Codigo de proyecto:</div>
                                </div>
                                <input name="cod_proyecto" type="text" class="form-control" id="form_codigo">
                                <buttom type="button" class="btn btn-primary" data-toggle="modal" data-target="#generar_codigo_proyecto_taller" onclick="">Generar</buttom>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Correo electronico (cliente):</div>
                                </div>
                                <input type="text" class="form-control" name="email_cliente" id="textfield">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Nombre del proyecto:</div>
                                </div>
                                <input type="text" class="form-control" name="nom_proyecto" id="textfield2">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Fecha de inicio del proyecto:</div>
                                </div>
                                <input type="date" class="form-control" name="fecha_inicio" id="date">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Fecha de conclucion del proyecto:</div>
                                </div>
                                <input type="date" class="form-control" name="fecha_fin" id="date2">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tiempo de credito (en dias):</div>
                                </div>
                                <input type="number" class="form-control" name="tiempoCredito" id="tiempoCredito" onkeyup="costosExternos()" value="0">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tipo de proyecto:</div>
                                </div>
                                <select class="form-control" name="tipo" id="tipo" onchange="costosExternos()">
                                    <option>EXTERNO</option>
                                    <option>INTERNO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Ubicacion:</div>
                                </div>
                                <select class="form-control" name="dir" id="dir" onchange="costosExternos();">
                                    <option>COCHABAMBA</option>
                                    <option>SANTA CRUZ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--tablas para la inserccion de datos a calcular-->
                    <br>
                    <table class="table table-sm">
                        <!--Materiales y servicios que intervienen en la operacion-->
                        <!--tabala 1 - materiales-->
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h2>1) PERSONAL INTERNO QUE INTERVIENE EN LA OPERACION</h2></th>
                            </tr>
                            <tr>
                                <th colspan="3" scope="col">DETALLE</th>
                                <th scope="col">TIEMPO</th>
                                <th scope="col">TIEMPO PROGRAMADO</th>
                                <th scope="col">CANTIDAD DE PERSONAS</th>
                                <th scope="col">TASA PRESUPUESTARIA</th>
                                <th scope="col">COSTO TOTAL PROGRAMADO DE M.O.D.</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita1">
                                <td colspan="3"><select onChange="t1_subTotal()" name="t1_deta" id="t1_deta" class="form-control">
                                    <option>DISEÑADORA</option>
                                    <option>AUXILIAR IMPRESION</option>
                                    <option>ENCARGADO DE TALLER</option>
                                    <option>EJECUTIVO DE CUENTA</option>
                                    <option>AUXILIAR DE TALLER</option>
                                    </select></td>
                                <td><select onChange="t1_subTotal()" name="t1_tiem" id="t1_tiem" class="form-control">
                                    <option>HORAS</option>
                                    <option>DIAS</option>
                                    </select></td>
                                <td><input type="number" id="t1_tieP" name="t1_tieP" value="0" onkeyup="t1_subTotal()" onClick="this.select();" class="form-control"></td>
                                <td><input type="number" id="t1_cant" name="t1_cant" value="0" onkeyup="t1_subTotal()" onClick="this.select();" class="form-control"></td>
                                <td><input type="text" id="t1_tasa" name="t1_tasa" class="form-control" readonly></td>
                                <td><input type="text" id="t1_cost" name="t1_cost" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-success" onClick="t1_addRow()">+</button></td>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center">SOPORTE LOGISTICO</th>
                                <td></td>
                                <td><label id="t1_tp">0</label></td>
                                <td><label id="t1_ca">0</label></td>
                                <td><label id="t1_ta">0</label></td>
                                <td><label id="t1_co">0</label></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr><th colspan="9"><h2>2) MATERIALES Y SERVICIOS INTERNOS QUE INTERVIENEN EN LA OPERACION</h2></th></tr>
                            <tr>
                                <th scope="col" colspan="4"><label>MATERIALES</label></th>
                                <th scope="col" colspan="5"><label>COSTOS</label></th>
                            </tr>
                            <tr>
                                <th colspan="2" scope="col">MATERIALES ADQUIRIDOS O ENTREGADOS POR ALMACEN</th>
                                <th scope="col">NOMBRE DEL PROVEEDOR</th>
                                <th scope="col">UNIDAD DE MEDIDA</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">COSTO UNITARIO</th>
                                <th scope="col">DOCUMENTO</th>
                                <th scope="col">COSTO TOTAL ESTIMADO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita2">
                                <td colspan="2"><input type="text" name="t2_mate" id="t2_mate" class="form-control"></td>
                                <td><input type="text" name="t2_prov" id="t2_prov" class="form-control"></td>
                                <td><input type="text" id="t2_unid" name="t2_unid" class="form-control"></td>
                                <td><input type="number" id="t2_cant" name="t2_cant" value="0" onkeyup="t2_subTotal()" onClick="this.select();" class="form-control"></td>
                                <td><input type="number" id="t2_cost" name="t2_cost" value="0" onkeyup="t2_subTotal()" onClick="this.select();" class="form-control" step="0.01"></td>
                                <td><select name="t2_docu" id="t2_docu" onchange="t2_subTotal()" class="form-control">
                                    <option>FACTURA</option>
                                    <option>RECIBO</option>
                                    <option>ALMACEN</option>
                                    </select></td>
                                <td><input type="text" id="t2_tota" name="t2_tota" class="form-control" readonly></td>
                                <td><button type="button" onclick="t2_addRow()" class="btn btn-success">+</button></td>
                            </tr>
                            <tr>
                                <th colspan="7" class="<text-center></text-center>">TOTAL</th>
                                <td><label id="t2_to">0</label></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--tabla 2 - servicios-->
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2"><label>SERVICIOS</label></th>
                                <th colspan="6"><label>COSTOS</label></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="2" scope="col">SERVICIOS CONTRATADOS</th>
                                <th colspan="2" scope="col">NOMBRE DEL PROVEEDOR</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">COSTO DE SERVICIO</th>
                                <th scope="col">DOCUMENTO</th>
                                <th scope="col">COSTO TOTAL ESTIMADO DEL SERVICIO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita3">
                                <td colspan="2"><input type="text" id="t3_serv" name="t3_serv" class="form-control"></td>
                                <td colspan="2"><input type="text" id="t3_nomb" name="t3_nomb" class="form-control"></td>
                                <td><input type="number" class="form-control" id="t3_cant" onkeyup="t3_subTotal()" onclick="this.select()" value=0 name="t3_cant"></td>
                                <td><input type="number" class="form-control" id="t3_cost" onkeyup="t3_subTotal()" onclick="this.select()" value=0 name="t3_cost" step="0.01"></td>
                                <td><select class="form-control" id="t3_docu" onchange="t3_subTotal()" name="t3_docu">
                                    <option>FACTURA</option>
                                    <option>RECIBO</option>
                                    <option>VALORADO</option>
                                    <option>ALQUILER CON RECIBO</option>
                                    </select></td>
                                <td><input type="number" name="t3_coTo" id="t3_coTo" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-success" onclick="t3_addRow()">+</button></td>
                            </tr>
                            <tr>
                                <th colspan="7" class="text-center"><label>TOTAL</label></th>
                                <td><label id="t3_to">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--formulario parte 2-->
                <div class="col-3">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="3"><h5>PUNTO DE REFERENCIA</h5></th>
                            </tr>
                            <tr>
                                <th>PRECIO DE HOJA COSTO</th>
                                <th>PRECIO PDF</th>
                                <th>DIFERENCIA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" class="form-control" id="hoja" name="hoja" step="0.01"></label></td>
                                <td><input type="number" class="form-control" id="pdf" name="pdf" step="0.01"></label></td>
                                <td><input type="number" class="form-control" id="dif" name="dif" step="0.01"></label></td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th colspan="3"><h5>COSTO INDIRECTOS DE OPERACIONES</h5></th>
                            </tr>
                            <tr>
                                <th>COSTO ACUMULADO PROGRAMADO</th>
                                <th>TASA DE APLICACIÓN</th>
                                <th>COSTO PROGRAMADO DE COSTOS INDIRECTOS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" class="form-control" id="cap" name="cap" step="0.01"></label></td>
                                <td><input type="number" class="form-control" id="tda" name="tda" step="0.01"></label></td>
                                <td><input type="number" class="form-control" id="cpd" name="cpd" step="0.01"></label></td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th colspan="3"><h5>COSTO FINANCIERO</h5></th>
                            </tr>
                            <tr>
                                <th>TIEMPO PROGRAMADO</th>
                                <th>TASA FINANCIERA (%)</th>
                                <th>COSTO TOTAL PROGRAMADO FINANCIERO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" class="form-control" id="tip" name="tip" step="0.01"></label></td>
                                <td><input type="number" class="form-control" id="taf" name="taf" step="0.01"></label></td>
                                <td><input type="number" class="form-control" id="ctp" name="ctp" step="0.01"></label></td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th>F.E.E. PROGRAMADO (%)</th>
                                <th></th>
                                <th>F.E.E. VARIABLE (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label id="feeP"></label></td>
                                <td></td>
                                <td><input type="text" id="feeV" onkeyup="costosExternos()" class="form-control" value="30%"></td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">TOTAL PRESUPUESTADO</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">COSTO TOTAL DEL PROYECTO</th>
                                <td><input type="number" class="form-control" id="to1" name="to1" step="0.01"></label></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">F.E.E.</th>
                                <td><input type="number" class="form-control" id="to2" name="to2" step="0.01"></label></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">COSTO TOTAL DEL PROYECTO MAS F.E.E.</th>
                                <td><input type="number" class="form-control" id="to3" name="to3" step="0.01"></label></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">COSTO TOTAL DEL PROYECTO MAS IMPUESTO</th>
                                <td><input type="number" class="form-control" id="to4" name="to4" step="0.01"></label></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                            <tr>
                                <th>Costo total para enviar al cliente</th>
                                <td><input type="number" class="form-control" onclick="this.select()" id="cant" value="0.00" onkeyup="costosExternos();" step="0.01"></td>
                                <td><input type="number" class="form-control" onclick="this.select()" id="prize" value="0.00" onkeyup="costosExternos();" step="0.01"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--bloque de botones-->
            <div class="row" id="botones">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    <input type="submit" value="Guardar" class="btn btn-info">
                    <a href="menu.php?id=<?php echo $usuario; ?>"><input name="salir" type="button" value="Salir" class="btn btn-info"> </a>

                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
        <script src="js/jquery-3.3.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>

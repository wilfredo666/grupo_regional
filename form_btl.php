<?php
include 'conexion.php';
include 'modal_generar_codigo_btl.php';
$usuario=$_GET['id'];
?>
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
        <div class="container-fluid bg-primary">
            <h1>HOJA DE COSTO DE ACTIVACIONES Y SERVICIOS BTL</h1>
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
                                <buttom type="button" class="btn btn-primary" data-toggle="modal" data-target="#generar_codigo_proyecto_btl" onclick="">Generar</buttom>
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
                                <input type="number" class="form-control" name="tiempoC" id="tiempoC" onkeyup="costosExternos()" onclick="this.select()" value="0">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tipo de proyecto:</div>
                                </div>
                                <select class="form-control" name="tipo" id="exoin" onchange="costosExternos()">
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
                    <!--tablas para la insercion de datos a calcular-->
                    <br>
                    <table class="table table-sm">
                        <!--tablas para la insercion de datos a calcular-->
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h2>1) PERSONAL INTERNO DIRECTO QUE INTERVIENE EN PROYECTO</h2></th>
                            </tr>
                            <tr>
                                <th colspan="3" scope="col">DETALLE</th>  
                                <th scope="col">TIEMPO</th>
                                <th scope="col">TIEMPO PROGRAMADO</th>
                                <th scope="col">CANTIDAD DE PERSONAS</th>
                                <th scope="col">TASA PRESUPUESTARIA</th>
                                <th scope="col">COSTO SUGERIGO</th>
                                <th scope="col">COSTO TOTAL PROGRAMADO DE M.O.D.</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita1">
                                <td colspan="3"><select name="t1_deta" id="t1_deta" class="form-control">
                                    <option>EJECUTIVO DE CUENTAS</option>
                                    <option>SUPERVISOR DEL PROYECTO</option>
                                    </select></td>
                                <td><select onChange= "t1_subTotal()" name="t1_tiem" id="t1_tiem" class="form-control">
                                    <option>DIAS</option>
                                    <option>HORAS</option>
                                    </select></td>
                                <td><input type="number" name="t1_tieP" id="t1_tieP" value="0" onchange="t1_subTotal()" onkeyup="t1_subTotal()" onClick="this.select();" class="form-control"></td>
                                <td><input type="number" name="t1_cant" id="t1_cant" value ="0" onkeyup="t1_subTotal()" onClick="this.select();" class="form-control"></td>
                                <td><input type="text" name="t1_tasa" id="t1_tasa" readonly class="form-control" ></td>
                                <td><input type="number" name="" id="" class="form-control" step="0.01" value="0" readonly></td>
                                <td><input type="text" name="t1_cost" id="t1_cost" readonly class="form-control"></td>
                                <td><button type="button" class="btn btn-success" onClick="t1_addRow()">+</button></td>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center">MANO DE OBRA DIRECTA</th>
                                <th></th>
                                <td><label id="t1_ti">0</label></td>
                                <td><label id="t1_ca">0</label></td>
                                <td><label id="t1_ta">0</label></td>
                                <td><label id="t1_co">0</label></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm" id="t2">
                        <thead class="thead-light">
                            <tr><th colspan="9"><h2>2) PERSONAL EXTERNO DIRECTO QUE INTERVIENE EN EL PROYECTO</h2></th></tr>
                            <tr>
                                <th colspan="2" scope="col">PERSONAL</th>
                                <th scope="col">CANTIDAD DE PERSONAS</th>
                                <th scope="col">CANTIDAD DE ACTIVACIONES</th>
                                <th scope="col">PAGO POR ACTIVACION</th>
                                <th scope="col">REGION/CIUDAD</th>
                                <th scope="col">TOTAL ACT. MAS CARGA IMPOSITIVA C/U</th>
                                <th scope="col">COSTO SUGERIGO</th>
                                <th scope="col">TOTAL ACT. MAS CARGA IMPOSITIVA GLOBAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita2">
                                <td colspan="2"><input type="text" name="t2_pers[0]" id="t2_pers0" class="form-control"></td>
                                <td><input type="number" value="0" class="form-control" onkeyup="t2_subTotal()" name="t2_cant" id="t2_cant" ></td>
                                <td><input type="number" value="0" name="t2_canA" id="t2_canA" onkeyup="t2_subTotal()" class="form-control"></td>
                                <td><input type="number" value="0" name="t2_pago" id="t2_pago" onkeyup="t2_subTotal()"  class="form-control" step="0.01"></td>
                                <td><select name="t2_regi" id="t2_regi" class="form-control">
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
                                <td><input type="text" name="t2_tot1" id="t2_tot1" class="form-control" readonly></td>
                                <td><input type="number" name="" id="" class="form-control" step="0.01" value="0" readonly></td>
                                <td><input type="text" name="t2_tot2" id="t2_tot2" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-success" onClick="t2_addRow()">+</button></td>
                            </tr>
                            <tr>
                                <th colspan="2"><label>TOTAL</label></th>
                                <td><label id="t2_cp">0</label></td>
                                <td><label id="t2_ca">0</label></td>
                                <td><label id="t2_pa">0</label></td>
                                <td></td>
                                <td><label id="t2_t1">0</label></td>
                                <td><label id="t2_t2">0</label></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--Equipos, meteriales y servicios totales del proyecto-->
                    <!--tabla - materiales-->
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h2>3) EQUIPOS, MATERIALES Y SERVICIOS TOTALES DEL PROYECTO</h2></th>
                            </tr>
                            <tr>
                                <th colspan="4">MATERIALES</th>
                                <th colspan="4">COSTOS MATERIALES ESTIMADOS</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="2">MATERIAL ADQUIRIDO/ENTREGADO POR ALMACEN</th>
                                <th>PROVEEDOR</th>
                                <th>UNIDAD DE MEDIDA</th>
                                <th>CANTIDAD ESTIMADA</th>
                                <th>COSTO UNITARIO</th>
                                <th>DOCUMENTO</th>
                                <th>COSTO SUGERIGO</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita3">
                                <td colspan="2"><input type="text" name="t3_mate" id="t3_mate" class="form-control"></td>
                                <td><select name="t3_prov" id="t3_prov" class="form-control">
                                    <option>---</option>
                                    </select></td>
                                <td><select name="t3_unid" id="t3_unid" class="form-control">
                                    <option>PIEZAS</option>
                                    </select></td>
                                <td><input type="number" onClick="this.select()" onkeyup="t3_subTotal()" value="0" name="t3_cant" id="t3_cant" class="form-control"></td>
                                <td><input type="number" onClick="this.select()" onkeyup="t3_subTotal()" value="0" name="t3_cost" id="t3_cost" class="form-control" step="0.01"></td>
                                <td><select name="t3_docu" id="t3_docu" onChange="t3_subTotal()" class="form-control">
                                    <option>FACTURA</option>
                                    <option>RECIBO</option>
                                    <option>ALMACEN</option>
                                    </select></td>
                                <td><input type="number" name="" id="" class="form-control" step="0.01" value="0" readonly></td>
                                <td><input type="text" name="t3_tota" id="t3_tota" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-success" onClick="t3_addRow()">+</button></td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label id="t3_ca">0</label></td>
                                <td><label id="t3_co">0</label></td>
                                <td></td>
                                <td><label id="t3_to">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--tabla - servicios-->
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="4">SERVICIOS</th>
                                <th colspan="4">COSTOS ESTIMADO DE SERVICIOS</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th colspan="2">SERVICIOS CONTRATADOS</th>
                                <th>PROVEEDOR</th>
                                <th>UNIDAD DE MEDIDA</th>
                                <th>CANTIDAD</th>
                                <th>COSTO UNITARIO</th>
                                <th>DOCUMENTO</th>
                                <th>COSTO SUGERIGO</th>
                                <th>TOTAL CLIENTE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita4">
                                <td colspan="2"><input type="text" name="t4_serv" id="t4_serv" class="form-control"></td>
                                <td><select name="t4_prov" id="t4_prov" class="form-control">
                                    <option value="">---</option>
                                    </select></td>
                                <td><select name="t4_unid" id="t4_unid" class="form-control">
                                    <option value="">PIEZAS</option>
                                    </select></td>
                                <td><input type="number" onClick="this.select()" onkeyup="t4_subTotal()" value="0" name="t4_cant" id="t4_cant" class="form-control"></td>
                                <td><input type="number" onClick="this.select()" onkeyup="t4_subTotal()" value="0" name="t4_cost" id="t4_cost" class="form-control" step="0.01"></td>
                                <td><select name="t4_docu" id="t4_docu" onChange="t4_subTotal()"  class="form-control">
                                    <option>FACTURA</option>
                                    <option>RECIBO</option>
                                    <option>SIN IMPUESTO</option>
                                    <option>ALQUILER SIN RECIBO</option>
                                    <option>VIATICOS</option>
                                    </select></td>
                                <td><input type="number" name="" id="" class="form-control" step="0.01" value="0" readonly></td>
                                <td><input type="text" name="t4_tota" id="t4_tota" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-success" onclick="t4_addRow()">+</button></td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label id="t4_ca">0</label></td>
                                <td><label id="t4_co">0</label></td>
                                <td></td>
                                <td><label id="t4_to">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--Servicio/productos propios de grupo regional-->
                    <!--tabla - producto propio de taller-->
                    <table class="table table-sm" id="tablita5">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h2>4) SERVICIO / PRODUCTOS PROPIOS DE GRUPO REGIONAL</h2></th>
                            </tr>
                            <tr>
                                <th colspan="9"><h4>PRODUCTOS PROPIOS DE TALLER</h4></th>
                            </tr>
                            <tr>
                                <th colspan="3">PRODUCTOS TERMINADOS</th>
                                <th colspan="2">UNIDAD DE MEDIDA</th> <!--AQUI ME QUEDE-->
                                <th>CANTIDAD</th>
                                <th>COSTO UNITARIO</th>
                                <th>COSTO SUGERIGO</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="3"><input type="text" id="t5_prod" name="t5_prod" class="form-control"></td>
                            <td colspan="2"><select name="t5_unid" id="t5_unid" class="form-control">
                                <option>---</option>
                                </select></td>
                            <td><input type="number" id="t5_cant" name="t5_cant" onClick="this.select()" onkeyup="t5_subTotal()" value="0" class="form-control"></td>
                            <td><input type="number" id="t5_cost" name="t5_cost" onClick="this.select()" onkeyup="t5_subTotal()" value="0" class="form-control" step="0.01"></td>
                            <td><input type="number" name="" id="" class="form-control" step="0.01" value="0" readonly></td>
                            <td><input type="text" id="t5_tota" name="t5_tota" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-success" onclick="t5_addRow()">+</button></td>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label id="t5_ca">0</label></td>
                                <td><label id="t5_co">0</label></td>
                                <td><label id="t5_to">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--tabla - servicio de operacion propio-->
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h4>SERVICIO DE OPERACION PROPIO - ATL</h4></th>
                            </tr>
                            <tr>
                                <th colspan="4">DETALLE</th>
                                <th>CANTIDAD</th>
                                <th>COSTO UNITARIO</th>
                                <th>COSTO SUGERIGO</th>
                                <th>TOTAL</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita6">
                                <td colspan="4"><input type="text" id="t6_prod" name="t6_prod" class="form-control"></td>
                                <td><input type="number" id="t6_cant" name="t6_cant" onClick="this.select()" onkeyup="t6_subTotal()" value="0" class="form-control"></td>
                                <td><input type="number" id="t6_cost" name="t6_cost" onClick="this.select()" onkeyup="t6_subTotal()" value="0" class="form-control" step="0.01"></td>
                                <td><input type="number" name="" id="" class="form-control" step="0.01" value="0" readonly></td>
                                <td><input type="text" id="t6_tota" name="t6_tota" class="form-control" readonly></td>
                                <td></td>
                                <td><button type="button" class="btn btn-success" onclick="t6_addRow()">+</button></td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label id="t6_ca">0</label></td>
                                <td><label id="t6_co">0</label></td>
                                <td><label id="t6_to">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--tabla - equipos propios-->
                    <table class="table table-sm">    
                        <thead class="thead-light">
                            <tr>
                                <th colspan="9"><h4>EQUIPOS PROPIOS - ALMACEN GR</h4></th>
                            </tr>
                            <tr>
                                <th colspan="3">DETALLE</th>
                                <th colspan="2">UNIDAD DE MEDIDA</th> <!--AQUI ME QUEDE-->
                                <th>CANTIDAD</th>
                                <th>COSTO UNITARIO</th>
                                <th>COSTO SUGERIGO</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita7">
                                <td colspan="3"><input type="text" id="t7_prod" name="t7_prod" class="form-control"></td>
                                <td colspan="2"><select name="t7_unid" id="t7_unid" class="form-control">
                                    <option>---</option>
                                    </select></td>
                                <td><input type="number" id="t7_cant" name="t7_cant" onClick="this.select()" onkeyup="t7_subTotal()" value="0" class="form-control"></td>
                                <td><input type="number" id="t7_cost" name="t7_cost" onClick="this.select()" onkeyup="t7_subTotal()" value="0" class="form-control"></td>
                                <td><input type="number" name="" id="" class="form-control" step="0.01" value="0" readonly></td>
                                <td><input type="text" id="t7_tota" name="t7_tota" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-success" onclick="t7_addRow()">+</button></td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label id="t7_ca">0</label></td>
                                <td><label id="t7_co">0</label></td>
                                <td><label id="t7_to">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--formulario parte 2-->
                <div class="col-3">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>TOTAL CANTIDAD DE PERSONAS</th>
                                <th>TOTAL CANTIDAD DE ACTIVACIONES</th>
                                <th>TOTALES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" class="form-control" id="tcp" name="tcp" step="0.01"></label></td>
                    <td><input type="number" class="form-control" id="tca" name="tca" step="0.01"></label></td>
            <td><input type="number" class="form-control" id="ttt" name="ttt" step="0.01"></label></td>
    </tr>
</tbody>
<thead class="thead-light">
    <tr>
        <th colspan="3"><h5>COSTO INDIRECTOS DEL PROYECTO</h5></th>
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
<td><input type="number" class="form-control" id="cpc" name="cpc" step="0.01"></label></td>
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
        <td><input type="number" class="form-control" id="tio" name="tio" step="0.01"></label></td>
<td><input type="number" class="form-control" id="taf" name="taf" step="0.00001"></label></td>
<td><input type="number" class="form-control" id="ctp" name="ctp" step="0.01"></label></td>
</tr>
</tbody>
<thead class="thead-light">
    <tr>
        <th>F.E.E. PROGRAMADO</th>
        <th></th>
        <th>F.E.E. VARIABLE</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td><input type="text" class="form-control" id="feeP" name="feeP" step="0.01"></label></td>
<td></td>
<td><input type="text" class="form-control" id="feeV" name="feeV" value="15%" onkeyup="costosExternos()"></td>
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
        <td><input type="number" class="form-control" id="tp1" name="tp1" step="0.01"></td>
        <td></td>
    </tr>
    <tr>
        <th scope="row">F.E.E.</th>
        <td><input type="number" class="form-control" id="tp2" name="tp2" step="0.01"></td>
        <td></td>
    </tr>
    <tr>
        <th scope="row">COSTO TOTAL DEL PROYECTO MAS F.E.E.</th>
        <td><input type="number" class="form-control" id="tp3" name="tp3" step="0.01"></td>
        <td></td>
    </tr>
    <tr>
        <th scope="row">COSTO TOTAL DEL PROYECTO MAS IMPUESTO</th>
        <td><input type="number" class="form-control" id="tp4" name="tp4" step="0.01"></td>
        <td></td>
    </tr>
</tbody>
<thead class="thead-light">
    <tr>
        <th colspan="3">TOTAL PROFORMA</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th scope="row">PERSONAL ACTIVO</th>
        <td><input type="number" class="form-control" id="tp5" name="tp5"></td>
        <td></td>
    </tr>
    <tr>
        <th>MATERIAL Y SERVICIOS</th>
        <td><input type="number" class="form-control" id="tp6" name="tp6" step="0.01"></td>
        <td></td>
    </tr>
    <tr>
        <th>TOTAL</th>
        <td><input type="number" class="form-control" id="tp7" name="tp7" step="0.01"></td>
        <td></td>
    </tr>
</tbody>
</table>
<a data-backdrop="static" data-keyboard="false" href="#estructura_activacion" type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="cargar_personal_externo()">ESTRUCTURA DE COSTOS POR ACTIVACION</a>

<div class="modal fade" id="estructura_activacion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="input-group">
                    <div class="input-group-prepend" id="">
                        <div class="input-group-text">Escojer personal:</div>
                    </div>
                    <select name="empleado_ext" id="empleado_ext" class="form-control">
                    </select>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="borrar_personal_externo()">&times;</span>
                    </button>
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
                                    <label for="" id="" class="form-control">-</label>
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
<div class="row" id="botones">
    <div class="col-sm-4"></div>
    <div class="col-sm-6">
        <input type="submit" value="Guardar" class="btn btn-info">
        <a href="menu.php?id=<?php echo $usuario; ?>"><input name="salir" type="button" value="Salir" class="btn btn-info"> </a>

    </div>
    <div class="col-sm-2"></div>
</div>
</form>
<script type="text/javascript" src="js/form_btl.js"></script>
<script src="js/jquery-3.3.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

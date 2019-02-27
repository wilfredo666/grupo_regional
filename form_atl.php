<?php
include 'conexion.php';
include 'modal_generar_codigo_atl.php';
$usuario=$_GET['id'];
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Formulario ATL</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="css/atl.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>

    <body>
        <div class="container-fluid bg-success">
            <h1>HOJA DE COSTO DE OPERACIONES - ATL</h1>
        </div>
        <form action="guardar_form_atl.php?id=<?php echo $usuario;?>" id="form1" name="form1" method="post" onKeyPress="return disableEnterKey(event)">
            <div class="container-fluid">
                <div class="row">
                    <!--formulario parte 1-->
                    <div class="col-9">
                        <!--ingreso de datos iniciales-->
                        <div class="row">
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
                                    <button data-backdrop="static" type="button" class="btn btn-primary" data-toggle="modal" data-target="#generar_codigo_proyecto_atl" onclick="">Generar</button>
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
                                    <input type="date" class="form-control" name="fecha_inicio" id="date" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Fecha de conclucion del proyecto:</div>
                                    </div>
                                    <input type="date" class="form-control" name="fecha_fin" id="date2" data-placement="top" title="Insertar una vez concluido el proyecto">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Tiempo de credito (en dias):</div>
                                    </div>
                                    <input type="number" class="form-control" name="tiempo_credito" id="number" onclick="this.select()" value="0" onkeyup="costosExternos()">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Tipo de proyecto:</div>
                                    </div>
                                    <select class="form-control" name="exoin" id="exoin" onchange="costosExternos()">
                                        <option>EXTERNO</option>
                                        <option>INTERNO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--tablas para la insercion de datos a calcular-->
                        <div class="row">
                            <table class="table table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="9"><h2>1) PERSONAL DIRECTO QUE INTERVIENE EN LA OPERACION</h2></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">DETALLE</th>
                                        <th scope="col">NOMBRE DEL PERSONAL</th>
                                        <th scope="col">TIEMPO</th>
                                        <th scope="col">TIEMPO PROGRAMADO</th>
                                        <th scope="col">CANTIDAD DE PERSONAS</th>
                                        <th scope="col">TASA PRESUPUESTARIA</th>
                                        <th scope="col">COSTO TOTAL PROGRAMADO DE M.O.D.</th>
                                        <th scope="col">PRECIO COTIZADO SIN F.E.E</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="tablita1">
                                        <td><select name="staf[0]" onChange= "actualizarTaza(0)" id="staf0" class="form-control">
                                            <option>EJECUTIVO DE CUENTAS</option>
                                            <option>ENCARGADO LOGISTICO</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="detalle[0]" id="detalle0" class="form-control"></td>
                                        <td><select onChange= "actualizarTaza(0)" name="dayorhour[0]" id="dayorhour0" class="form-control">
                                            <option>SELECCIONAR</option>
                                            <option>DIAS</option>
                                            <option>HORAS</option>
                                            </select>
                                        </td>
                                        <td><input type="number" name="time[0]" id="time0" value="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                                        <td><input type="number" name="nrop[0]" id="nrop0" value ="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                                        <td><input type="number" name="tasa[0]" id="tasa0" value="0" onkeyup="actualizarCostoTotal(0)" readonly class="form-control" step="0.01"></td>
                                        <td><input type="number" name="costop[0]" id="costop0" value="0" readonly class="form-control" step="0.01"></td>
                                        <td><input type="number" name="precioC[0]" id="precioC0" value="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control" step="0.01"></td>
                                        <td><button type="button" class="btn btn-success" onClick="addRow()">+</button></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" >SOPORTE LOGISTICO</th>
                                        <td id="totalTi">0</td>
                                        <td id="totalCa">0</td>
                                        <td id="totalTa">0</td>
                                        <td id="totalCo">0</td>
                                        <td id="totalPr">0</td>
                                        <td></td>
                                    </tr
                                </tbody>
                            </table>
                                <table class="table table-sm">
                                    <thead class="thead-light">
                                        <tr><th colspan="9"><h2>2) MATERIALES Y SERVICIOS QUE INTERVIENEN EN LA OPERACION</h2></th></tr>
                                        <tr>
                                            <th scope="col" colspan="2"><label>MATERIALES</label></th>
                                            <th scope="col" colspan="7"><label>COSTO ESTIMADO EN MATERIALES</label></th>
                                        </tr>
                                        <tr>
                                            <th scope="col"><label>MATERIALES</label></th>
                                            <th scope="col"><label>NOMBRE DEL PROVEEDOR</label></th>
                                            <th scope="col"><label>CANTIDAD ESTIMADA</label></th>
                                            <th scope="col"><label>COSTO UNITARIO</label></th>
                                            <th scope="col"><label>DOCUMENTO</label></th>
                                            <th scope="col"><label>COSTO TOTAL ESTIMADO</label></th>
                                            <th scope="col"><label>PRECIO COTIZADO SIN F.E.E.</label></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="tablita2">
                                            <td><input type="text" name="t2_mat[0]" id="t2_mat0" class="form-control"></td>
                                            <td><input type="text" name="t2_nom[0]" id="t2_nom0" class="form-control"></td>
                                            <td><input type="number" name="t2_can[0]" onkeyup="t2_subTotal(0)" id="t2_can0" value="0" class="form-control" onClick="this.select();"></td>
                                            <td><input type="number" name="t2_cos[0]" onkeyup="t2_subTotal(0)" id="t2_cos0" value="0" class="form-control" onClick="this.select();" step="0.01"></td>
                                            <td><select name="t2_doc[0]" id="t2_doc0" onchange="t2_subTotal(0)" class="form-control">
                                                <option>FACTURA</option>
                                                <option>RECIBO</option>
                                                </select></td>
                                            <td><input type="text" class="form-control" name="t2_tot[0]" id="t2_tot0" value="0" readonly></td>
                                            <td><input type="number" onkeyup="t2_subTotal(0)" name="t2_pre[0]" id="t2_pre0" value="0" class="form-control" onClick="this.select();" step="0.01"></td>
                                            <td></td>
                                            <td><button type="button" class="btn btn-success" onclick="addRow_t2();">+</button></td>
                                        </tr>
                                        <tr>
                                            <th colspan="5">TOTAL</th>
                                            <td><label  id="t2_costoT">0</label></td>
                                            <td><label id="t2_precioT">0</label></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-sm">
                                    <!--tabla 2 - servicios-->
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2"><label>SERVICIOS CONTRATADOS</label></th>
                                            <th colspan="6"><label>COSTO ESTIMADO DE SERVICIOS</label></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th scope="col"><label>SERVICIOS CONTRATADOS</label></th>
                                            <th scope="col"><label>NOMBRE DEL PROVEEDOR</label></th>
                                            <th scope="col"><label>DIAS</label></th>
                                            <th scope="col"><label>CANTIDAD ESTIMADA</label></th>
                                            <th scope="col"><label>COSTO UNITARIO</label></th>
                                            <th scope="col"><label>TIPO O FORMA</label></th>
                                            <th scope="col"><label>TOTAL COSTO PROGRAMADO</label></th>
                                            <th scope="col"><label>PRECIO COTIZADO SIN F.E.E.</label></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="tablita3">
                                            <td><input type="text" name="t3_ser[0]" id="t3_ser0" class="form-control"></td>
                                            <td><input type="text" name="t3_nom[0]" id="t3_nom0" class="form-control"></td>
                                            <td><input type="number" name="t3_dia[0]" id="t3_dia0" value="0" onClick="this.select()" onkeyup="t3_subTotal(0)" class="form-control"></td>
                                            <td><input type="number" name="t3_can[0]" id="t3_can0" value="0" onClick="this.select()" onkeyup="t3_subTotal(0)" class="form-control" ></td>
                                            <td><input type="number" name="t3_cos[0]" id="t3_cos0" value="0" onClick="this.select()" onkeyup="t3_subTotal(0)" class="form-control" step="0.01"></td>
                                            <td><select name="t3_tip[0]" id="t3_tip0" onChange="t3_subTotal(0)"  class="form-control">
                                                <option>FACTURA</option>
                                                <option>RECIBO</option>
                                                <option>SIN IMPUESTO</option>
                                                <option>ALQUILER SIN RECIBO</option>
                                                </select></td>
                                            <td><input type="text" name="t3_tot[0]" id="t3_tot0" value="0" class="form-control" readonly></td>
                                            <td><input type="number" name="t3_pre[0]" value="0" id="t3_pre0" onClick="this.select()" onkeyup="t3_subTotal(0)" class="form-control" step="0.01"></td>
                                            <td><button type="button" class="btn btn-success" onclick="addRow_t3();">+</button></td>
                                        </tr>
                                        <tr>
                                            <th colspan="6"><label>TOTAL</label></th>
                                            <td><label  id="t3_costoT">0</label></td>
                                            <td><label id="t3_precioT">0</label></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-sm">
                                    <!--PRODUCTOS/EQUIPOS PROPIOS DE GRUPO REGIONAL-->
                                    <!--productos de taller-->
                                    <thead class="thead-light">
                                        <tr><th colspan="9"><h2>3) PRODUCTOS / EQUIPOS PROPIOS DE GRUPO REGIONAL</h2></th></tr>
                                        <tr><th colspan="9">PRODUCTOS PROPIOS DE TALLER</th></tr>
                                        <tr>
                                            <th scope="col">PRODUCTOS TERMINADOS DE TALLER</th>
                                            <th scope="col">CANTIDAD</th>
                                            <th scope="col">COSTO UNITARIO</th>
                                            <th scope="col">COSTO TOTAL</th>
                                            <th scope="col"></th>
                                            <th cope="col"></th>
                                            <th cope="col"></th>
                                            <th cope="col"></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="tablita4">
                                            <td><input type="text" name="t4_pro[0]" id="t4_pro0" class="form-control"></td>
                                            <td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal(0)" class="form-control" name="t4_can[0]" id="t4_can0"></td>
                                            <td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal(0)" name="t4_cos[0]" id="t4_cos0" class="form-control" step="0.01"></td>
                                            <td><input type="text" name="t4_coT[0]" id="t4_coT0" value="0" class="form-control" readonly></td>
                                            <td><input type="hidden" value="0" onClick="this.select()" onkeyup="t4_subTotal(0)" name="t4_pre[0]" id="t4_pre0" class="form-control"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><button type="button" class="btn btn-success" onclick="addRow_t4()">+</button></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><label>TOTAL</label></th>
                                            <td><label id="t4_costoU">0</label></td>
                                            <td><label id="t4_costoT">0</label></td>
                                            <td><label id="t4_precioT" style="display:none;">0</label></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--equipos propios -->
                                <table class="table table-sm"> 
                                    <thead class="thead-light">
                                        <tr><th colspan="9">EQUIPOS PROPIOS</th></tr>
                                        <tr>
                                            <th scope="col">DETALLE</th>
                                            <th scope="col">CANTIDAD</th>
                                            <th scope="col">COSTO UNITARIO</th>
                                            <th scope="col">COSTO TOTAL</th>
                                            <th scope="col">PRECIO COTIZADO SIN F.E.E</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>             
                                        <tr  id="tablita5">
                                            <td><input type="text" name="t5_det[0]" id="t5_det0" class="form-control"></td>
                                            <td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal(0)" name="t5_can[0]" id="t5_can0" class="form-control"></td>
                                            <td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal(0)" name="t5_coU[0]" id="t5_coU0" class="form-control" step="0.01"></td>
                                            <td><input type="number" name="t5_coT[0]" id="t5_coT0" value="0" class="form-control" readonly></td>
                                            <td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal(0)" name="t5_pre[0]" id="t5_pre0" class="form-control" step="0.01"></td>
                                            <td></td>
                                            <td></td>
                                            <td scope="col"><button type="button" class="btn btn-success" onclick="addRow_t5()">+</button></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">TOTAL</th>
                                            <td><label id="t5_costoU">0</label></td>
                                            <td><label id="t5_costoT">0</label></td>
                                            <td><label id="t5_precioT">0</label></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                        </div>
                        <!--formulario parte 2-->
                        <div class="col-3">
                            <table class="table table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="3"><h5>COSTO DE VALOR AGREGADO</h5></th>
                                    </tr>
                                    <tr>
                                        <th>COSTO PROGRAMADO DEL PROYECTO</th>
                                        <th>COSTO ESTIMADO DEL PROYECTO</th>
                                        <th>DIFERENCIA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="number" class="form-control" id="costoVA" name="costoVA" step="0.01" readonly></td>
                                        <!--<td class="text-center"><label id="costoVA">0</label></td>-->
                                        <td class="text-center"><input type="number" class="form-control" id="costoED" name="costoED" step="0.01" readonly></label></td>
                            <td class="text-center"><input type="number" class="form-control" id="diferencia" name="diferencia" step="0.01" readonly></label></td>
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
                    <td class="text-center"><input type="number" class="form-control" id="costoAp" name="costoAp" step="0.01" readonly></td>
                    <td class="text-center"><input type="number" class="form-control" id="tasaDa" name="tasaDa" step="0.01" readonly></td>
                    <td class="text-center"><input type="number" class="form-control" id="costoPd" name="costoPd" step="0.01" readonly></td>
                </tr>
            </tbody>
            <thead class="thead-light">
                <tr>
                    <th colspan="3"><h5>COSTO FINANCIERO</h5></th>
                </tr>
                <tr>
                    <th>TIEMPO PROGRAMADO</th>
                    <th>TASA FINANCIERA(%)</th>
                    <th>COSTO TOTAL PROGRAMADO FINANCIERO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><input type="number" class="form-control" id="tiempoPr" name="tiempoPr" step="0.01" readonly></td>
                    <td class="text-center" readonly><input type="number" class="form-control" id="tasaFi" step="0.01" readonly></td>
                    <td class="text-center"><input type="number" class="form-control" id="costoTo" step="0.01" readonly></td>
                </tr>
            </tbody>
            <thead class="thead-light">
                <tr>
                    <th>F.E.E. PROGRAMADO(%)</th>
                    <th></th>
                    <th>F.E.E. VARIABLE(%)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number" class="form-control" id="feeP" name="feeP" step="0.01" readonly></td>
                    <td></td>
                    <td><input type="number" class="form-control" id="feeV" name="feeV" value="0" onkeyup="costosExternos()" step="0.01"></td>
                </tr>
            </tbody>
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">TOTAL EJECUTADO</th>
                    <th scope="col">TOTAL F.E.E</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">COSTO TOTAL DEL PROYECTO</th>
                    <td><input type="number" class="form-control" id="totalE1" name="totalE1" step="0.01" readonly></td>
                    <td><input type="number" class="form-control" id="totalF1" name="totalF1" step="0.01" readonly></td>
                </tr>
                <tr>
                    <th scope="row">F.E.E.</th>
                    <td><input type="number" class="form-control" id="totalE2" name="totalE2" step="0.01" readonly></td>
                    <td><input type="number" class="form-control" id="totalF2" name="totalF2" step="0.01" readonly></td>
                </tr>
                <tr>
                    <th scope="row">COSTO TOTAL DEL PROYECTO MAS F.E.E.</th>
                    <td><input type="number" class="form-control" id="totalE3" name="totalE3" step="0.01" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">COSTO TOTAL DEL PROYECTO MAS IMPUESTO</th>
                    <td><input type="text" class="form-control" id="totalE4" name="totalE4" readonly></td>
                    <td><input type="text" class="form-control" id="totalF4" name="totalF4" step="0.01" readonly></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Costo total para enviar al cliente</td>
                    <td></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="titulo">
    Tooltip on top
</button>
<!--bloque de botones-->
<div class="row" id="botones">
    <div class="col-sm-4"></div>
    <div class="col-sm-6">
        <input type="submit" value="Guardar" class="btn btn-info">
        <a href="menu.php?id=<?php echo $usuario; ?>"><input name="salir" type="button" value="Salir" class="btn btn-info"></a>
    </div>
    <div class="col-sm-2"></div>
</div>           
</div>
</form>
<script>

</script>
<script type="text/javascript" src="js/form_atl.js"></script>
<script src="js/jquery-3.3.1.js"></script>
<script src="bootstrap/js/bootstrap.bundle.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

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
    <body onload="inicio()">
        <div class="container-fluid bg-success">
            <h1>EVENTOS</h1>
        </div>
        <form action="guardar_form_atl.php?id=<?php echo $usuario;?>" id="form1" name="form1" method="post">
            <div class="container-fluid">
                <div class="row">
            <!-------------------------formulario parte 1--------------------------------->

                    <div class="col-9">

                        <!--datos iniciales-->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Cliente:</div>
                                    </div>
                                    <select name="cliente" id="cliente" class="form-control" onchange="dias_credito()">
                                        <?php mostrar_cliente();?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" title="fsdfsdf">Codigo de proyecto:</div>
                                    </div>
                                    <input name="cod_proyecto" type="text" class="form-control" id="form_codigo">
                                    <button data-backdrop="static" type="button" class="btn btn-primary" data-toggle="modal" data-target="#generar_codigo_proyecto_atl">Generar</button>
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
                                    <input type="date" class="form-control" name="fecha_aprobacion" id="date3" hidden="">
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
                                    <input type="number" class="form-control" name="tiempo_credito" id="number" onclick="this.select()" value="0" onkeyup="dias_credito_manual();costosExternos();">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Tipo de proyecto:</div>
                                    </div>
                                    <select class="form-control" name="exoin" id="exoin" onchange="costosExternos()">
                                        <option>EXTERNO</option>
                                        <!--<option>INTERNO</option>-->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <!--tablas para la insercion de datos a calcular-->
                        
                        <div class="row">

                            <!--PERSONAL DIRECTO QUE INTERVIENE EN LA OPERACION-->

                            <table class="table table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="10"><h2>1) PERSONAL QUE INTERVIENE EN LA OPERACION</h2></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">DETALLE</th>
                                        <th scope="col">NOMBRE DEL PERSONAL</th>
                                        <th scope="col">TIEMPO</th>
                                        <th scope="col">TIEMPO PROGRAMADO</th>
                                        <th scope="col">CANTIDAD DE PERSONAS</th>
                                        <th scope="col">TASA PRESUPUESTARIA</th>
                                        <th scope="col">COSTO TOTAL PROGRAMADO DE M.O.D.</th>
                                        <th scope="col">COSTO SUGERIGO</th>
                                        <th scope="col">PRECIO COTIZADO SIN F.E.E</th>
                                        <th><button type="button" class="btn btn-success" onClick="addRow()">+</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="tablita1">
                                        <th colspan="2" >TOTAL</th>
                                        <td></td>
                                        <td id="totalTi">0</td>
                                        <td id="totalCa">0</td>
                                        <td id="totalTa">0</td>
                                        <td id="totalCo">0</td>
                                        <td></td>
                                        <td id="totalPr">0</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!--MATERIALES / SERVICIOS QUE INTERVIENEN EN LA OPERACION-->

                            <table class="table table-sm">
                                <thead class="thead-light">
                                    <tr><th colspan="10"><h2>2) MATERIALES / SERVICIOS QUE INTERVIENEN EN LA OPERACION</h2></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">DETALLES</th>
                                        <th scope="col">NOMBRE DEL PROVEEDOR</th>
                                        <th scope="col">DIAS</label></th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">COSTO UNITARIO</th>
                                <th scope="col">DOCUMENTO</th>
                                <th scope="col">COSTO TOTAL</th>
                                <th scope="col">COSTO SUGERIGO</th>
                                <th scope="col">PRECIO COTIZADO SIN F.E.E.</th>
                                <th><button type="button" class="btn btn-success" onclick="addRow_t3();">+</button></th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr id="tablita3">
                                <th colspan="2">TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="t3_costoT">0</td>
                                <td></td>
                                <td id="t3_precioT">0</td>
                                <td></td>
                            </tr>
                        </tbody>
                        </table>

                    <!--PRODUCTOS / EQUIPOS PROPIOS DE GRUPO REGIONAL-->

                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr><th colspan="7"><h2>3) PRODUCTOS / EQUIPOS PROPIOS DE GRUPO REGIONAL</h2></th></tr>
                            <tr>
                                <th scope="col">DETALLE</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">COSTO UNITARIO</th>
                                <th scope="col">COSTO TOTAL</th>
                                <th cope="col"><button type="button" class="btn btn-success" onclick="addRow_t4()">+</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="tablita4">
                                <th>TOTAL</th>
                                <th></th>
                                <td><label id="t4_costoU">0</label></td>
                                <td><label id="t4_costoT">0</label></td>    
                            </tr>
                        </tbody>
                    </table>
                </div>
                    </div>

            <!-------------------------formulario parte 2--------------------------------->

                    <div class="col-3">
                <table class="table table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th>TOTAL EN ITEMS</th>
                            <th>TASA DE APLICACIÓN</th>
                            <th>COSTO INDIRECTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><input type="number" value="0" class="form-control" id="costoAp" name="costoAp" step="0.01" readonly></td>
                            <td class="text-center"><input type="number" value="0" class="form-control" id="tasaDa" name="tasaDa" step="0.01" readonly></td>
                            <td class="text-center"><input type="number" value="0" class="form-control" id="costoPd" name="costoPd" step="0.01" readonly></td>
                        </tr>
                    </tbody>
                    <thead class="thead-light">
                        <tr>
                            <th>TIEMPO PROGRAMADO</th>
                            <th>TASA FINANCIERA(%)</th>
                            <th>COSTO FINANCIERO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><input type="number" value="0" class="form-control" id="tiempoPr" name="tiempoPr" step="0.01" readonly></td>
                            <td class="text-center" readonly><input type="number" value="0" class="form-control" name="tasaFi" id="tasaFi" step="0.01" readonly></td>
                            <td class="text-center"><input type="number" value="0" class="form-control" id="costoTo" name="costoTo" step="0.01" readonly></td>
                        </tr>
                    </tbody>
                    <thead class="thead-light">
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">TOTAL COTIZACION SIN FEE</th>
                            <td></td>
                            <td><input type="number" value="0" class="form-control" id="totalE1" name="totalE1" step="0.01" readonly></td>
                        </tr>
                        <tr>
                            <th>F.E.E.(%)</th>
                            <th><input type="number" class="form-control" id="feeV" name="feeV" value="1" onkeyup="costosExternos()" step="0.01"></th>
                            <td><input type="number" value="0" class="form-control" id="totalF2" name="totalF2" step="0.01" readonly></td>
                        </tr>
                    </tbody>
                    <thead class="thead-light">
                        <tr>
                            <th>COTIZACION PARA CLIENTE</th>
                            <th>DIFERENCIA</th>
                            <th>COSTO DEL PROYECTO</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><input type="number" value="0" class="form-control" id="costoED" name="costoED" step="0.01" readonly></td>
                            <td class="text-center"><input type="number" value="0" class="form-control" id="diferencia" name="diferencia" step="0.01" readonly min="0"></td>
                            <td><input type="number" value="0" class="form-control" id="costoVA" name="costoVA" step="0.01" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                </div>

        <!--bloque de botones-->

        <div class="row" id="botones">
            <div class="col-sm-4"></div>
            <div class="col-sm-6">
                <input type="submit" value="Guardar" class="btn btn-info" title="echoo asi" data-toggle="tooltip">
                <a href="menu.php?id=<?php echo $usuario; ?>"><input name="salir" type="button" value="Salir" class="btn btn-info"></a>
                <!--<input type="hidden" value="prueba" onclick="resticcion()">-->
            </div>
            <div class="col-sm-2"></div>
</div>           
        </div>
    </form>
<script type="text/javascript" src="js/form_atl.js"></script>
<script src="js/jquery-3.3.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

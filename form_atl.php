<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario ATL</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="css/atl.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <h1>HOJA DE COSTO DE OPERACIONES - ATL</h1>
        </div>
        <form action="guardar_form_atl.php" id="form1" name="form1" method="post">
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
                                    <?php
                                    include 'conexion.php';
                                    $cliente=mysqli_query($con,"select nombre from cliente");
                                    while($fila=mysqli_fetch_array($cliente)){
                                    ?>
                                    <option><?php echo $fila['nombre'];?></option>
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
                                <input name="cod_proyecto" type="text" class="form-control">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generar">Generar</button>
                                <?php include 'modal_generar_codigo.php'?>
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
                                <input type="number" class="form-control" name="tiempo_credito" id="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tipo de proyecto:</div>
                                </div>
                                <select class="form-control" name="tipo_proyecto" id="select2">
                                    <option>EXTERNO</option>
                                    <option>INTERNO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--tablas para la insercion de datos a calcular-->
                    <br>
                    <table class="table table-sm" id="tablita1">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="8"><h2>1) PERSONAL DIRECTO QUE INTERVIENE EN LA OPERACION</h2></th>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><select name="staf0" onChange= "actualizarTaza(0)" id="staf0" class="form-control">
                                    <option>EJECUTIVO DE CUENTAS</option>
                                    <option>ENCARGADO LOGISTICO</option>
                                    <option>SUPERVISOR</option>
                                    </select>
                                </td>
                                <td><input type="text" id="detalle0" class="form-control"></td>
                                <td><select onChange= "actualizarTaza(0)" name="dayorhour0" id="dayorhour0" class="form-control">
                                    <option>DIAS</option>
                                    <option>HORAS</option>
                                    </select>
                                </td>
                                <td><input type="number" name="time0" id="time0" value="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                                <td><input type="number" name="nrop0" id="nrop0" value ="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                                <td><input type="text" name="tasa0" id="tasa0" value="" onkeyup="actualizarCostoTotal(0)" readonly class="form-control"></td>
                                <td><input type="text" name="costop0" id="costop0" value="0" readonly class="form-control"></td>
                                <td><input type="text" name="precioC0" id="precioC0" value="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                                <td><button type="button" class="btn btn-success" onClick="addRow()">+</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm" id="t1">
                        <tbody>
                            <tr>
                                <th scope="row" colspan="3">SOPORTE LOGISTICO</th>
                                <td id="totalTi"></td>
                                <td id="totalCa"></td>
                                <td id="totalTa"></td>
                                <td id="totalCo"></td>
                                <td id="totalPr"></td>
                            </tr
                        </tbody>
                    </table>
                        <table class="table table-sm" id="tablita2">
                            <thead class="thead-light">
                                <tr><th colspan="8"><h2>2) MATERIALES Y SERVICIOS QUE INTERVIENEN EN LA OPERACION</h2></th></tr>
                                <tr>
                                    <th scope="col" colspan="2"><label>MATERIALES</label></th>
                                    <th scope="col" colspan="6"><label>COSTO ESTIMADO EN MATERIALES</label></th>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="t2_mat0" id="t2_mat0" class="form-control"></td>
                                    <td><input type="text" name="t2_nom0" id="t2_nom0" class="form-control"></td>
                                    <td><input type="number" name="t2_can0" onkeyup="t2_subTotal(0)" id="t2_can0" value="0" class="form-control" onClick="this.select();"></td>
                                    <td><input type="number" name="t2_cos0" onkeyup="t2_subTotal(0)" id="t2_cos0" value="0" class="form-control" onClick="this.select();"></td>
                                    <td><select name="t2_doc0" id="t2_doc0" class="form-control">
                                        <option>FACTURA</option>
                                        </select></td>
                                    <td><input type="text" class="form-control" name="t2_tot0" id="t2_tot0" readonly></td>
                                    <td><input type="number" onkeyup="t2_subTotal(0)" name="t2_pre0" id="t2_pre0" value="0" class="form-control" onClick="this.select();"></td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-success" onclick="addRow_t2();">+</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-sm" id="t2">
                            <tr>
                                <th colspan="5">TOTAL</th>
                                <td><label  id="t2_costoT">0</label></td>
                                <td><label id="t2_precioT">0</label></td>
                                <td></td>
                            </tr>
                            </tbody>
                    </table>
                    <table class="table table-sm" id="tablita3">
                        <!--tabla 2 - servicios-->
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2"><label>SERVICIOS</label></th>
                                <th colspan="6"><label>COSTO ESTIMADO DE SERVICIOS</label></th>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="t3_ser0" id="t3_ser0" class="form-control"></td>
                                <td><input type="text" name="t3_nom0" id="t3_nom0" class="form-control"></td>
                                <td><input type="number" name="t3_dia0" id="t3_dia0" value="0" onClick="this.select()" onkeyup="t3_subTotal(0)" class="form-control"></td>
                                <td><input type="number" name="t3_can0" id="t3_can0" value="0" onClick="this.select()" onkeyup="t3_subTotal(0)" class="form-control"></td>
                                <td><input type="number" name="t3_cos0" id="t3_cos0" value="0" onClick="this.select()" onkeyup="t3_subTotal(0)" class="form-control"></td>
                                <td><select name="t3_tip0" id="t3_tip0" onChange="t3_subTotal(0)"  class="form-control">
                                    <option>FACTURA</option>
                                    <option>RECIBO</option>
                                    <option>SIN IMPUESTO</option>
                                    <option>ALQUILER SIN RECIBO</option>
                                    </select></td>
                                <td><input type="text" name="t3_tot0" id="t3_tot0" class="form-control" readonly></td>
                                <td><input type="number" name="t3_pre0" value="0" id="t3_pre0" onClick="this.select()" onkeyup="t3_subTotal(0)" class="form-control"></td>
                                <td><button type="button" class="btn btn-success" onclick="addRow_t3();">+</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm" id="t3">
                        <tbody>
                            <tr>
                                <th colspan="6"><label>TOTAL</label></th>
                                <td><label  id="t3_costoT">0</label></td>
                                <td><label id="t3_precioT">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm" id="tablita4">
                        <!--SERVICIOS/PRODUCTOS PROPIOS DE GRUPO REGIONAL-->
                        <!--productos de taller-->
                        <thead class="thead-light">
                            <tr><th colspan="8"><h2>3) SERVICIOS / PRODUCTOS PROPIOS DE GRUPO REGIONAL</h2></th></tr>
                            <tr><th colspan="8"><h4>PRODUCTOS PROPIOS DE TALLER</h4></th></tr>
                            <tr>
                                <th scope="col">PRODUCTOS TERMINADOS DE TALLER</th>
                                <th scope="col">AREA DE PRODUCCION</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">COSTO UNITARIO</th>
                                <th scope="col">COSTO TOTAL</th>
                                <th scope="col">PRECIO COTIZADO SIN F.E.E</th>
                                <th cope="col"></th>
                                <th cope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="t4_pro0" id="t4_pro0" class="form-control"></td>
                                <td><input type="text" name="t4_are0" id="t4_are0" class="form-control"></td>
                                <td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal(0)" class="form-control" name="t4_can0" id="t4_can0"></td>
                                <td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal(0)" name="t4_cos0" id="t4_cos0" class="form-control"></td>
                                <td><input type="text" name="t4_coT0" id="t4_coT0" class="form-control" readonly></td>
                                <td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal(0)" name="t4_pre0" id="t4_pre0" class="form-control"></td>
                                <td></td>
                                <td></td>
                                <td><button type="button" class="btn btn-success" onclick="addRow_t4()">+</button></td>
                            </tr>
                        </tbody>
                    </table> 
                    <table class="table table-sm" id="t4">  
                        <tbody> 
                            <tr>
                                <th colspan="3"><label>TOTAL</label></th>
                                <td><label id="t4_costoU">0</label></td>
                                <td><label id="t4_costoT">0</label></td>
                                <td><label id="t4_precioT">0</label></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--equipos propios -->
                    <table class="table table-sm" id="tablita5"> 
                        <thead class="thead-light">
                            <tr><td colspan="8"><h4>EQUIPOS PROPIOS</h4></td></tr>
                            <tr>
                                <th scope="col">
                                    DETALLE DEL SERVICIO</th>
                                <th scope="col">AREA DE SERVICIO</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">COSTO UNITARIO</th>
                                <th scope="col">COSTO TOTAL</th>
                                <th scope="col">PRECIO COTIZADO SIN F.E.E</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>             
                            <tr>
                                <td><input type="text" name="t5_det0" id="t5_det0" class="form-control"></td>
                                <td><input type="text" name="t5_are0" id="t5_are0" class="form-control"></td>
                                <td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal(0)" name="t5_can0" id="t5_can0" class="form-control"></td>
                                <td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal(0)" name="t5_coU0" id="t5_coU0" class="form-control"></td>
                                <td><input type="number" name="t5_coT0" id="t5_coT0" class="form-control" readonly></td>
                                <td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal(0)" name="t5_pre0" id="t5_pre0" class="form-control"></td>
                                <td></td>
                                <td></td>
                                <td scope="col"><button type="button" class="btn btn-success" onclick="addRow_t5()">+</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-sm" id="t5">
                        <tbody> 
                            <tr>
                                <th colspan="3">TOTAL</th>
                                <td><label id="t5_costoU">0</label></td>
                                <td><label id="t5_costoT">0</label></td>
                                <td><label id="t5_precioT">0</label></td>
                                <td></td>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                    <!--bloque de botones-->
            <div class="row" id="botones">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    <input type="submit" value="Guardar" class="btn btn-info">
                    <input name="salir" type="button" value="Salir" class="btn btn-info"> 
                </div>
                <div class="col-sm-2"></div>
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
                                <th>COSTO DE VALOR AGREGADO</th>
                                <th>COSTO ESTIMADO DEL PROYECTO</th>
                                <th>DIFERENCIA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
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
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
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
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
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
                                <td><label for="">0</label></td>
                                <td></td>
                                <td><input type="number" class="form-control"></td>
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
                                <td><label for=""></label>0</td>
                                <td><label for=""></label>0</td>
                            </tr>
                            <tr>
                                <th scope="row">F.E.E.</th>
                                <td><label for=""></label>0</td>
                                <td><label for=""></label>0</td>
                            </tr>
                            <tr>
                                <th scope="row">COSTO TOTAL DEL PROYECTO MAS F.E.E.</th>
                                <td><label for=""></label>0</td>
                                <td><label for=""></label>0</td>
                            </tr>
                            <tr>
                                <th scope="row">COSTO TOTAL DEL PROYECTO MAS IMPUESTO</th>
                                <td><label for=""></label>0</td>
                                <td><label for=""></label>0</td>
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
            
        </form>

        <script type="text/javascript" src="jquery/form_atl.js"></script>
        <script src="jquery/jquery-3.3.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>

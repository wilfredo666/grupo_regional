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
                                    <div class="input-group-text">Nombre del proyecto:</div>
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
                                <input type="number" class="form-control" name="number" id="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Tipo de proyecto:</div>
                                </div>
                                <select class="form-control" name="select2" id="select2">
                                    <option>EXTERNO</option>
                                    <option>INTERNO</option>
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
                                <th colspan="8"><h2>1) PERSONAL INTERNO DIRECTO QUE INTERVIENE EN PROYECTO</h2></th>
                            </tr>
                            <tr>
                                <th colspan="3" scope="col">DETALLE</th>  
                                <th scope="col">TIEMPO</th>
                                <th scope="col">TIEMPO PROGRAMADO</th>
                                <th scope="col">CANTIDAD DE PERSONAS</th>
                                <th scope="col">TASA PRESUPUESTARIA</th>
                                <th scope="col">COSTO TOTAL PROGRAMADO DE M.O.D.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3"><select onChange="actualizarTaza(0)"  name="staf0" id="staf0" class="form-control">
                                    <option>EJECUTIVO DE CUENTAS</option>
                                    <option>ENCARGADO LOGISTICO</option>
                                    <option>SUPERVISOR</option>
                                    </select></td>
                                <td><select onChange= "actualizarTaza(0)" name="dayorhour0" id="dayorhour0" class="form-control">
                                    <option>DIAS</option>
                                    <option>HORAS</option>
                                    </select></td>
                                <td><input type="number" name="time0" id="time0" value="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                                <td><input type="number" name="nrop0" id="nrop0" value ="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                                <td><input type="text" name="tasa0" id="tasa0" value="" onkeyup="actualizarCostoTotal(0)" readonly class="form-control"></td>
                                <td><input type="text" name="costop0" id="costop0" value="0" readonly class="form-control"></td>

                                <td><button type="button" class="btn btn-success" onClick="addRow()">agregar</button></td>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-center">MANO DE OBRA DIRECTA</th>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr><th colspan="8"><h2>2) PERSONAL EXTERNO DIRECTO QUE INTERVIENE EN EL PROYECTO</h2></th></tr>
                            <tr>
                                <th colspan="2" scope="col">PERSONAL</th>
                                <th scope="col">CANTIDAD DE PERSONAS</th>
                                <th scope="col">CANTIDAD DE ACTIVACIONES</th>
                                <th scope="col">PAGO POR ACTIVACION</th>
                                <th scope="col">REGION/CIUDAD</th>
                                <th scope="col">TOTAL ACT. MAS CARGA IMPOSITIVA C/U</th>
                                <th scope="col">TOTAL ACT. MAS CARGA IMPOSITIVA GLOBAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2"><input type="text" name="textfield29" id="textfield29" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                                <td><input type="number" name="number12" id="number12" class="form-control"></td>
                                <td><input type="number" class="form-control"></td>
                                <td><select name="" id="" class="form-control">
                                    <option value="">LA PAZ</option>
                                    <option value="">ORURO</option>
                                    <option value="">POTOSI</option>
                                    <option value="">COCHABAMBA</option>
                                    <option value="">SUCRE</option>
                                    <option value="">TARIJA</option>
                                    <option value="">PANDO</option>
                                    <option value="">BENI</option>
                                    <option value="">SANTA CRUZ</option>
                                    </select></td>
                                <td><input type="text" class="form-control" readonly></td>
                                <td><input type="text" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-success">agregar</button></td>

                            </tr>
                            <tr>
                                <th colspan="2"><label>TOTAL</label></th>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                                <td></td>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                            </tr>
                        </tbody>
                        <!--Equipos, meteriales y servicios totales del proyecto-->
                        <!--tabla - materiales-->
                        <thead class="thead-light">
                            <tr>
                                <th colspan="8"><h2>3) EQUIPOS, MATERIALES Y SERVICIOS TOTALES DEL PROYECTO</h2></th>
                            </tr>
                            <tr>
                                <th colspan="4">MATERIALES</th>
                                <th colspan="4">COSTOS MATERIALES ESTIMADOS</th>
                            </tr>
                            <tr>
                                <th colspan="2">MATERIAL ADQUIRIDO/ENTREGADO POR ALMACEN</th>
                                <th>PROVEEDOR</th>
                                <th>UNIDAD DE MEDIDA</th>
                                <th>CANTIDAD ESTIMADA</th>
                                <th>COSTO UNITARIO</th>
                                <th>DOCUMENTO</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="2"><input type="text" class="form-control"></td>
                            <td><select name="" id="" class="form-control">
                                <option value="">---</option>
                            </select></td>
                            <td><select name="" id="" class="form-control">
                                <option value="">PIEZAS</option>
                                </select></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><select name="" id="" class="form-control">
                                <option value="">FACTURA</option>
                                <option value="">RECIBO</option>
                                <option value="">ALMACEN</option>
                                </select></td>
                            <td><input type="text" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-success">agregar</button></td>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                                <td></td>
                                <td><label for="">0</label></td>
                            </tr>
                        </tbody>
                         <!--tabla - servicios-->
                        <thead class="thead-light">
                            <tr>
                                <th colspan="4">SERVICIOS</th>
                                <th colspan="4">COSTOS ESTIMADO DE SERVICIOS</th>
                            </tr>
                            <tr>
                                <th colspan="2">SERVICIOS CONTRATADOS</th>
                                <th>PROVEEDOR</th>
                                <th>UNIDAD DE MEDIDA</th>
                                <th>CANTIDAD</th>
                                <th>COSTO UNITARIO</th>
                                <th>DOCUMENTO</th>
                                <th>TOTAL CLIENTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="2"><input type="text" class="form-control"></td>
                            <td><select name="" id="" class="form-control">
                                <option value="">---</option>
                            </select></td>
                            <td><select name="" id="" class="form-control">
                                <option value="">PIEZAS</option>
                                </select></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><select name="" id="" class="form-control">
                                <option value="">FACTURA</option>
                                <option value="">RECIBO</option>
                                <option value="">SIN IMPUESTO</option>
                                <option value="">ALQUILER SIN RECIBO</option>
                                </select></td>
                            <td><input type="text" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-success">agregar</button></td>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                                <td></td>
                                <td><label for="">0</label></td>
                            </tr>
                        </tbody>
                        <!--Servicio/productos propios de grupo regional-->
                        <!--tabla - producto propio de taller-->
                        <thead class="thead-light">
                           <tr>
                               <th colspan="8"><h2>SERVICIO / PRODUCTOS PROPIOS DE GRUPO REGIONAL</h2></th>
                           </tr>
                           <tr>
                               <th colspan="8"><h4>5) PRODUCTOS PROPIOS DE TALLER</h4></th>
                           </tr>
                            <tr>
                                <th colspan="3">PRODUCTOS TERMINADOS</th>
                                <th colspan="2">UNIDAD DE MEDIDA</th> <!--AQUI ME QUEDE-->
                                <th>CANTIDAD</th>
                                <th>COSTO UNITARIO</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="3"><input type="text" class="form-control"></td>
                            <td colspan="2"><select name="" id="" class="form-control">
                                <option value="">---</option>
                            </select></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="text" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-success">+</button></td>
                            <tr>
                                <th>TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                                <td><label for="">0</label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--formulario parte 2-->
                <div class="col-3">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>TOTAL CANTIDAD DEPERSONAS</th>
                                <th>TOTAL CANTIDAD DE ACTIVACIONES</th>
                                <th>TOTALES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
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
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
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
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
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
            <!--bloque de botones-->
            <div class="row">
                <input name="guardar" type="submit" value="Guardar" class="btn btn-success">
                <input name="salir" type="button" value="Salir" class="btn btn-success">
            </div>
        </form>
        <script src="jquery/jquery-3.3.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>

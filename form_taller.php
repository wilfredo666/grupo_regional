<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario taller</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="css/atl.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
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
                     <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Ubicacion:</div>
                            </div>
                            <select class="form-control" name="select2" id="select2">
                                <option>COCHABAMBA</option>
                                <option>SANTA CRUZ</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--tablas para la inserccion de datos a calcular-->
                <br>
                <table class="table table-sm" id="tablita1">
                   <!--Materiales y servicios que intervienen en la operacion-->
                   <!--tabala 1 - materiales-->
                    <thead class="thead-light">
                        <tr>
                            <th colspan="8"><h2>1) PERSONAL INTERNO QUE INTERVIENE EN LA OPERACION</h2></th>
                        </tr>
                        <tr>
                            <th colspan="2" scope="col" >DETALLE</th>
                            <th scope="col">TIEMPO</th>
                            <th scope="col">TIEMPO PROGRAMADO</th>
                            <th scope="col">CANTIDAD DE PERSONAS</th>
                            <th scope="col">TASA PRESUPUESTARIA</th>
                            <th colspan="2" scope="col">COSTO TOTAL PROGRAMADO DE M.O.D.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><select onChange="actualizarTaza(0)"  name="staf0" id="staf0" class="form-control">
                                <option>DISEÑADORA</option>
                                <option>AUXILIAR IMPRESION</option>
                                <option>ENCARGADO DE TALLER</option>
                                <option>PERSONAL DE TALLER</option>
                                </select></td>
                                <td><select onChange="actualizarTaza(0)"  name="staf0" id="staf0" class="form-control">
                                <option>HORAS</option>
                                <option>DIAS</option>
                                </select></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" class="form-control" readonly></td>
                            <td colspan="2"><input type="number" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-success" onClick="addRow()">+</button></td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-center">SOPORTE LOGISTICO</th>
                            <td><label for="">0</label></td>
                            <td><label for="">0</label></td>
                            <td><label for="">0</label></td>
                            <td colspan="2"><label for="">0</label></td>
                        </tr>
                    </tbody>
                    <thead class="thead-light">
                        <tr><th colspan="8"><h2>2) MATERIALES Y SERVICIOS INTERNOS QUE INTERVIENEN EN LA OPERACION</h2></th></tr>
                        <tr>
                            <th scope="col" colspan="3"><label>MATERIALES</label></th>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><input type="text" name="textfield5" id="textfield5" class="form-control"></td>
                            <td><input type="text" name="textfield6" id="textfield6" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><select name="select6" id="select6" class="form-control">
                                <option>FACTURA</option>
                                <option>RECIBO</option>
                                <option>ALMACEN</option>
                                </select></td>
                            <td><input type="text" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-success">+</button></td>
                        </tr>
                        <tr>
                            <th colspan="7" class="<text-center></text-center>">TOTAL</th>
                            <td><label for="">0</label></td>
                        </tr>
                    </tbody>
                    <!--tabla 2 - servicios-->
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2"><label>SERVICIOS</label></th>
                            <th colspan="6"><label>COSTOS</label></th>
                        </tr>
                        <tr>
                            <th colspan="2" scope="col">SERVICIOS CONTRATADOS</th>
                            <th colspan="2" scope="col">NOMBRE DEL PROVEEDOR</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">COSTO DE SERVICIO</th>
                            <th scope="col">DOCUMENTO</th>
                            <th scope="col">COSTO TOTAL ESTIMADO DEL SERVICIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><input type="text" class="form-control"></td>
                            <td colspan="2"><input type="text" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><select name="" id="" class="form-control">
                                <option value="">FACTURA</option>
                                <option value="">RECIBO</option>
                                <option value="">VALORADO</option>
                                <option value="">ALQUILER CON RECIBO</option>
                                </select></td>
                            <td><input type="number" class="form-control" readonly></td>
                            <td><button type="button" class="btn btn-success">+</button></td>
                        </tr>
                        <tr>
                            <th colspan="7" class="text-center"><label>TOTAL</label></th>
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
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                        <tr>
                            <th>Costo total para enviar al cliente</th>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
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
    </body>
</html>

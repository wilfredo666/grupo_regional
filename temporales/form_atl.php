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
        <h1>HOJA DE COSTO DE OPERACIONES COCHABAMBA - GRUPO REGIONAL S.R.L.</h1>
        <!--tabla - costo de valor agregado-->
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th colspan="3" scope="col">COSTO DE VALOR AGREGADO</th>
                </tr>
            </thead>
            <tbody>
                <tr class="thead-light">
                    <th scope="row">COSTO PROGRAMADO DEL PROYECTO</th>
                    <th>COSTO ESTIMADO DEL PROYECTO</th>
                    <th>DIFERENCIA</th>

                </tr>
                <tr>
                    <td><input type="text" name="textfield14" id="textfield14"></td>
                    <td><input type="text" name="textfield15" id="textfield15"></td>
                    <td><input type="text" name="textfield16" id="textfield16"></td>
                </tr>
            </tbody>
        </table>
        <form id="form1" name="form1" method="post">
            <!--ingreso de datos iniciales-->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><label for="select3" >Cliente:</label></th>
                        <th scope="col"><select name="select3" id="select3">
                            <?php
                            include 'conexion.php';
                            $cliente=mysqli_query($con,"select nombre from cliente");
                            while($fila=mysqli_fetch_array($cliente)){
                            ?>
                            <option value=""><?php echo $fila['nombre'];?></option>
                            <?php
                            }
                            ?>
                            </select></th>
                        <td scope="col"><label for="select">Codigo de proyecto:</label></td>
                        <th scope="col"><input type="text"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><label for="textfield">Correo electronico (cliente):</label></th>
                        <td><input type="text" name="textfield" id="textfield"></td>
                        <td><label for="textfield2">Nombre del proyecto:</label></td>
                        <td><input type="text" name="textfield2" id="textfield2"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="date">Fecha de inicio del proyecto:</label></th>
                        <td><input type="date" name="date" id="date"></td>
                        <td><label for="date2">Fecha de conclucion del proyecto:</label></td>
                        <td><input type="date" name="date2" id="date2"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="number">Tiempo de credito (en dias):</label></th>
                        <td><input type="number" name="number" id="number"></td>
                        <td><label for="select2">Tipo de proyecto:</label></td>
                        <td><select name="select2" id="select2">
                            <option>EXTERNO</option>
                            <option>INTERNO</option>
                            </select></td>
                    </tr>
                </tbody>
            </table>
            <!--tablas para la insercion de datos a calcular-->
            <h2>1) PERSONAL DIRECTO QUE INTERVIENE EN LA OPERACION</h2>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"><label>DETALLE</label></th>
                        <th scope="col"><label>NOMBRE DEL PERSONAL</label></th>
                        <th scope="col"><label>TIEMPO</label></th>
                        <th scope="col"><label>TIEMPO PROGRAMADO</label></th>
                        <th scope="col"><label>CANTIDAD DE PERSONAS</label></th>
                        <th scope="col"><label>TASA PRESUPUESTARIA</label></th>
                        <th scope="col"><label>COSTO TOTAL PROGRAMADO DE M.O.D.</label></th>
                        <th scope="col"><label>PRECIO COTIZADO SIN F.E.E</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><select name="select4" id="select4">
                            <option>EJECUTIVO DE CUENTAS</option>
                            <option>ENCARGADO LOGISTICO</option>
                            <option>SUPERVISOR</option>
                            </select></td>
                        <td><input type="text"></td>
                        <td><select name="select5" id="select5">
                            <option>DIAS</option>
                            <option>HORAS</option>
                            </select></td>
                        <td><input type="text" name="textfield3" id="textfield3"></td>
                        <td><input type="number" name="number2" id="number2"></td>
                        <td><input type="text" name="textfield4" id="textfield4"></td>
                        <td><input type="text" name="textfield5" id="textfield4"></td>
                        <td><input type="number" name="number3" id="number3"></td>
                        <td><button type="button" class="btn btn-success">agregar</button></td>
                    </tr>
                    <tr>
                        <td colspan="3">SOPORTE LOGISTICO</td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                    </tr>
                </tbody>

                <thead class="thead-light">
                    <tr><td colspan="8"><h2>2) MATERIALES Y SERVICIOS QUE INTERVIENEN EN LA OPERACION</h2></td></tr>
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
                        <td><input type="text" name="textfield5" id="textfield5"></td>
                        <td><input type="text" name="textfield6" id="textfield6"></td>
                        <td><input type="number" name="number4" id="number4"></td>
                        <td><input type="number" name="number5" id="number5"></td>
                        <td><select name="select6" id="select6">
                            <option>FACTURA</option>
                            </select></td>
                        <td><input type="text"></td>
                        <td><input type="number" name="number6" id="number6"></td>
                        <td></td>
                        <td><button type="button" class="btn btn-success">agregar</button></td>
                    </tr>
                    <tr>
                        <td colspan="5"><label>TOTAL</label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td></td>
                    </tr>
                </tbody>
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
                        <th scope="col"><label>TOTTAL COSTO PROGRAMADO</label></th>
                        <th scope="col"><label>PRECIO COTIZADO SIN F.E.E.</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="textfield9" id="textfield9"></td>
                        <td><input type="text" name="textfield10" id="textfield10"></td>
                        <td><input type="number" name="number7" id="number7"></td>
                        <td><input type="number" name="number8" id="number8"></td>
                        <td><input type="number" name="number9" id="number9"></td>
                        <td><input type="text" name="textfield11" id="textfield11"></td>
                        <td><input type="number" name="number10" id="number10"></td>
                        <td><input type="text" name="textfield28" id="textfield28"></td>
                        <td><button type="button" class="btn btn-success">agregar</button></td>
                    </tr>
                    <tr>
                        <td colspan="6"><label>TOTAL</label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                    </tr>
                </tbody>
                <!--SERVICIOS/PRODUCTOS PROPIOS DE GRUPO REGIONAL-->
                <!--productos de taller-->
                <thead class="thead-light">
                    <tr><td colspan="8"><h2>SERVICIOS / PRODUCTOS PROPIOS DE GRUPO REGIONAL</h2></td></tr>
                    <tr><td colspan="8"><h4>PRODUCTOS PROPIOS DE TALLER</h4></td></tr>
                    <tr>
                        <th scope="col"><label>PRODUCTOS TERMINADOS DE TALLER</label></th>
                        <th scope="col"><label>AREA DE PRODUCCION</label></th>
                        <th scope="col"><label>CANTIDAD</label></th>
                        <th scope="col"><label>COSTO UNITARIO</label></th>
                        <th scope="col"><label>COSTO TOTAL</label></th>
                        <th scope="col"><label>PRECIO COTIZADO SIN F.E.E</label></th>
                        <th cope="col"></th>
                        <th cope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="textfield29" id="textfield29"></td>
                        <td><input type="text" name="textfield23" id="textfield23"></td>
                        <td><input type="number"></td>
                        <td><input type="number" name="number12" id="number12"></td>
                        <td><input type="text" name="textfield24" id="textfield24"></td>
                        <td><input type="number" name="number13" id="number13"></td>
                        <td></td>
                        <td></td>
                        <td><button type="button" class="btn btn-success">agregar</button></td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>TOTAL</label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <!--equipos propios -->
                <thead class="thead-light">
                    <tr><td colspan="8"><h4>EQUIPOS PROPIOS</h4></td></tr>
                    <tr>
                        <th scope="col"><label>DETALLE DEL SERVICIO</label></th>
                        <th scope="col"><label>AREA DE SERVICIO</label></th>
                        <th scope="col"><label>CANTIDAD</label></th>
                        <th scope="col"><label>COSTO UNITARIO</label></th>
                        <th scope="col"><label>COSTO TOTAL</label></th>
                        <th scope="col"><label>PRECIO COTIZADO SIN F.E.E</label></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>             
                    <tr>
                        <td><input type="text" name="textfield29" id="textfield29"></td>
                        <td><input type="text" name="textfield30" id="textfield30"></td>
                        <td><input type="number" name="number14" id="number14"></td>
                        <td><input type="number" name="number15" id="number15"></td>
                        <td><input type="text" name="textfield31" id="textfield31"></td>
                        <td><input type="number" name="number16" id="number16"></td>
                        <td></td>
                        <th></th>
                        <td scope="col"><button type="button" class="btn btn-success">agregar</button></td>
                    </tr>
                    <tr>
                        <td colspan="3"><label>TOTAL</label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td></td>
                        <th></th>
                    </tr>
                </tbody>
            </table>
            <!--costos indirectos del proyecto -->
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>F.E.E. PROGRAMADO</th>
                        <th>F.E.E. VARIABLE</th>
                    </tr>
                    <tr>
                        <td><label for="">-</label></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td colspan="6"><h2>COSTOS INDIRECTOS DEL PROYECTO</h2></td>
                    </tr>
                    <tr>
                        <th colspan="3">COSTOS INDIRECTOS DE OPERACIONES</th>
                        <th colspan="3">COSTO FINANCIERO</th>
                    </tr>
                    <tr>
                        <th>COSTO ACUMULADO PROGRAMADO</th>
                        <th>TASA DE APLICACIÓN</th>
                        <th>COSTO PROGRAMADO DE COSTOS INDIRECTOS</th>
                        <th>TIEMPO PROGRAMADO</th>
                        <th>TASA FINANCIERA</th>
                        <th>COSTO TOTAL PROGRAMADO FINANCIERO</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                    </tr>
                </tbody>
            </table>
            <table class="table">
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
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                    </tr>
                    <tr>
                        <th scope="row">F.E.E.</th>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                    </tr>
                    <tr>
                        <th scope="row">COSTO TOTAL DEL PROYECTO MAS F.E.E.</th>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                    </tr>
                    <tr>
                        <th scope="row">COSTO TOTAL DEL PROYECTO MAS IMPUESTO</th>
                        <td><label for=""></label></td>
                        <td><label for=""></label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Costo total para enviar al cliente</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <!--bloque de botones-->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <input name="guardar" type="submit" value="Guardar" class="btn btn-success">
                        <input name="salir" type="button" value="Salir" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
        <script src="jquery/jquery-3.3.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>

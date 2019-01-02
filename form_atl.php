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
            <h1>HOJA DE COSTO DE OPERACIONES COCHABAMBA</h1>
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
                    <thead class="thead-light">
                        <tr>
                            <th colspan="8"><h2>1) PERSONAL DIRECTO QUE INTERVIENE EN LA OPERACION</h2></th>
                        </tr>
                        <tr>
                            <th scope="col" >DETALLE</th>
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
                            <td><select onChange="actualizarTaza(0)"  name="staf0" id="staf0" class="form-control">
                                <option>EJECUTIVO DE CUENTAS</option>
                                <option>ENCARGADO LOGISTICO</option>
                                <option>SUPERVISOR</option>
                                </select></td>
                            <td><input type="text" id="detalle0" class="form-control"></td>
                            <td><select onChange= "actualizarTaza(0)" name="dayorhour0" id="dayorhour0" class="form-control">
                                <option>DIAS</option>
                                <option>HORAS</option>
                                </select></td>
                            <td><input type="number" name="time0" id="time0" value="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                            <td><input type="number" name="nrop0" id="nrop0" value ="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                            <td><input type="text" name="tasa0" id="tasa0" value="" onkeyup="actualizarCostoTotal(0)" readonly class="form-control"></td>
                            <td><input type="text" name="costop0" id="costop0" value="0" readonly class="form-control"></td>
                            <td><input type="text" name="precioC0" id="precioC0" value="0" onkeyup="actualizarCostoTotal(0)" onClick="this.select();" class="form-control"></td>
                            <td><button type="button" class="btn btn-success" onClick="addRow()">agregar</button></td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-center">SOPORTE LOGISTICO</th>
                            <td><input  type="text"  id="totalTi" readonly class="form-control"></td>
                            <td><input type="text"  id="totalCa" class="form-control" readonly></td>
                            <td><input type="text" id="totalTa" class="form-control" readonly></td>
                            <td><input type="text" id="totalCo" class="form-control" readonly></td>
                            <td ><input type="text" id="totalPr" class="form-control" readonly></td>
                        </tr>
                    </tbody>
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
                            <td><input type="text" name="textfield5" id="textfield5" class="form-control"></td>
                            <td><input type="text" name="textfield6" id="textfield6" class="form-control"></td>
                            <td><input type="number" name="number4" id="number4" class="form-control"></td>
                            <td><input type="number" name="number5" id="number5" class="form-control"></td>
                            <td><select name="select6" id="select6" class="form-control">
                                <option>FACTURA</option>
                                </select></td>
                            <td><input type="text" class="form-control" readonly></td>
                            <td><input type="number" name="number6" id="number6" class="form-control"></td>
                            <td></td>
                            <td><button type="button" class="btn btn-success">agregar</button></td>
                        </tr>
                        <tr>
                            <th colspan="5" class="<text-center></text-center>">TOTAL</th>
                            <td><label for="">0</label></td>
                            <td><label for="">0</label></td>
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
                            <td><input type="text" name="textfield9" id="textfield9" class="form-control"></td>
                            <td><input type="text" name="textfield10" id="textfield10" class="form-control"></td>
                            <td><input type="number" name="number7" id="number7" class="form-control"></td>
                            <td><input type="number" name="number8" id="number8" class="form-control"></td>
                            <td><input type="number" name="number9" id="number9" class="form-control"></td>
                            <td><select name="" id="" class="form-control">
                                <option value="">FACTURA</option>
                                <option value="">RECIBO</option>
                                <option value="">SIN IMPUESTO</option>
                                <option value="">ALQUILER SIN RECIBO</option>
                                </select></td>
                            <td><input type="text" name="number10" id="number10" class="form-control" readonly></td>
                            <td><input type="text" name="textfield28" id="textfield28" class="form-control"></td>
                            <td><button type="button" class="btn btn-success">agregar</button></td>
                        </tr>
                        <tr>
                            <th colspan="6" class="text-center"><label>TOTAL</label></th>
                            <td><label for="">0</label></td>
                            <td><label for="">0</label></td>
                        </tr>
                    </tbody>
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
                            <td><input type="text" name="textfield29" id="textfield29" class="form-control"></td>
                            <td><input type="text" name="textfield23" id="textfield23" class="form-control"></td>
                            <td><input type="number" class="form-control"></td>
                            <td><input type="number" name="number12" id="number12" class="form-control"></td>
                            <td><input type="text" name="textfield24" id="textfield24" class="form-control"></td>
                            <td><input type="number" name="number13" id="number13" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td><button type="button" class="btn btn-success">agregar</button></td>
                        </tr>
                        <tr>
                            <td colspan="3"><label>TOTAL</label></td>
                            <td><label for="">0</label></td>
                            <td><label for="">0</label></td>
                            <td><label for="">0</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <!--equipos propios -->
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
                            <td><input type="text" name="textfield29" id="textfield29" class="form-control"></td>
                            <td><input type="text" name="textfield30" id="textfield30" class="form-control"></td>
                            <td><input type="number" name="number14" id="number14" class="form-control"></td>
                            <td><input type="number" name="number15" id="number15" class="form-control"></td>
                            <td><input type="text" name="textfield31" id="textfield31" class="form-control"></td>
                            <td><input type="number" name="number16" id="number16" class="form-control"></td>
                            <td></td>
                            <td></td>
                            <td scope="col"><button type="button" class="btn btn-success">agregar</button></td>
                        </tr>
                        <tr>
                            <th colspan="3">TOTAL</th>
                            <td><label for="">0</label></td>
                            <td><label for="">0</label></td>
                            <td><label for="">0</label></td>
                            <td></td>
                            <th></th>
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
        <script type="text/javascript">

            //Ejecutivo de cuenta -> Hora: 30     Dia:240
            //Encargado logistico -> Hora: 26     Dia: 208
            var tasaEjecutivo = 30; //valor en horas
            var tasaEncargado = 26; //valor en horas
            var tasaPresupuestada = 0;
            var c=0;
            var vTasa = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            var vCosto = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            var vPre = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

            actualizarTaza(0);
            function actualizarTaza(numero){
                var staff = document.getElementById("staf"+numero).value;
                var dayHour = document.getElementById("dayorhour"+numero).value;

                if (staff=="EJECUTIVO DE CUENTAS") {
                    if (dayHour=="DIAS")
                        tasaPresupuestada=tasaEjecutivo*8; 
                    if (dayHour=="HORAS")
                        tasaPresupuestada=tasaEjecutivo; 
                    vTasa[numero]=tasaPresupuestada.toFixed(2);
                    document.getElementById("tasa"+numero).value =tasaPresupuestada.toFixed(2); 
                }
                if (staff=="ENCARGADO LOGISTICO") {
                    if (dayHour=="DIAS")
                        tasaPresupuestada=tasaEncargado*8;
                    if (dayHour=="HORAS")
                        tasaPresupuestada=tasaEncargado;
                    document.getElementById("tasa"+numero).value =tasaPresupuestada.toFixed(2);
                }
                actualizarCostoTotal(numero);
            }
            function actualizarCostoTotal(numer){
                var t = parseFloat(document.getElementById("time"+numer).value);
                var nro = parseFloat(document.getElementById("nrop"+numer).value);
                var tas = parseFloat(document.getElementById("tasa"+numer).value);
                var pr =parseFloat(document.getElementById("precioC"+numer).value);
                vPre[numer]=pr.toFixed(2);
                var r=t*nro*tas;
                vCosto[numer]=r.toFixed(2);
                r=activacoma(r.toFixed(2));
                document.getElementById("costop"+numer).value =r;
                soporteLog();
            }

            function addRow(){
                c=c+1;
                var fila = '<tr>'+
                    '<td>'+
                    '<select onChange="actualizarTaza('+c+')"  name="staf'+c+'" id="staf'+c+'" >'+
                    '<option>EJECUTIVO DE CUENTAS</option>'+
                    '<option>ENCARGADO LOGISTICO</option>'+
                    '<option>SUPERVISOR</option>'+
                    '</select>'+
                    '</td>'+
                    '<td><input type="text" id="detalle'+c+'" ></td>'+
                    '<td><select onChange= "actualizarTaza('+c+')" name="dayorhour'+c+'" id="dayorhour'+c+'" >'+
                    '<option>DIAS</option>'+
                    '<option>HORAS</option>'+
                    '</select></td>'+
                    '<td><input type="number" name="time'+c+'" id="time'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();"></td>'+
                    '<td><input type="number" name="nrop'+c+'" id="nrop'+c+'" value ="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();"></td>'+
                    '<td><input type="text" name="tasa'+c+'" id="tasa'+c+'" value="" onkeyup="actualizarCostoTotal('+c+')" readonly></td>'+
                    '<td><input type="text" name="costop'+c+'" id="costop'+c+'" value="0" readonly></td>'+
                    '<td><input type="text" name="precioC'+c+'" id="precioC'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();"></td>'+
                    '</tr>'

                $('#tablita1').append(fila);
                actualizarTaza(c);
            }

            function soporteLog(){
                var acTime=0;
                var acCant=0;
                var acTasa=0;
                var acCosto=0;
                var acPrecio=0;
                var i=0;
                for(i=0;i<=c;i++){
                    acTime+= parseInt(document.getElementById("time"+i).value);
                    acCant+=parseInt(document.getElementById("nrop"+i).value);

                    acTasa+= parseFloat(vTasa[i]);
                    acCosto+=parseFloat(vCosto[i]);
                    acPrecio+=parseFloat(vPre[i]);
                }
                document.getElementById("totalTi").value = acTime;
                document.getElementById("totalCa").value = acCant;

                acTasa=activacoma(acTasa.toFixed(2));
                acCosto=activacoma(acCosto.toFixed(2));
                acPrecio=activacoma(acPrecio.toFixed(2));
                document.getElementById("totalTa").value = acTasa;
                document.getElementById("totalCo").value = acCosto;
                document.getElementById("totalPr").value = acPrecio;


            }

            function activacoma(nStr){
                nStr += '';
                var x = nStr.split('.');
                var x1 = x[0];
                var x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }

        </script>
        <script src="jquery/jquery-3.3.1.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </body>
</html>

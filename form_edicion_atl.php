<?php
include 'conexion.php';
include 'modal_generar_codigo_atl.php';
$usuario=$_GET['id'];
$id_hoja_costos=$_GET['id_hoja_costos'];
/*consulta datos hoja de costos*/
$consulta_atl="select  nombre, codigo_hoja_costos, correo_cliente, nombre_proyecto, fecha_inicio, fecha_fin, tiempo_credito, tipo_proyecto from hoja_costos_atl JOIN cliente ON  hoja_costos_atl.cliente=cliente.codigo where id_hoja_costos=$id_hoja_costos";
$atl=mysqli_fetch_row(mysqli_query($con, $consulta_atl));
/*consulta */
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario ATL</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script type="text/javascript" src="js/form_edicion_atl.js"></script>
        <link href="css/atl.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>

    <body>
        <div class="container-fluid bg-success">
            <h1>EVENTOS</h1>
        </div>
        <form action="actualizar_form_atl.php?id=<?php echo $usuario;?>&id_hoja_costos=<?php echo $id_hoja_costos;?>" id="form1" name="form1" method="post">
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
                                        <option value=""><?php echo $atl[0];?></option>
                                        <?php mostrar_cliente();?>                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Codigo de proyecto:</div>
                                    </div>
                                    <input name="cod_proyecto" type="text" class="form-control" id="form_codigo" value="<?php echo $atl[1];?>">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generar_codigo_proyecto_atl" onclick="">Generar</button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Correo electronico (cliente):</div>
                                    </div>
                                    <input type="text" class="form-control" name="email_cliente" id="textfield" value="<?php echo $atl[2];?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Nombre del proyecto:</div>
                                    </div>
                                    <input type="text" class="form-control" name="nom_proyecto" id="textfield2" value="<?php echo $atl[3];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Fecha de inicio del proyecto:</div>
                                    </div>
                                    <input type="date" class="form-control" name="fecha_inicio" id="date" value="<?php echo $atl[4];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Fecha de conclucion del proyecto:</div>
                                    </div>
                                    <input type="date" class="form-control" name="fecha_fin" id="date2" value="<?php echo $atl[5];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Tiempo de credito (en dias):</div>
                                    </div>
                                    <input type="number" class="form-control" name="tiempo_credito" id="number" onclick="this.select()" onkeyup="costosExternos()" value="<?php echo $atl[6];?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Tipo de proyecto:</div>
                                    </div>
                                    <select class="form-control" name="exoin" id="exoin" onchange="costosExternos()">
                                        <option><?php echo $atl[7];?></option>
                                        <option>EXTERNO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Fecha de facturacion:</div>
                                    </div>
                                    <input type="date" class="form-control" name="fecha_facturacion" id="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Numero de factura:</div>
                                    </div>
                                    <input type="text" class="form-control" name="num_factura" id="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--tablas para la insercion de datos a calcular-->
                        <div class="row">

                            <table class="table table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="9"><h2>1) PERSONAL QUE INTERVIENE EN LA OPERACION</h2></th>
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
                                        <th><button type="button" class="btn btn-success" onClick="addRow()">+</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                    $sql="select * from personal_directo_atl where id_hoja_costos_atl=$id_hoja_costos";
                                    $personal_directo=mysqli_query($con,$sql);
                                    while($row=mysqli_fetch_array($personal_directo)){

                                    ?>
                                    <tr id="fila1<?php echo $i;?>">
                                        <td><select name="staf[]" onChange= "actualizarTaza(<?php echo $i;?>)" id="staf<?php echo $i;?>" class="form-control">
                                            <option><?php echo $row[2];?></option>
                                            <option>SUPERVISOR</option>
                                            <option>SOPORTE LOGISTICO</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="detalle[]" id="detalle'.$i.'" class="form-control" value="<?php echo $row[3];?>"></td>
                                        <td><select onChange= "actualizarTaza(<?php echo $i;?>)" name="dayorhour[]" id="dayorhour<?php echo $i;?>" class="form-control" >
                                            <option><?php echo $row[4];?></option>
                                            <option>DIAS</option>
                                            <option>HORAS</option>
                                            </select>
                                        </td>
                                        <td><input type="number" name="time[]" id="time<?php echo $i;?>" onkeyup="actualizarCostoTotal(<?php echo $i;?>)" onClick="this.select();" class="form-control" value="<?php echo $row[5];?>"></td>
                                        <td><input type="number" name="nrop[]" id="nrop<?php echo $i;?>" onkeyup="actualizarCostoTotal(<?php echo $i;?>)" onClick="this.select();" class="form-control" value="<?php echo $row[6];?>"></td>
                                        <td><input type="text" name="tasa[]" id="tasa<?php echo $i;?>" onkeyup="actualizarCostoTotal(<?php echo $i;?>)" readonly class="form-control" value="<?php echo $row[7];?>"></td>
                                        <td><input type="text" name="costop[]" id="costop<?php echo $i;?>" readonly class="form-control" value="<?php echo $row[8];?>"></td>
                                        <td><input type="text" name="precioC[]" id="precioC<?php echo $i;?>" onkeyup="actualizarCostoTotal(<?php echo $i;?>)" onClick="this.select();" class="form-control" step="0.01" value="<?php echo $row[9];?>"></td>
                                        <td><button type="button" class="btn btn-danger" id='<?php echo $i;?>' onClick="t1_deleted(<?php echo $i;?>)">-</button></td>
                                    </tr>
                                    <?php
                                        $i=$i+1;
                                    }
                                    ?>
                                    <tr id="tablita1">
                                        <th colspan="2" >TOTAL</th>
                                        <td></td>
                                        <td id="totalTi">0</td>
                                        <td id="totalCa">0</td>
                                        <td id="totalTa">0</td>
                                        <td id="totalCo">0</td>
                                        <td id="totalPr">0</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!--MATERIALES / SERVICIOS QUE INTERVIENEN EN LA OPERACION-->

                            <table class="table table-sm">
                                <thead class="thead-light">
                                    <tr><th colspan="9"><h2>2) MATERIALES / SERVICIOS QUE INTERVIENEN EN LA OPERACION</h2></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">DETALLES</th>
                                        <th scope="col">NOMBRE DEL PROVEEDOR</th>
                                        <th scope="col">DIAS</label></th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">COSTO UNITARIO</th>
                                <th scope="col">DOCUMENTO</th>
                                <th scope="col">COSTO TOTAL</th>
                                <th scope="col">PRECIO COTIZADO SIN F.E.E.</th>
                                <th><button type="button" class="btn btn-success" onclick="addRow_t3();">+</button></th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            $i3=0;
                            $sql3="select * from servicios_contratados_atl where id_hoja_costos_atl=$id_hoja_costos";
                            $servicios=mysqli_query($con,$sql3);
                            while($row3=mysqli_fetch_array($servicios)){

                            ?>
                            <tr id="fila3<?php echo $i3;?>">
                                <td><input type="text" name="t3_ser[]" id="t3_ser<?php echo $i3;?>" class="form-control" value="<?php echo $row3[2];?>"></td>
                                <td><input type="text" name="t3_nom[]" id="t3_nom<?php echo $i3;?>" class="form-control" value="<?php echo $row3[3];?>"></td>
                                <td><input type="number" name="t3_dia[]" id="t3_dia<?php echo $i3;?>" value="<?php echo $row3[4];?>" onClick="this.select()" onkeyup="t3_subTotal(<?php echo $i3;?>)" class="form-control"></td>
                                <td><input type="number" name="t3_can[]" id="t3_can<?php echo $i3;?>" value="<?php echo $row3[5];?>" onClick="this.select()" onkeyup="t3_subTotal(0<?php echo $i3;?>)" class="form-control" ></td>
                                <td><input type="number" name="t3_cos[]" id="t3_cos<?php echo $i3;?>" value="<?php echo $row3[6];?>" onClick="this.select()" onkeyup="t3_subTotal(<?php echo $i3;?>)" class="form-control" step="0.01"></td>
                                <td><select name="t3_tip[]" id="t3_tip<?php echo $i3;?>" onChange="t3_subTotal(<?php echo $i3;?>)"  class="form-control">
                                    <option><?php echo $row3[7];?></option>
                                    <option>FACTURA</option>
                                    <option>RECIBO</option>
                                    <option>SIN IMPUESTO</option>
                                    <option>ALQUILER SIN RECIBO</option>
                                    </select></td>
                                <td><input type="text" name="t3_tot[]" id="t3_tot<?php echo $i3;?>" value="<?php echo $row3[8];?>" class="form-control" readonly></td>
                                <td><input type="number" name="t3_pre[]" value="<?php echo $row3[9];?>" id="t3_pre<?php echo $i3;?>" onClick="this.select()" onkeyup="t3_subTotal(<?php echo $i3;?>)" class="form-control" step="0.01"></td>
                                <td><button type="button" class="btn btn-danger" id='<?php echo $i3;?>' onClick="t3_deleted(<?php echo $i3;?>)">-</button></td>
                            </tr>
                            <?php
                                $i3=$i3+1;
                            }
                            ?>
                            <tr id="tablita3">
                                <th colspan="2">TOTAL</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="t3_costoT">0</td>
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
                            <?php
                            $i4=0;
                            $sql4="select * from producto_propio_taller_atl where id_hoja_costos_atl=$id_hoja_costos";
                            $producto=mysqli_query($con,$sql4);
                            while($row4=mysqli_fetch_array($producto)){

                            ?>
                            <tr id="fila4<?php echo $i4;?>">
                                <td><input type="text" name="t4_pro[]" id="t4_pro<?php echo $i4;?>" class="form-control" value="<?php echo $row4[2];?>"></td>
                                <td><input type="number" value="<?php echo $row4[3];?>" onClick="this.select()" onkeyup="t4_subTotal(<?php echo $i4;?>)" class="form-control" name="t4_can[]" id="t4_can<?php echo $i4;?>"></td>
                                <td><input type="number" value="<?php echo $row4[4];?>" onClick="this.select()" onkeyup="t4_subTotal(<?php echo $i4;?>)" name="t4_cos[<?php echo $i4;?>]" id="t4_cos<?php echo $i4;?>" class="form-control" step="0.01"></td>
                                <td><input type="text" name="t4_coT[]" id="t4_coT<?php echo $i4;?>" value="<?php echo $row4[5];?>" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-danger" id='<?php echo $i4;?>' onClick="t4_deleted(this.id)">-</button></td>
                            </tr>
                            <?php
                                $i4=$i4+1;
                            }
                            ?>
                            <tr id="tablita4">
                                <th>TOTAL</th>
                                <th></th>
                                <td id="t4_costoU">0</td>
                                <td id="t4_costoT">0</td>    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-------------------------formulario parte 2--------------------------------->

            <div class="col-3" style='display:scroll;position:fixed;right:0px;'>
               <?php
                            $sql5="select * from costos_totales_atl where id_hoja_costos_atl=$id_hoja_costos";
                            $costos=mysqli_fetch_array(mysqli_query($con,$sql5));
                ?>
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
                            <td class="text-center"><input type="number" value="<?php echo $costos[2];?>" class="form-control" id="costoAp" name="costoAp" step="0.01" readonly></td>
                            <td class="text-center"><input type="number" value="<?php echo $costos[3];?>" class="form-control" id="tasaDa" name="tasaDa" step="0.01" readonly></td>
                            <td class="text-center"><input type="number" value="<?php echo $costos[4];?>" class="form-control" id="costoPd" name="costoPd" step="0.01" readonly></td>
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
                            <td class="text-center"><input type="number" value="<?php echo $costos[5];?>" class="form-control" id="tiempoPr" name="tiempoPr" step="0.01" readonly></td>
                            <td class="text-center" readonly><input type="number" value="<?php echo $costos[6];?>" class="form-control" name="tasaFi" id="tasaFi" step="0.01" readonly></td>
                            <td class="text-center"><input type="number" value="<?php echo $costos[7];?>" class="form-control" id="costoTo" name="costoTo" step="0.01" readonly></td>
                        </tr>
                    </tbody>
                    <thead class="thead-light">
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">TOTAL COTIZACION SIN FEE</th>
                            <td></td>
                            <td><input type="number" value="<?php echo $costos[8];?>" class="form-control" id="totalE1" name="totalE1" step="0.01" readonly></td>
                        </tr>
                        <tr>
                            <th>F.E.E.(%)</th>
                            <th><input type="number" class="form-control" id="feeV" name="feeV" value="<?php echo $costos[9];?>" onkeyup="costosExternos()" step="0.01"></th>
                            <td><input type="number" value="<?php echo $costos[10];?>" class="form-control" id="totalF2" name="totalF2" step="0.01" readonly></td>
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
                            <td class="text-center"><input type="number" value="<?php echo $costos[11];?>" class="form-control" id="costoED" name="costoED" step="0.01" readonly></td>
                            <td class="text-center"><input type="number" value="<?php echo $costos[12];?>" class="form-control" id="diferencia" name="diferencia" step="0.01" readonly></td>
                            <td><input type="number" value="<?php echo $costos[13];?>" class="form-control" id="costoVA" name="costoVA" step="0.01" readonly></td>
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
                <input name="button" type="button" class="btn btn-info" onclick="window.close();" value="Salir"/>
            </div>
            <div class="col-sm-2"></div>
        </div>           
        </div>
    </form>
<script src="js/jquery-3.3.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</body>
</html>

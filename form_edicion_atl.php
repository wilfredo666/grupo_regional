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
        <script type="text/javascript" src="js/form_atl.js"></script>
        <link href="css/atl.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>

    <body>
        <div class="container-fluid bg-success">
            <h1>HOJA DE COSTO DE OPERACIONES - ATL</h1>
        </div>
        <form action="guardar_form_atl.php?id=<?php echo $usuario;?>" id="form1" name="form1" method="post">
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
                                        <option>INTERNO</option>
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
                                        <th colspan="10"><h2>1) PERSONAL DIRECTO QUE INTERVIENE EN LA OPERACION</h2></th>
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
                                    <?php
                                    $i=0;
                                    $sql="select * from personal_directo_atl where id_hoja_costos_atl=$id_hoja_costos";
                                    $personal_directo=mysqli_query($con,$sql);
                                    while($row=mysqli_fetch_array($personal_directo)){
                                        $i=$i+1;
                                    ?>
                                        <tr>
                                        <td><select name="staf[<?php echo $i;?>]" onChange= "actualizarTaza(<?php echo $i;?>)" id="staf<?php echo $i;?>" class="form-control">
                                            <option><?php echo $row[2];?></option>
                                            <option>EJECUTIVO DE CUENTAS</option>
                                            <option>ENCARGADO LOGISTICO</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="detalle[<?php echo $i;?>]" id="detalle'.$i.'" class="form-control" value="<?php echo $row[3];?>"></td>
                                        <td><select onChange= "actualizarTaza(<?php echo $i;?>)" name="dayorhour[<?php echo $i;?>]" id="dayorhour<?php echo $i;?>" class="form-control">
                                            <option><?php echo $row[4];?></option>
                                            <option>DIAS</option>
                                            <option>HORAS</option>
                                            </select>
                                        </td>
                                        <td><input type="number" name="time[<?php echo $i;?>]" id="time<?php echo $i;?>" onkeyup="actualizarCostoTotal(<?php echo $i;?>)" onClick="this.select();" class="form-control" value="<?php echo $row[5];?>"></td>
                                        <td><input type="number" name="nrop[<?php echo $i;?>]" id="nrop<?php echo $i;?>" onkeyup="actualizarCostoTotal(<?php echo $i;?>)" onClick="this.select();" class="form-control" value="<?php echo $row[6];?>"></td>
                                        <td><input type="text" name="tasa[<?php echo $i;?>]" id="tasa<?php echo $i;?>" onkeyup="actualizarCostoTotal(<?php echo $i;?>)" readonly class="form-control" value="<?php echo $row[7];?>"></td>
                                        <td><input type="text" name="costop[<?php echo $i;?>]" id="costop<?php echo $i;?>" readonly class="form-control" value="<?php echo $row[8];?>"></td>
                                        <td><input type="number" name="cs[<?php echo $i;?>]" id="cs<?php echo $i;?>" class="form-control" step="0.01" value="0" readonly></td>
                                        <td><input type="text" name="precioC[<?php echo $i;?>]" id="precioC<?php echo $i;?>" onkeyup="actualizarCostoTotal(<?php echo $i;?>)" onClick="this.select();" class="form-control" step="0.01" value="<?php echo $row[9];?>"></td>
                                        <td><button type="button" class="btn btn-danger" id='<?php echo $i;?>' onClick="t1_deleted(<?php echo $i;?>)">-</button></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr id="tablita1">
                                        <th colspan="3" >SOPORTE LOGISTICO</th>
                                        <td id="totalTi">0</td>
                                        <td id="totalCa">0</td>
                                        <td id="totalTa">0</td>
                                        <td id="totalCo">0</td>
                                        <td></td>
                                        <td id="totalPr">0</td>
                                        <td></td>
                                    </tr
                                </tbody>
                            </table>
                                <table class="table table-sm">
                                    <thead class="thead-light">
                                        <tr><th colspan="9"><h2>2) MATERIALES Y SERVICIOS QUE INTERVIENEN EN LA OPERACION</h2></th></tr>
                                        <!--materiales-->
                                        <tr>
                                            <th scope="col" colspan="2"><label>MATERIALES</label></th>
                                            <th scope="col" colspan="7"><label>COSTO ESTIMADO EN MATERIALES</label></th>
                                        </tr>
                                        <tr>
                                            <th scope="col">MATERIALES</th>
                                            <th scope="col">NOMBRE DEL PROVEEDOR</th>
                                            <th scope="col">CANTIDAD ESTIMADA</th>
                                            <th scope="col">COSTO UNITARIO</th>
                                            <th scope="col">DOCUMENTO</th>
                                            <th scope="col">COSTO TOTAL ESTIMADO</th>
                                            <th scope="col">COSTO SUGERIGO</th>
                                            <th scope="col">PRECIO COTIZADO SIN F.E.E.</th>
                                            <th><button type="button" class="btn btn-success" onclick="addRow_t2();">+</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i2=0;
                                        $sql2="select * from materiales_atl where id_hoja_costos_atl=$id_hoja_costos";
                                        $materiales=mysqli_query($con,$sql2);
                                        while($row2=mysqli_fetch_array($materiales)){
                                            $i2=$i2+1;
                                        ?>
                                        <tr>
                                            <td><input type="text" name="t2_mat[<?php echo $i2;?>]" id="t2_mat<?php echo $i2;?>" class="form-control" value="<?php echo $row2[2];?>"></td>
                                            <td><input type="text" name="t2_nom[<?php echo $i2;?>]" id="t2_nom<?php echo $i2;?>" class="form-control" value="<?php echo $row2[3];?>"></td>
                                            <td><input type="number" name="t2_can[<?php echo $i2;?>]" id="t2_can<?php echo $i2;?>" onkeyup="t2_subTotal(<?php echo $i2;?>)" onClick="this.select()" value="<?php echo $row2[4];?>" class="form-control" step="0.01"></td>
                                            <td><input type="number" name="t2_cos[<?php echo $i2;?>]"id="t2_cos<?php echo $i2;?>" onkeyup="t2_subTotal(<?php echo $i2;?>)" onClick="this.select()" value="<?php echo $row2[5];?>" class="form-control" step="0.01"></td>
                                            <td><select name="t2_doc[<?php echo $i2;?>]" id="t2_doc<?php echo $i2;?>" onchange="t2_subTotal(<?php echo $i2;?>)" class="form-control">
                                                <option><?php echo $row2[6];?></option>
                                                <option>FACTURA</option>
                                                <option>RECIBO</option>
                                                </select></td>
                                            <td><input type="text" class="form-control" name="t2_tot[<?php echo $i2;?>]" id="t2_tot<?php echo $i2;?>" value="<?php echo $row2[7];?>" readonly></td>
                                            <td><input type="number" name="cs[<?php echo $i2;?>]" id="cs<?php echo $i2;?>" class="form-control" step="0.01" value="0" readonly></td>
                                            <td><input type="number" name="t2_pre[<?php echo $i2;?>]" id="t2_pre<?php echo $i2;?>" onkeyup="t2_subTotal(<?php echo $i2;?>)" value="<?php echo $row2[8];?>" class="form-control" step="0.01"></td>
                                            <td><button type="button" class="btn btn-danger" id='<?php echo $i2;?>' onClick="t2_deleted(<?php echo $i2;?>)">-</button></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr id="tablita2">
                                            <th colspan="5">TOTAL</th>
                                            <td><label  id="t2_costoT">0</label></td>
                                            <td></td>
                                            <td><label id="t2_precioT">0</label></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-sm">
                                    <!--tabla 2 - servicios-->
                                    <thead class="thead-light">
                                        <tr>
                                            <th colspan="2"><label>SERVICIOS CONTRATADOS</label></th>
                                            <th colspan="8"><label>COSTO ESTIMADO DE SERVICIOS</label></th>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th scope="col">SERVICIOS CONTRATADOS</th>
                                            <th scope="col">NOMBRE DEL PROVEEDOR</th>
                                            <th scope="col">DIAS</th>
                                            <th scope="col">CANTIDAD ESTIMADA</th>
                                            <th scope="col">COSTO UNITARIO</th>
                                            <th scope="col">TIPO O FORMA</th>
                                            <th scope="col">TOTAL COSTO PROGRAMADO</th>
                                            <th scope="col">COSTO SUGERIGO</th>
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
                                            $i3=$i3+1;
                                        ?>
                                        <tr>
                                            <td><input type="text" name="t3_ser[<?php echo $i3;?>]" id="t3_ser<?php echo $i3;?>" class="form-control" value="<?php echo $row3[2];?>"></td>
                                            <td><input type="text" name="t3_nom[<?php echo $i3;?>]" id="t3_nom<?php echo $i3;?>" class="form-control" value="<?php echo $row3[3];?>"></td>
                                            <td><input type="number" name="t3_dia[0<?php echo $i3;?>]" id="t3_dia<?php echo $i3;?>" value="<?php echo $row3[4];?>" onClick="this.select()" onkeyup="t3_subTotal(<?php echo $i3;?>)" class="form-control"></td>
                                            <td><input type="number" name="t3_can[<?php echo $i3;?>]" id="t3_can<?php echo $i3;?>" value="<?php echo $row3[5];?>" onClick="this.select()" onkeyup="t3_subTotal(0<?php echo $i3;?>)" class="form-control" ></td>
                                            <td><input type="number" name="t3_cos[<?php echo $i3;?>]" id="t3_cos0" value="<?php echo $row3[6];?>" onClick="this.select()" onkeyup="t3_subTotal(<?php echo $i3;?>)" class="form-control" step="0.01"></td>
                                            <td><select name="t3_tip[<?php echo $i3;?>]" id="t3_tip<?php echo $i3;?>" onChange="t3_subTotal(<?php echo $i3;?>)"  class="form-control">
                                                <option><?php echo $row3[7];?></option>
                                                <option>FACTURA</option>
                                                <option>RECIBO</option>
                                                <option>SIN IMPUESTO</option>
                                                <option>ALQUILER SIN RECIBO</option>
                                                </select></td>
                                            <td><input type="text" name="t3_tot[<?php echo $i3;?>]" id="t3_tot<?php echo $i3;?>" value="<?php echo $row3[8];?>" class="form-control" readonly></td>
                                            <td><input type="number" name="t3_cs[<?php echo $i3;?>]" id="t3_cs<?php echo $i3;?>" class="form-control" step="0.01" value="0" readonly></td>
                                            <td><input type="number" name="t3_pre[<?php echo $i3;?>]" value="<?php echo $row3[9];?>" id="t3_pre<?php echo $i3;?>" onClick="this.select()" onkeyup="t3_subTotal(<?php echo $i3;?>)" class="form-control" step="0.01"></td>
                                            <td><button type="button" class="btn btn-danger" id='<?php echo $i3;?>' onClick="t3_deleted(<?php echo $i3;?>)">-</button></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr id="tablita3">
                                            <th colspan="6"><label>TOTAL</label></th>
                                            <td><label  id="t3_costoT">0</label></td>
                                            <td></td>
                                            <td><label id="t3_precioT">0</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-sm">
                                    <!--PRODUCTOS/EQUIPOS PROPIOS DE GRUPO REGIONAL-->
                                    <!--productos de taller-->
                                    <thead class="thead-light">
                                        <tr><th colspan="7"><h2>3) PRODUCTOS / EQUIPOS PROPIOS DE GRUPO REGIONAL</h2></th></tr>
                                        <tr><th colspan="7">PRODUCTOS PROPIOS DE TALLER</th></tr>
                                        <tr>
                                            <th scope="col">PRODUCTOS TERMINADOS DE TALLER</th>
                                            <th scope="col">CANTIDAD</th>
                                            <th scope="col">COSTO UNITARIO</th>
                                            <th scope="col">COSTO TOTAL</th>
                                            <th scope="col">COSTO SUGERIGO</th>
                                            <th cope="col">PRECIO COTIZADO SIN F.E.E.</th>
                                            <th cope="col"><button type="button" class="btn btn-success" onclick="addRow_t4()">+</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i4=0;
                                        $sql4="select * from producto_propio_taller_atl where id_hoja_costos_atl=$id_hoja_costos";
                                        $producto=mysqli_query($con,$sql4);
                                        while($row4=mysqli_fetch_array($producto)){
                                            $i4=$i4+1;
                                        ?>
                                        <tr>
                                            <td><input type="text" name="t4_pro[<?php echo $i4;?>]" id="t4_pro<?php echo $i4;?>" class="form-control" value="<?php echo $row4[2];?>"></td>
                                            <td><input type="number" value="<?php echo $row4[3];?>" onClick="this.select()" onkeyup="t4_subTotal(<?php echo $i4;?>)" class="form-control" name="t4_can[<?php echo $i4;?>]" id="t4_can<?php echo $i4;?>"></td>
                                            <td><input type="number" value="<?php echo $row4[4];?>" onClick="this.select()" onkeyup="t4_subTotal(<?php echo $i4;?>)" name="t4_cos[<?php echo $i4;?>]" id="t4_cos<?php echo $i4;?>" class="form-control" step="0.01"></td>
                                            <td><input type="text" name="t4_coT[<?php echo $i4;?>]" id="t4_coT<?php echo $i4;?>" value="<?php echo $row4[5];?>" class="form-control" readonly></td>
                                            <td><input type="number" name="t4_cs[<?php echo $i4;?>]" id="t4_cs<?php echo $i4;?>" class="form-control" step="0.01" value="0" readonly></td>
                                            <td><input type="number" value="<?php echo $row4[6];?>" onClick="this.select()" onkeyup="t4_subTotal(<?php echo $i4;?>)" name="t4_pre[<?php echo $i4;?>]" id="t4_pre<?php echo $i4;?>" class="form-control"></td>
                                            <td><button type="button" class="btn btn-danger" id='<?php echo $i4;?>' onClick="t4_deleted(this.id)">-</button></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr id="tablita4">
                                            <th colspan="2"><label>TOTAL</label></th>
                                            <td><label id="t4_costoU">0</label></td>
                                            <td><label id="t4_costoT">0</label></td>
                                            <td></td>
                                            <td><label id="t4_precioT">0</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--equipos propios -->
                                <table class="table table-sm"> 
                                    <thead class="thead-light">
                                        <tr><th colspan="7">EQUIPOS PROPIOS</th></tr>
                                        <tr>
                                            <th scope="col">DETALLE</th>
                                            <th scope="col">CANTIDAD</th>
                                            <th scope="col">COSTO UNITARIO</th>
                                            <th scope="col">COSTO TOTAL</th>
                                            <th scope="col">COSTO SUGERIGO</th>
                                            <th scope="col">PRECIO COTIZADO SIN F.E.E.</th>
                                            <th scope="col"><button type="button" class="btn btn-success" onclick="addRow_t5()">+</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>             
                                        <?php
                                        $i5=0;
                                        $sql5="select * from equipo_propio_atl where id_hoja_costos_atl=$id_hoja_costos";
                                        $equipos=mysqli_query($con,$sql5);
                                        while($row5=mysqli_fetch_array($equipos)){
                                            $i5=$i5+1;
                                        ?>
                                        <tr>
                                            <td><input type="text" name="t5_det[<?php echo $i5;?>]" id="t5_det<?php echo $i5;?>" class="form-control" value="<?php echo $row5[2];?>"></td>
                                            <td><input type="number" value="<?php echo $row5[3];?>" onClick="this.select()" onkeyup="t5_subTotal(<?php echo $i5;?>)" name="t5_can[<?php echo $i5;?>]" id="t5_can<?php echo $i5;?>" class="form-control"></td>
                                            <td><input type="number" value="<?php echo $row5[4];?>" onClick="this.select()" onkeyup="t5_subTotal(<?php echo $i5;?>)" name="t5_coU[<?php echo $i5;?>]" id="t5_coU<?php echo $i5;?>" class="form-control" step="0.01"></td>
                                            <td><input type="number" name="t5_coT[<?php echo $i5;?>]" id="t5_coT<?php echo $i5;?>" value="<?php echo $row5[5];?>" class="form-control" readonly></td>
                                            <td><input type="number" name="t5_cs[<?php echo $i5;?>]" id="t5_cs<?php echo $i5;?>" class="form-control" step="0.01" value="0" readonly></td>
                                            <td><input type="number" value="<?php echo $row5[6];?>" onClick="this.select()" onkeyup="t5_subTotal(<?php echo $i5;?>)" name="t5_pre[<?php echo $i5;?>]" id="t5_pre<?php echo $i5;?>" class="form-control" step="0.01"></td>
                                            <td scope="col"><button type="button" class="btn btn-danger" id='<?php echo $i5;?>' onClick="t5_deleted(this.id)">-</button></td></td>
                                    </tr>
                                <?php
                                        }
                                ?>
                                <tr id="tablita5">
                                    <th colspan="2">TOTAL</th>
                                    <td><label id="t5_costoU">0</label></td>
                                    <td><label id="t5_costoT">0</label></td>
                                    <td></td>
                                    <td><label id="t5_precioT">0</label></td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
                <!--formulario parte 2-->
                <!--consulta para traer los costos-->
                <?php
                $sql6="select * from costos_totales_atl where id_hoja_costos_atl=$id_hoja_costos";
                $costos=mysqli_fetch_row(mysqli_query($con,$sql6));
                ?>
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
                                <td><input type="number" value="<?php echo $costos[2]?>" class="form-control" id="costoVA" name="costoVA" step="0.01" readonly></td>
                                <td class="text-center"><input type="number" value="<?php echo $costos[3]?>" class="form-control" id="costoED" name="costoED" step="0.01" readonly></label></td>
                    <td class="text-center"><input type="number" value="<?php echo $costos[4]?>" class="form-control" id="diferencia" name="diferencia" step="0.01" readonly min="0"></label></td>
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
            <td class="text-center"><input type="number" value="<?php echo $costos[5]?>" class="form-control" id="costoAp" name="costoAp" step="0.01" readonly></td>
            <td class="text-center"><input type="number" value="<?php echo $costos[6]?>" class="form-control" id="tasaDa" name="tasaDa" step="0.01" readonly></td>
            <td class="text-center"><input type="number" value="<?php echo $costos[7]?>" class="form-control" id="costoPd" name="costoPd" step="0.01" readonly></td>
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
            <td class="text-center"><input type="number" value="<?php echo $costos[8]?>" class="form-control" id="tiempoPr" name="tiempoPr" step="0.01" readonly></td>
            <td class="text-center"><input type="number" value="<?php echo $costos[9]?>" class="form-control" name="tasaFi" id="tasaFi" step="0.01" readonly></td>
            <td class="text-center"><input type="number" value="<?php echo $costos[10]?>" class="form-control" id="costoTo" name="costoTo" step="0.01" readonly></td>
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
            <td><input type="number" value="<?php echo $costos[11]?>" class="form-control" id="feeP" name="feeP" step="0.01" readonly></td>
            <td></td>
            <td><input type="number" class="form-control" id="feeV" name="feeV" value="<?php echo $costos[12]?>" onkeyup="costosExternos()" step="0.01"></td>
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
            <td><input type="number" value="<?php echo $costos[13]?>" class="form-control" id="totalE1" name="totalE1" step="0.01" readonly></td>
            <td><input type="number" value="<?php echo $costos[14]?>" class="form-control" id="totalF1" name="totalF1" step="0.01" readonly></td>
        </tr>
        <tr>
            <th scope="row">F.E.E.</th>
            <td><input type="number" value="<?php echo $costos[15]?>" class="form-control" id="totalE2" name="totalE2" step="0.01" readonly></td>
            <td><input type="number" value="<?php echo $costos[16]?>" class="form-control" id="totalF2" name="totalF2" step="0.01" readonly></td>
        </tr>
        <tr>
            <th scope="row">COSTO TOTAL DEL PROYECTO MAS F.E.E.</th>
            <td><input type="number" value="<?php echo $costos[17]?>" class="form-control" id="totalE3" name="totalE3" step="0.01" readonly></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">COSTO TOTAL DEL PROYECTO MAS IMPUESTO</th>
            <td><input type="text" value="<?php echo $costos[18]?>" class="form-control" id="totalE4" name="totalE4" readonly></td>
            <td><input type="text" value="<?php echo $costos[19]?>" class="form-control" id="totalF4" name="totalF4" step="0.01" readonly></td>
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
<script src="js/jquery-3.3.1.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</body>
</html>

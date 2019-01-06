
    //Variables tablita 1 
    //Ejecutivo de cuenta -> Hora: 30     Dia:240
    //Encargado logistico -> Hora: 26     Dia: 208
    var tasaEjecutivo = 30; //valor en horas
    var tasaEncargado = 26; //valor en horas
    var tasaPresupuestada = 0;
    var c=0;
    var vTasa = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    var vCosto = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    var vPre = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    actualizarTaza(0);
    // Variables tablita 2
    //Solamente habilitado factura, por tanto:
    //Costo total estimado = cantidad *c/u * 0.87
    var c2=0;
    var t2_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    var t2_precio = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

    //Variables tablita 3
    // dias * cantidad * c/u * tipooForma
    //Factura = *0.87
    //Recibo = *1.18
    //Sin impuesto = *1 
    // Alquiler sin recibo = *1.19 
    var t3_factura = 0.87;
    var t3_recibo = 1.18;
    var t3_sinImpuesto = 1;
    var t3_alquiler = 1.19; 
    var t3_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    var t3_precio = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    var c3 = 0;
    //variables tablita 4
    var c4 = 0;
    var t4_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    var t4_precio = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]; 
    var t4_costoUnitario = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    //variables tablita 5
    var c5 = 0;
    var t5_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    var t5_precio = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]; 
    var t5_costoUnitario = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    
    t2_subTotal(0);
            function actualizarTaza(numero){
                var staff = document.getElementById("staf"+numero).value;
                var dayHour = document.getElementById("dayorhour"+numero).value;
                if (staff=="EJECUTIVO DE CUENTAS") {
                    if (dayHour=="DIAS")
                        tasaPresupuestada=tasaEjecutivo*8; 
                    if (dayHour=="HORAS")
                        tasaPresupuestada=tasaEjecutivo; 
                    if (dayHour=="SELECCIONAR")
                        tasaPresupuestada=0;
                    vTasa[numero]=tasaPresupuestada.toFixed(2);
                    document.getElementById("tasa"+numero).value =tasaPresupuestada.toFixed(2); 
                }
                if (staff=="ENCARGADO LOGISTICO") {
                    if (dayHour=="DIAS")
                        tasaPresupuestada=tasaEncargado*8;
                    if (dayHour=="HORAS")
                        tasaPresupuestada=tasaEncargado;
                    if (dayHour=="SELECCIONAR")
                        tasaPresupuestada=0;
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
                vTasa[numer] = tas.toFixed(2);
                r=activacoma(r.toFixed(2));
                document.getElementById("costop"+numer).value =r;
                soporteLog();
            }

            function addRow(){
                c=c+1;
                var fila = '<tr>'+
                    '<td>'+
                    '<select onChange="actualizarTaza('+c+')" class="form-control"  name="staf'+c+'" id="staf'+c+'" >'+
                    '<option>EJECUTIVO DE CUENTAS</option>'+
                    '<option>ENCARGADO LOGISTICO</option>'+
                    '<option>SUPERVISOR</option>'+
                    '</select>'+
                    '</td>'+
                    '<td><input type="text" class="form-control" id="detalle'+c+'" ></td>'+
                    '<td><select class="form-control" onChange= "actualizarTaza('+c+')" name="dayorhour'+c+'" id="dayorhour'+c+'" >'+
                    '<option>SELECCIONAR</option>'+
                    '<option>DIAS</option>'+
                    '<option>HORAS</option>'+
                    '</select></td>'+
                    '<td><input type="number" class="form-control" name="time'+c+'" id="time'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();"></td>'+
                    '<td><input type="number" class="form-control" name="nrop'+c+'" id="nrop'+c+'" value ="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();"></td>'+
                    '<td><input type="text" class="form-control" name="tasa'+c+'" id="tasa'+c+'" value="" onkeyup="actualizarCostoTotal('+c+')" readonly></td>'+
                    '<td><input type="text" class="form-control" name="costop'+c+'" id="costop'+c+'" value="0" readonly></td>'+
                    '<td><input type="text" class="form-control" name="precioC'+c+'" id="precioC'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();"></td>'+
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
                document.getElementById("totalTi").innerHTML = acTime;
                document.getElementById("totalCa").innerHTML = acCant;

                acTasa=activacoma(acTasa.toFixed(2));
                acCosto=activacoma(acCosto.toFixed(2));
                acPrecio=activacoma(acPrecio.toFixed(2));
                document.getElementById("totalTa").innerHTML = acTasa;
                document.getElementById("totalCo").innerHTML = acCosto;
                document.getElementById("totalPr").innerHTML = acPrecio;


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

            function t2_subTotal(u){
                var ca = parseFloat(document.getElementById("t2_can"+u).value)
                var co = parseFloat(document.getElementById("t2_cos"+u).value)
                var pre = parseFloat(document.getElementById("t2_pre"+u).value)
                 var costoT = 0.87*ca*co;
                t2_costoTotal[u]=costoT.toFixed(2);
                t2_precio[u] = pre.toFixed(2);

                costoT = activacoma(costoT.toFixed(2));
                document.getElementById("t2_tot"+u).value =  costoT;
                actualizarTotalT2();
            }

            function actualizarTotalT2(){
                var acCosto=0;
                var acPrecio=0;
                var i =0;
                for(i=0;i<=c2;i++){
                    acCosto+= parseFloat(t2_costoTotal[i]);
                    acPrecio+= parseFloat(t2_precio[i]);
                }
                //acCosto = activacoma(acCosto);
                //acPrecio = activacoma(acPrecio);
                document.getElementById("t2_costoT").innerHTML= activacoma(acCosto.toFixed(2));
                document.getElementById("t2_precioT").innerHTML= activacoma(acPrecio.toFixed(2));
                   
            }

            function addRow_t2(){
                c2=c2+1;
                var fila = '<tr>'+
                            '<td><input type="text" name="t2_mat'+c2+'"  id="t2_mat'+c2+'" class="form-control"></td>'+
                            '<td><input type="text" name="t2_nom'+c2+'" id="t2_nom'+c2+'" class="form-control"></td>'+
                            '<td><input type="number" name="t2_can'+c2+'" id="t2_can'+c2+'" onkeyup="t2_subTotal('+c2+')" onClick="this.select()" value="0" class="form-control"></td>'+
                            '<td><input type="number" name="t2_cos'+c2+'"id="t2_cos'+c2+'" onkeyup="t2_subTotal('+c2+')" onClick="this.select()" value="0" class="form-control"></td>'+
                            '<td><select name="t2_doc'+c2+'" id="t2_doc'+c2+'" onkeyup="t2_subTotal('+c2+')" class="form-control">'+
                                '<option>FACTURA</option>'+
                                '</select></td>'+
                            '<td><input type="text" class="form-control" id="t2_tot'+c2+'" readonly></td>'+
                            '<td><input type="number" name="t2_pre'+c2+'" id="t2_pre'+c2+'" onkeyup="t2_subTotal('+c2+')" value="0" class="form-control"></td>'+
                            '<td></td>'+
                           '</tr>'

                $('#tablita2').append(fila);
                actualizarTotalT2(c2);
            }

            function t3_subTotal(o){
                var dia = parseFloat(document.getElementById("t3_dia"+o).value)
                var can = parseFloat(document.getElementById("t3_can"+o).value)
                var cos = parseFloat(document.getElementById("t3_cos"+o).value)
                var pre = parseFloat(document.getElementById("t3_pre"+o).value)
                var tipo = document.getElementById("t3_tip"+o).value
                var valorT=0
                if (tipo=="FACTURA") {
                    valorT = t3_factura;
                }
                if (tipo=="RECIBO") {
                    valorT = t3_recibo;
                }
                if (tipo=="SIN IMPUESTO") {
                    valorT = t3_sinImpuesto;
                }
                if (tipo=="ALQUILER SIN RECIBO") {
                    valorT = t3_alquiler;
                }
                var costoT = dia*can*cos*valorT;
                t3_costoTotal[o]=costoT.toFixed(2);
                t3_precio[o] = pre.toFixed(2);

                costoT = activacoma(costoT.toFixed(2));
                document.getElementById("t3_tot"+o).value =  costoT;
                actualizarTotalT3();
            }

            function actualizarTotalT3(){
                var acCosto=0;
                var acPrecio=0;
                var i =0;
                for(i=0;i<=c3;i++){
                    acCosto+= parseFloat(t3_costoTotal[i]);
                    acPrecio+= parseFloat(t3_precio[i]);
                }
                //acCosto = activacoma(acCosto);
                //acPrecio = activacoma(acPrecio);
                document.getElementById("t3_costoT").innerHTML= activacoma(acCosto.toFixed(2));
                document.getElementById("t3_precioT").innerHTML= activacoma(acPrecio.toFixed(2));
                   
            }


            function addRow_t3(){
                c3=c3+1;
                var fila = '<tr>'+
                            '<td><input type="text" name="t3_ser'+c3+'" id="t3_ser'+c3+'" class="form-control"></td>'+
                            '<td><input type="text" name="t3_nom'+c3+'" id="t3_nom'+c3+'" class="form-control"></td>'+
                            '<td><input type="number" name="t3_dia'+c3+'" id="t3_dia'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control"></td>'+
                            '<td><input type="number" name="t3_can'+c3+'" id="t3_can'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control"></td>'+
                            '<td><input type="number" name="t3_cos'+c3+'" id="t3_cos'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control"></td>'+
                            '<td><select name="t3_tip'+c3+'" id="t3_tip'+c3+'" onChange="t3_subTotal('+c3+')" class="form-control">'+
                                '<option>FACTURA</option>'+
                                '<option>RECIBO</option>'+
                                '<option>SIN IMPUESTO</option>'+
                                '<option>ALQUILER SIN RECIBO</option>'+
                                '</select></td>'+
                            '<td><input type="text" name="t3_tot'+c3+'" id="t3_tot'+c3+'" class="form-control" readonly></td>'+
                            '<td><input type="number" name="t3_pre'+c3+'" value="0" id="t3_pre'+c3+'" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control"></td>'+
                            '<td></td>'+
                        '</tr>'

                $('#tablita3').append(fila);
                actualizarTotalT3(c3);
            }

            function t4_subTotal(e){
                var ca = parseFloat(document.getElementById("t4_can"+e).value)
                var co = parseFloat(document.getElementById("t4_cos"+e).value)
                var pre = parseFloat(document.getElementById("t4_pre"+e).value)
                var costoT = ca*co;
                t4_costoUnitario[e]=co.toFixed(2);
                t4_costoTotal[e]=costoT.toFixed(2);
                t4_precio[e] = pre.toFixed(2);

                costoT = activacoma(costoT.toFixed(2));
                document.getElementById("t4_coT"+e).value =  costoT;
                actualizarTotalT4();
            }

            function actualizarTotalT4(){
                var acCosto=0;
                var acPrecio=0;
                var acUnitario=0;
                var i =0;
                for(i=0;i<=c4;i++){
                    acCosto+= parseFloat(t4_costoTotal[i]);
                    acPrecio+= parseFloat(t4_precio[i]);
                    acUnitario+=parseFloat(t4_costoUnitario[i]);
                }
                //acCosto = activacoma(acCosto);
                //acPrecio = activacoma(acPrecio);
                document.getElementById("t4_costoU").innerHTML= activacoma(acUnitario.toFixed(2));
                document.getElementById("t4_costoT").innerHTML= activacoma(acCosto.toFixed(2));
                document.getElementById("t4_precioT").innerHTML= activacoma(acPrecio.toFixed(2));
                   
            }

            function addRow_t4(){
                c4=c4+1;
                var fila = '<tr>'+
                            '<td><input type="text" name="t4_pro'+c4+'" id="t4_pro'+c4+'" class="form-control"></td>'+
                            '<td><input type="text" name="t4_are'+c4+'" id="t4_are'+c4+'" class="form-control"></td>'+
                            '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" class="form-control" name="t4_can'+c4+'" id="t4_can'+c4+'"></td>'+
                            '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" name="t4_cos'+c4+'" id="t4_cos'+c4+'" class="form-control"></td>'+
                            '<td><input type="text" name="t4_coT'+c4+'" id="t4_coT'+c4+'" class="form-control" readonly></td>'+
                            '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" name="t4_pre'+c4+'" id="t4_pre'+c4+'" class="form-control"></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '</tr>'

                $('#tablita4').append(fila);
                actualizarTotalT4(c4);
            }
            function t5_subTotal(a){
                var ca = parseFloat(document.getElementById("t5_can"+a).value)
                var co = parseFloat(document.getElementById("t5_coU"+a).value)
                var pre = parseFloat(document.getElementById("t5_pre"+a).value)
                var costoT = ca*co;
                t5_costoUnitario[a]=co.toFixed(2);
                t5_costoTotal[a]=costoT.toFixed(2);
                t5_precio[a] = pre.toFixed(2);

                costoT = activacoma(costoT.toFixed(2));
                document.getElementById("t5_coT"+a).value =  costoT;
                actualizarTotalT5();
            }

            function actualizarTotalT5(){
                var acCosto=0;
                var acPrecio=0;
                var acUnitario=0;
                var i =0;
                for(i=0;i<=c5;i++){
                    acCosto+= parseFloat(t5_costoTotal[i]);
                    acPrecio+= parseFloat(t5_precio[i]);
                    acUnitario+=parseFloat(t5_costoUnitario[i]);
                }
                //acCosto = activacoma(acCosto);
                //acPrecio = activacoma(acPrecio);
                document.getElementById("t5_costoU").innerHTML= activacoma(acUnitario.toFixed(2));
                document.getElementById("t5_costoT").innerHTML= activacoma(acCosto.toFixed(2));
                document.getElementById("t5_precioT").innerHTML= activacoma(acPrecio.toFixed(2));
                   
            }

            function addRow_t5(){
                c5=c5+1;
                var fila = '<tr>'+
                            '<td><input type="text" name="t5_pro'+c5+'" id="t5_pro'+c5+'" class="form-control"></td>'+
                            '<td><input type="text" name="t5_are'+c5+'" id="t5_are'+c5+'" class="form-control"></td>'+
                            '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" class="form-control" name="t5_can'+c5+'" id="t5_can'+c5+'"></td>'+
                            '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" name="t5_coU'+c5+'" id="t5_coU'+c5+'" class="form-control"></td>'+
                            '<td><input type="text" name="t5_coT'+c5+'" id="t5_coT'+c5+'" class="form-control" readonly></td>'+
                            '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" name="t5_pre'+c5+'" id="t5_pre'+c5+'" class="form-control"></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '</tr>'

                $('#tablita5').append(fila);
                actualizarTotalT5(c5);
            }
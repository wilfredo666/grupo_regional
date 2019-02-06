//Variables tablita 1
//Segun excel para tasa presupuestada -> Hora: 26     Dia: 208
var c1=0;
var t1_acTa=0;
var t1_acCo=0;
var t1_acTi=0;
var t1_acCa=0;

//variables tablita 2
var t2_acCap=0;
var t2_acCan=0;
var t2_acPag=0;
var t2_acTot1=0;
var t2_acTot2=0;
var c2=0;


//variables tablita 3

var c3=0;
var t3_acCan=0;
var t3_acCos=0;
var t3_acTot=0;

//variables tablita 4
var c4=0;
var t4_acCan=0;
var t4_acCos=0;
var t4_acTot=0;

//variables tablita 5
var c5=0;
var t5_acCa=0;
var t5_acCo=0;
var t5_acTo=0;

//Variables tablita 6
var c6=0;
var t6_acCa=0;
var t6_acCo=0;
var t6_acTo=0;

//Variables tablita 7
var c7=0;
var t7_acCa=0;
var t7_acCo=0;
var t7_acTo=0;
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

            function convertToFloat(v){
                var nuevo="";
                var res;
                var i;
                for( i=0; i<v.length;i++)
                    if(v[i]!=',')
                        nuevo +=v[i];
                res = parseFloat(nuevo).toFixed(2);
                return res;   
            }
            function t1_subTotal(){
                var ti = document.getElementById("t1_tiem").value
                var ca = parseFloat(document.getElementById("t1_cant").value)
                var tip = parseFloat(document.getElementById("t1_tieP").value)
                
                var valorTasa= 0
                if(ti=="DIAS")
                    valorTasa=208
                if (ti=="HORAS") 
                    valorTasa=26
                var t1_costoT = tip*ca*valorTasa;
                document.getElementById("t1_tasa").value = valorTasa.toFixed(2);
                document.getElementById("t1_cost").value = t1_costoT.toFixed(2);
            }
            
            function t1_addRow(){
                c1=c1+1;
                var de = document.getElementById("t1_deta").value;
                var ti = document.getElementById("t1_tiem").value;
                var tp = document.getElementById("t1_tieP").value;
                var ca = document.getElementById("t1_cant").value;
                var ta = document.getElementById("t1_tasa").value; // for labels
                var co = document.getElementById("t1_cost").value; // for labels
                
                var fila = '<tr id = "fila1'+c1+'">'+               //nombre : 'fila' + 'numero de tabla' + ' idFila'
                               ' <td colspan="3"><label id="t1_de'+c1+'">'+de+'</label></td>'+ //detalle
                               ' <td><label id="t1_ti'+c1+'">'+ti+'</td>'+ //tiempo
                               ' <td><label id="t1_tp'+c1+'">'+tp+'</td>'+
                               ' <td><label id="t1_ca'+c1+'">'+ca+'</td>'+
                               ' <td><label id="t1_ta'+c1+'">'+ta+'</td>'+
                               ' <td><label id="t1_co'+c1+'">'+co+'</td>'+
                               ' <td><button type="button" class="btn btn-danger" id='+c1+' onClick="t1_deleted(this.id)">-</button></td>'+
                           ' </tr>'
                $('#tablita1').after(fila)
                document.getElementById("t1_deta").value="EJECUTIVO DE CUENTAS";
                document.getElementById("t1_tiem").value="DIAS";
                document.getElementById("t1_tieP").value=0;
                document.getElementById("t1_cant").value=0;
                document.getElementById("t1_tasa").value=0;
                document.getElementById("t1_cost").value=0;
                
                //totales
                t1_acTa += parseFloat(convertToFloat(ta));
                t1_acCo += parseFloat(convertToFloat(co));
                t1_acTi += parseInt(tp);
                t1_acCa += parseInt(ca);
                t1_totales();
                   
            }
            function t1_deleted(d)
            {
                var ti = document.getElementById("t1_tp"+d).innerHTML;
                var ca = document.getElementById("t1_ca"+d).innerHTML;
                var ta = document.getElementById("t1_ta"+d).innerHTML;
                var co = document.getElementById("t1_co"+d).innerHTML;
                
                t1_acTi -=parseInt(ti);
                t1_acCa -=parseInt(ca);
                t1_acTa -= convertToFloat(ta);
                t1_acCo -= convertToFloat(co);
                
                t1_totales();
                
                $("#fila1"+d).remove();
                //c1=c1-1;
            }
            function t1_totales(){
                document.getElementById("t1_ti").innerHTML= t1_acTi;
                document.getElementById("t1_ca").innerHTML= t1_acCa;
                document.getElementById("t1_ta").innerHTML= t1_acTa.toFixed(2);
                document.getElementById("t1_co").innerHTML= t1_acCo.toFixed(2);
                costosExternos();
            }
            //TABLITA 2
            function t2_subTotal()
            {
                var cap = parseInt(document.getElementById("t2_cant").value)
                var can = parseInt(document.getElementById("t2_canA").value)
                var pag = parseFloat(document.getElementById("t2_pago").value)
                
                var total1 = pag / 0.845
                var total2 = cap*can*(total1.toFixed(2));
               
                document.getElementById("t2_tot1").value = total1.toFixed(2);
                document.getElementById("t2_tot2").value = total2.toFixed(2);
            }
            
            function t2_addRow(){
                c2=c2+1;
                var pe = document.getElementById("t2_pers").value;
                var cp = document.getElementById("t2_cant").value;
                var ca = document.getElementById("t2_canA").value;
                var pa = document.getElementById("t2_pago").value;
                var ci = document.getElementById("t2_regi").value; 
                var t1 = document.getElementById("t2_tot1").value; 
                var t2 = document.getElementById("t2_tot2").value; 
                var fila = '<tr id = "fila2'+c2+'">'+
                                '<td colspan="2"><label id="t2_pe'+c2+'">'+pe+'</label></td>'+
                                '<td><label id="t2_cp'+c2+'">'+cp+'</label></td>'+
                                '<td><label id="t2_ca'+c2+'">'+ca+'</label></td>'+
                                '<td><label id="t2_pa'+c2+'">'+pa+'</label></td>'+
                                '<td><label id="t2_ci'+c2+'">'+ci+'</label></td>'+
                                '<td><label id="t2_t1'+c2+'">'+t1+'</label></td>'+
                                '<td><label id="t2_t2'+c2+'">'+t2+'</label></td>'+
                                '<td><button type="button" id='+c2+' class="btn btn-danger" onClick="t2_deleted(this.id)">-</button></td>'+
                            '</tr>'
                $('#tablita2').after(fila)
                document.getElementById("t2_pers").value= ""
                document.getElementById("t2_cant").value=0
                document.getElementById("t2_canA").value=0
                document.getElementById("t2_pago").value=0
                document.getElementById("t2_regi").value="LA PAZ"
                document.getElementById("t2_tot1").value=0
                document.getElementById("t2_tot2").value=0
                
                //totales
                t2_acCap+=parseInt(cp)
                t2_acCan+=parseInt(ca)
                t2_acPag+=parseFloat(convertToFloat(pa))
                t2_acTot1+=parseFloat(convertToFloat(t1))
                t2_acTot2+=parseFloat(convertToFloat(t2))
                t2_totales()
                   
            }
            function t2_deleted(d)
            {
                var pe = document.getElementById("t2_pe"+d).innerHTML
                var cp = document.getElementById("t2_cp"+d).innerHTML;
                var ca = document.getElementById("t2_ca"+d).innerHTML;
                var pa = document.getElementById("t2_pa"+d).innerHTML;
                var ci = document.getElementById("t2_ci"+d).innerHTML;
                var t1 = document.getElementById("t2_t1"+d).innerHTML;
                var t2 = document.getElementById("t2_t2"+d).innerHTML;
                
                t2_acCap-=parseInt(cp)
                t2_acCan-=parseInt(ca)
                t2_acPag-=parseFloat(convertToFloat(pa))
                t2_acTot1-=parseFloat(convertToFloat(t1))
                t2_acTot2-=parseFloat(convertToFloat(t2))

                t2_totales();
                
                $("#fila2"+d).remove();
                //c1=c1-1;
            }
            function t2_totales(){

                document.getElementById("t2_cp").innerHTML=t2_acCap;
                document.getElementById("t2_ca").innerHTML=t2_acCan;
                document.getElementById("t2_pa").innerHTML=t2_acPag.toFixed(2);
                document.getElementById("t2_t1").innerHTML=t2_acTot1.toFixed(2);
                document.getElementById("t2_t2").innerHTML=t2_acTot2.toFixed(2);
                costosExternos();
            }

            //TABLITA 3

            function t3_subTotal(){
                var can = parseInt(document.getElementById("t3_cant").value)
                var cos = parseFloat(document.getElementById("t3_cost").value)
                var doc = document.getElementById("t3_docu").value
                var val=0;
                if((doc=="FACTURA")||(doc=="ALMACEN")){
                  val = can*cos
                }
                if(doc=="RECIBO"){
                  val = (can*cos)/0.92;
                }
                document.getElementById("t3_tota").value = val.toFixed(2)
            }
            
            function t3_addRow(){
                c3=c3+1
                var ma = document.getElementById("t3_mate").value
                var pr = document.getElementById("t3_prov").value
                var un = document.getElementById("t3_unid").value
                var ca = document.getElementById("t3_cant").value
                var co = document.getElementById("t3_cost").value
                var doc = document.getElementById("t3_docu").value
                var to = document.getElementById("t3_tota").value

                var fila = '<tr id = "fila3'+c3+'">'+
                                '<td colspan="2"><label id="t3_ma'+c3+'">'+ma+'</label></td>'+
                                '<td><label id="t3_pr'+c3+'">'+pr+'</label></td>'+
                                '<td><label id="t3_un'+c3+'">'+un+'</label></td>'+
                                '<td><label id="t3_ca'+c3+'">'+ca+'</label></td>'+
                                '<td><label id="t3_co'+c3+'">'+co+'</label></td>'+
                                '<td><label id="t3_do'+c3+'">'+doc+'</label></td>'+
                                '<td><label id="t3_to'+c3+'">'+to+'</label></td>'+
                                '<td><button type="button" id='+c3+' class="btn btn-danger" onClick="t3_deleted(this.id)">-</button></td>'+
                            '</tr>'
                $('#tablita3').after(fila)
                document.getElementById("t3_mate").value=""
                //document.getElementById("t3_prov").value="---"
                //document.getElementById("t3_unid").value="PIEZAS"
                document.getElementById("t3_cant").value=0
                document.getElementById("t3_cost").value=0
                document.getElementById("t3_docu").value="FACTURA"
                document.getElementById("t3_tota").value=0
                
                //totales
                t3_acCan+=parseInt(ca)
                t3_acCos+=parseFloat(convertToFloat(co))
                t3_acTot+=parseFloat(convertToFloat(to))
                t3_totales()
                   
            }
            function t3_deleted(d)
            {
                var ca = document.getElementById("t3_ca"+d).innerHTML;
                var co = document.getElementById("t3_co"+d).innerHTML;
                var to = document.getElementById("t3_to"+d).innerHTML;
                
                t3_acCan+=parseInt(ca)
                t3_acCos+=parseFloat(convertToFloat(co))
                t3_acTot+=parseFloat(convertToFloat(to))
                t3_totales()
                
                $("#fila3"+d).remove();
                //c1=c1-1;
            }
            function t3_totales()
            {

                document.getElementById("t3_ca").innerHTML=t3_acCan
                document.getElementById("t3_co").innerHTML=t3_acCos.toFixed(2)
                document.getElementById("t3_to").innerHTML=t3_acTot.toFixed(2)
                costosExternos();
            }

            //TABLITA 4

            function t4_subTotal(){
                var can = parseInt(document.getElementById("t4_cant").value)
                var cos = parseFloat(document.getElementById("t4_cost").value)
                var doc = document.getElementById("t4_docu").value
                var val=0;
                if((doc=="FACTURA")||(doc=="SIN IMPUESTO")){
                  val = can*cos
                }
                if(doc=="RECIBO"){
                  val = (can*cos)/0.845;
                }
                if(doc=="ALQUILER SIN RECIBO"){
                  val = (can*cos)/0.84;
                }
                if(doc=="VIATICOS"){
                  val = (can*cos)/0.87;
                }
                
                document.getElementById("t4_tota").value = val.toFixed(2)
            }
            
            function t4_addRow(){
                c4=c4+1
                var se = document.getElementById("t4_serv").value
                var pr = document.getElementById("t4_prov").value
                var un = document.getElementById("t4_unid").value
                var ca = document.getElementById("t4_cant").value
                var co = document.getElementById("t4_cost").value
                var doc = document.getElementById("t4_docu").value
                var to = document.getElementById("t4_tota").value

                var fila = '<tr id = "fila4'+c4+'">'+
                                '<td colspan="2"><label id="t4_se'+c4+'">'+se+'</label></td>'+
                                '<td><label id="t4_pr'+c4+'">'+pr+'</label></td>'+
                                '<td><label id="t4_un'+c4+'">'+un+'</label></td>'+
                                '<td><label id="t4_ca'+c4+'">'+ca+'</label></td>'+
                                '<td><label id="t4_co'+c4+'">'+co+'</label></td>'+
                                '<td><label id="t4_do'+c4+'">'+doc+'</label></td>'+
                                '<td><label id="t4_to'+c4+'">'+to+'</label></td>'+
                                '<td><button type="button" id='+c4+' class="btn btn-danger" onClick="t4_deleted(this.id)">-</button></td>'+
                            '</tr>'
                $('#tablita4').after(fila)
                document.getElementById("t4_serv").value=""
                //document.getElementById("t3_prov").value="---"
                //document.getElementById("t3_unid").value="PIEZAS"
                document.getElementById("t4_cant").value=0
                document.getElementById("t4_cost").value=0
                document.getElementById("t4_docu").value="FACTURA"
                document.getElementById("t4_tota").value=0
                
                //totales
                t4_acCan+=parseInt(ca)
                t4_acCos+=parseFloat(convertToFloat(co))
                t4_acTot+=parseFloat(convertToFloat(to))
                t4_totales()
                   
            }
            function t4_deleted(d)
            {
                var ca = document.getElementById("t4_ca"+d).innerHTML;
                var co = document.getElementById("t4_co"+d).innerHTML;
                var to = document.getElementById("t4_to"+d).innerHTML;
                
                t4_acCan-=parseInt(ca)
                t4_acCos-=parseFloat(convertToFloat(co))
                t4_acTot-=parseFloat(convertToFloat(to))
                t4_totales()
                
                $("#fila4"+d).remove();
                //c1=c1-1;
            }
            function t4_totales()
            {

                document.getElementById("t4_ca").innerHTML=t4_acCan
                document.getElementById("t4_co").innerHTML=t4_acCos.toFixed(2)
                document.getElementById("t4_to").innerHTML=t4_acTot.toFixed(2)
                costosExternos();
            }

//TABLITA 5
            function t5_subTotal(){
                var ca = parseInt(document.getElementById("t5_cant").value)
                var co = parseFloat(document.getElementById("t5_cost").value)
                var res = ca*co;
                document.getElementById("t5_tota").value = res.toFixed(2)
            }
            
            function t5_addRow(){
                c5=c5+1;
                var de = document.getElementById("t5_prod").value;
                var un = document.getElementById("t5_unid").value;
                var ca = document.getElementById("t5_cant").value;
                var co = document.getElementById("t5_cost").value;
                var to = document.getElementById("t5_tota").value; 
                
                var fila = '<tr id = "fila5'+c5+'">'+               //nombre : 'fila' + 'numero de tabla' + ' idFila'
                               ' <td colspan="4"><label id="t5_de'+c5+'">'+de+'</label></td>'+ //detalle
                               ' <td><label id="t5_un'+c5+'">'+un+'</td>'+ //tiempo
                               ' <td><label id="t5_ca'+c5+'">'+ca+'</td>'+
                               ' <td><label id="t5_co'+c5+'">'+co+'</td>'+
                               ' <td><label id="t5_to'+c5+'">'+to+'</td>'+
                               ' <td><button type="button" class="btn btn-danger" id='+c5+' onClick="t5_deleted(this.id)">-</button></td>'+
                           ' </tr>'
                $('#tablita5').after(fila)
                document.getElementById("t5_prod").value="";
                document.getElementById("t5_unid").value="---";
                document.getElementById("t5_cant").value=0;
                document.getElementById("t5_cost").value=0;
                document.getElementById("t5_tota").value=0;
                
                //totales
                t5_acCa += parseInt(ca);
                t5_acCo += parseFloat(convertToFloat(co));
                t5_acTo += parseFloat(convertToFloat(to));
                t5_totales();
                   
            }
            function t5_deleted(d)
            {
                var ca = document.getElementById("t5_ca"+d).innerHTML;
                var co = document.getElementById("t5_co"+d).innerHTML;
                var to = document.getElementById("t5_to"+d).innerHTML;
                t5_acCa -= parseInt(ca);
                t5_acCo -= parseFloat(convertToFloat(co));
                t5_acTo -= parseFloat(convertToFloat(to));
                t5_totales();
                $("#fila5"+d).remove();
                //c1=c1-1;
            }
            function t5_totales(){
                document.getElementById("t5_ca").innerHTML= t5_acCa;
                document.getElementById("t5_co").innerHTML= t5_acCo.toFixed(2)
                document.getElementById("t5_to").innerHTML= t5_acTo.toFixed(2)
                costosExternos();
            }

            function t6_subTotal()
             {
                var ca = parseInt(document.getElementById("t6_cant").value)
                var co = parseFloat(document.getElementById("t6_cost").value)
                var res = ca*co;
                document.getElementById("t6_tota").value = res.toFixed(2)
            }
    
            
            function t6_addRow(){
                c6=c6+1;
                var de = document.getElementById("t6_prod").value;
                var un = document.getElementById("t6_unid").value;
                var ca = document.getElementById("t6_cant").value;
                var co = document.getElementById("t6_cost").value;
                var to = document.getElementById("t6_tota").value; 
                
                var fila = '<tr id = "fila6'+c6+'">'+               //nombre : 'fila' + 'numero de tabla' + ' idFila'
                               ' <td colspan="4"><label id="t6_de'+c6+'">'+de+'</label></td>'+ //detalle
                               ' <td><label id="t6_un'+c6+'">'+un+'</td>'+ //tiempo
                               ' <td><label id="t6_ca'+c6+'">'+ca+'</td>'+
                               ' <td><label id="t6_co'+c6+'">'+co+'</td>'+
                               ' <td><label id="t6_to'+c6+'">'+to+'</td>'+
                               ' <td><button type="button" class="btn btn-danger" id='+c6+' onClick="t6_deleted(this.id)"></button></td>'+
                           ' </tr>'
                $('#tablita6').after(fila)
                document.getElementById("t6_prod").value="";
                document.getElementById("t6_unid").value="---";
                document.getElementById("t6_cant").value=0;
                document.getElementById("t6_cost").value=0;
                document.getElementById("t6_tota").value=0;
                
                //totales
                t6_acCa += parseInt(ca);
                t6_acCo += parseFloat(convertToFloat(co));
                t6_acTo += parseFloat(convertToFloat(to));
                t6_totales();
                   
            }
            function t6_deleted(d)
            {
                var ca = document.getElementById("t6_ca"+d).innerHTML;
                var co = document.getElementById("t6_co"+d).innerHTML;
                var to = document.getElementById("t6_to"+d).innerHTML;
                t6_acCa -= parseInt(ca);
                t6_acCo -= parseFloat(convertToFloat(co));
                t6_acTo -= parseFloat(convertToFloat(to));
                t6_totales();
                $("#fila6"+d).remove();
                //c1=c1-1;
            }
            function t6_totales(){
                document.getElementById("t6_ca").innerHTML= t6_acCa;
                document.getElementById("t6_co").innerHTML= t6_acCo.toFixed(2)
                document.getElementById("t6_to").innerHTML= t6_acTo.toFixed(2)
                costosExternos();
            }

  //tablita 7
            function t7_subTotal(){
                var ca = parseInt(document.getElementById("t7_cant").value)
                var co = parseFloat(document.getElementById("t7_cost").value)
                var res = ca*co;
                document.getElementById("t7_tota").value = res.toFixed(2)
            }
            
            function t7_addRow(){
                c7=c7+1;
                var de = document.getElementById("t7_prod").value;
                var un = document.getElementById("t7_unid").value;
                var ca = document.getElementById("t7_cant").value;
                var co = document.getElementById("t7_cost").value;
                var to = document.getElementById("t7_tota").value; 
                
                var fila = '<tr id = "fila7'+c7+'">'+               //nombre : 'fila' + 'numero de tabla' + ' idFila'
                               ' <td colspan="4"><label id="t7_de'+c7+'">'+de+'</label></td>'+ //detalle
                               ' <td><label id="t7_un'+c7+'">'+un+'</td>'+ //tiempo
                               ' <td><label id="t7_ca'+c7+'">'+ca+'</td>'+
                               ' <td><label id="t7_co'+c7+'">'+co+'</td>'+
                               ' <td><label id="t7_to'+c7+'">'+to+'</td>'+
                               ' <td><button type="button" class="btn btn-danger" id='+c7+' onClick="t7_deleted(this.id)">x</button></td>'+
                           ' </tr>'
                $('#tablita7').after(fila)
                document.getElementById("t7_prod").value="";
                document.getElementById("t7_unid").value="---";
                document.getElementById("t7_cant").value=0;
                document.getElementById("t7_cost").value=0;
                document.getElementById("t7_tota").value=0;
                
                //totales
                t7_acCa += parseInt(ca);
                t7_acCo += parseFloat(convertToFloat(co));
                t7_acTo += parseFloat(convertToFloat(to));
                t7_totales();
                   
            }
            function t7_deleted(d)
            {
                var ca = document.getElementById("t7_ca"+d).innerHTML;
                var co = document.getElementById("t7_co"+d).innerHTML;
                var to = document.getElementById("t7_to"+d).innerHTML;
                t7_acCa -= parseInt(ca);
                t7_acCo -= parseFloat(convertToFloat(co));
                t7_acTo -= parseFloat(convertToFloat(to));
                t7_totales();
                $("#fila7"+d).remove();
                //c1=c1-1;
            }
            function t7_totales(){
                document.getElementById("t7_ca").innerHTML= t7_acCa;
                document.getElementById("t7_co").innerHTML= t7_acCo.toFixed(2)
                document.getElementById("t7_to").innerHTML= t7_acTo.toFixed(2)
                costosExternos();
            }

            
            function costosExternos(){
                var costoTotalProyecto =0;
                //TOTALES
                var cp1 = convertToFloat($('#t1_ca').text());
                var cp2 = convertToFloat($('#t2_cp').text());
                var ca1 = convertToFloat($('#t2_ca').text());
                var cantidadPersonas = parseInt(cp1) + parseInt(cp2);
                $('#tcp').text(cantidadPersonas.toFixed(2))             //total cantidad de personas
                var cantidadActivaciones = parseInt(ca1) * parseInt(cp2);
                $('#tca').text(cantidadActivaciones)    //total cantidad de activaciones

                $('#ttt').text($('#t2_t2').text());    //Totales
                
                //COSTOS INDIRECTOS DEL PROYECTO
                var to1 = convertToFloat($('#t1_co').text());
                
                var to3 = convertToFloat($('#t3_to').text());               
                var to4 = convertToFloat($('#t4_to').text());
                var to7 = convertToFloat($('#t7_to').text());
                var tot = convertToFloat($('#ttt').text());
                var costoAcumuladoP = parseFloat(to1) + parseFloat(to4) + parseFloat(to7) + parseFloat(tot) + parseFloat(to3);
                $('#cap').text(costoAcumuladoP.toFixed(2)) //costo acumulado programado
                ubi = $('#dir').val()
                var tasa=0;
                if(ubi=="COCHABAMBA"){
                    tasa = 0.17
                }
                if(ubi=="SANTA CRUZ"){
                    tasa = 0.21
                }
                $('#tda').text(tasa) // tasa de aplicacion
                var capp = convertToFloat($('#cap').text());
                var taff = convertToFloat($('#tda').text());
                var costoprog = parseFloat(capp) * parseFloat(taff)
                $('#cpc').text(costoprog.toFixed(2)) // costo programado de costos indirectos

                //COSTOS FINANCIEROS

                $('#tio').text($('#tiempoC').val());    // Tiempo programado
                var tasaF  = 0.17;
                var horasAnio = 2496;
                var tasaHoraAnio = parseFloat(tasaF) / parseFloat(horasAnio)
                var tasaFinanciera = tasaHoraAnio *8;
                tasaFinanciera = tasaFinanciera*100;
                $('#taf').text((tasaFinanciera.toFixed(5)));         // Tasa financiera

                var tiem = parseInt($('#tio').text());
                var costoFinanciero = tiem*(tasaFinanciera/100)*(costoAcumuladoP+costoprog) //OJO FALTA SUMAR GASTOS AUXILIARES
                $('#ctp').text(costoFinanciero.toFixed(2)) //costo total programado financiero


                //TOTAL PRESUPUESTADO
                var to5 = convertToFloat($('#t5_to').text());
                var to6 = convertToFloat($('#t6_to').text());
                costoTotalProyecto = parseFloat(costoprog) + parseFloat(costoFinanciero) + parseFloat(costoAcumuladoP) + parseFloat(to5) + parseFloat(to6);
                $('#tp1').text(costoTotalProyecto.toFixed(2))  //costo total del proyecto

                //FEE
                var feep = 0;
                if(costoTotalProyecto<50000){
                    feep = 0.16;
                }
                else
                    feep = 0.15;
                feep=feep*100;
                $('#feeP').text(feep+'%');  //FEE PROGRAMADO


                var exoin = $('#exoin').val()
                 var feev = $('#feeV').val()
                 var FE =0;
                if(exoin=="INTERNO"){
                    $('#tp2').text($('#tp1').text());
                    $('#tp3').text($('#tp1').text());
                    $('#tp4').text($('#tp1').text());
                }
                if(exoin=="EXTERNO"){
                    var b;
                    var feev2="";
                    for(b=0 ; b<feev.length ; b++){
                        if(feev[b]!='%')
                            feev2 = feev2+feev[b];
                    }
                    var porcentaje = parseFloat(feev2);
                    if(feeP==0)
                        FE = costoTotalProyecto * (feep/100)
                    else
                        FE = costoTotalProyecto * (porcentaje/100)
                    $('#tp2').text(FE.toFixed(2)) //FEE PROGRAMADO en total presupuestado

                    var proyectoFee = FE + costoTotalProyecto;
                    $('#tp3').text(proyectoFee.toFixed(2)) //COSTO PROYECTO MAS FEE

                    var costoMasImpuestos = proyectoFee/0.84;
                    $('#tp4').text(costoMasImpuestos.toFixed(2)) //Costo del proyecto mas impuestos

                }

            }
//variables tablita 1     
var c1=0;
var t1_acTa=0;
var t1_acCo=0;
var t1_acTi=0;
var t1_acCa=0;       

//variables tablita 2    
var c2=0;
var t2_acTot=0;      

//variables tablita 3
c3=0;
var t3_acTot=0;


//costos externos
var sum = 0;
var ubi;
var tasa = 0;
var r1 = 0;
            function  activacoma(nStr){
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

//TABLITA 1
            function t1_subTotal(){
                var ti = document.getElementById("t1_tiem").value
                var ca = parseInt(document.getElementById("t1_cant").value)
                var tip = parseFloat(document.getElementById("t1_tieP").value)
                var det = document.getElementById("t1_deta").value
                /*
                                 HORAS  DIAS
                EJECUTIVO DE CUENTA 26  208
                DISEÑADORA          27  216
                AXULIAR IMPRESIÓN   15  120
                ENCARGADO DE TALLER 28  224
                AUXILIAR DE TALLER  16  128

                */
                var valorTasa= 0
                if(ti=="DIAS"){
                    if(det == "EJECUTIVO DE CUENTA")
                        valorTasa=208
                    if(det == "DISEÑADORA")
                        valorTasa=216
                    if(det == "AUXILIAR IMPRESION")
                        valorTasa=120
                    if(det == "ENCARGADO DE TALLER")
                        valorTasa=224
                    if(det == "AUXILIAR DE TALLER")
                        valorTasa=128
                }
                if (ti=="HORAS"){ 
                    if(det == "EJECUTIVO DE CUENTA")
                        valorTasa=26
                    if(det == "DISEÑADORA")
                        valorTasa=27
                    if(det == "AUXILIAR IMPRESION")
                        valorTasa=15
                    if(det == "ENCARGADO DE TALLER")
                        valorTasa=28
                    if(det == "AUXILIAR DE TALLER")
                        valorTasa=16
                }
                var costoT = tip*ca*valorTasa;
                document.getElementById("t1_tasa").value =  valorTasa.toFixed(2);
                document.getElementById("t1_cost").value =  costoT.toFixed(2);
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
                               ' <td><button type="button" class="btn btn-danger" id='+c1+' onClick="t1_deleted(this.id)">x</button></td>'+
                           ' </tr>'
                $('#tablita1').after(fila)
                document.getElementById("t1_deta").value="DISEÑADORA";
                document.getElementById("t1_tiem").value="HORAS";
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
                document.getElementById("t1_tp").innerHTML= t1_acTi;
                document.getElementById("t1_ca").innerHTML= t1_acCa;
                document.getElementById("t1_ta").innerHTML=  t1_acTa.toFixed(2);
                document.getElementById("t1_co").innerHTML=  t1_acCo.toFixed(2);
            costosExternos();
            }
    //tablita 2
            function t2_subTotal(){
                var can = parseInt(document.getElementById("t2_cant").value)
                var cos = parseFloat(document.getElementById("t2_cost").value)
                var doc = document.getElementById("t2_docu").value
                var val=0;
                if((doc=="FACTURA")||(doc=="ALMACEN")){
                  val = can*cos
                }
                if(doc=="RECIBO"){
                  val = (can*cos)/0.92;
                }
                document.getElementById("t2_tota").value =  val.toFixed(2)
            }
            
            function t2_addRow(){
                c2=c2+1
                var ma = document.getElementById("t2_mate").value
                var pr = document.getElementById("t2_prov").value
                var un = document.getElementById("t2_unid").value
                var ca = document.getElementById("t2_cant").value
                var co = document.getElementById("t2_cost").value
                var doc = document.getElementById("t2_docu").value
                var to = document.getElementById("t2_tota").value

                var fila = '<tr id = "fila2'+c2+'">'+
                                '<td colspan="2"><label id="t2_ma'+c2+'">'+ma+'</label></td>'+
                                '<td><label id="t2_pr'+c2+'">'+pr+'</label></td>'+
                                '<td><label id="t2_un'+c2+'">'+un+'</label></td>'+
                                '<td><label id="t2_ca'+c2+'">'+ca+'</label></td>'+
                                '<td><label id="t2_co'+c2+'">'+co+'</label></td>'+
                                '<td><label id="t2_do'+c2+'">'+doc+'</label></td>'+
                                '<td><label id="t2_to'+c2+'">'+to+'</label></td>'+
                                '<td><button type="button" id='+c2+' class="btn btn-danger" onClick="t2_deleted(this.id)">x</button></td>'+
                            '</tr>'
                $('#tablita2').after(fila)
                document.getElementById("t2_mate").value=""
                document.getElementById("t2_prov").value=""
                document.getElementById("t2_unid").value=""
                document.getElementById("t2_cant").value=0
                document.getElementById("t2_cost").value=0
                document.getElementById("t2_docu").value="FACTURA"
                document.getElementById("t2_tota").value=0
                
                //totales
                //t2_acCan+=parseInt(ca)
                //t2_acCos+=parseFloat(convertToFloat(co))
                t2_acTot+=parseFloat(convertToFloat(to))
                t2_totales()
                   
            }
            function t2_deleted(d)
            {
                var ca = document.getElementById("t2_ca"+d).innerHTML;
                var co = document.getElementById("t2_co"+d).innerHTML;
                var to = document.getElementById("t2_to"+d).innerHTML;
                
                //t2_acCan+=parseInt(ca)
                //t2_acCos+=parseFloat(convertToFloat(co))
                t2_acTot-=parseFloat(convertToFloat(to))
                t2_totales()
                
                $("#fila2"+d).remove();
                //c1=c1-1;
            }
            function t2_totales()
            {

                //document.getElementById("t2_ca").innerHTML= t2_acCan);
                //document.getElementById("t2_co").innerHTML= t2_acCos.toFixed(2));
                document.getElementById("t2_to").innerHTML= t2_acTot.toFixed(2);
            costosExternos();
            }

            function t3_subTotal(){
                var can = parseInt(document.getElementById("t3_cant").value)
                var cos = parseFloat(document.getElementById("t3_cost").value)
                var doc = document.getElementById("t3_docu").value
                var val=0;
                /*
                Factura : 0.87  
                Recibo: 0.845
                Valorados: 1
                Alquiler con recibos: 0.84
                */
                if(doc=="FACTURA"){
                  val = 0.87;
                  val = (can * cos) / val;
                }
                else
                    if(doc=="RECIBO"){
                      val = 0.845;
                      val = can * cos * val;
                    }
                    else 
                        if(doc=="VALORADO"){
                            val = 1;
                            val = (can * cos) / val;
                        }
                        else
                            if(doc=="ALQUILER CON RECIBO"){
                                val = 0.84;
                                val = can * cos * val;
                            }

                document.getElementById("t3_coTo").value = val.toFixed(2)
            }
            
            function t3_addRow(){
                c3=c3+1
                var se = document.getElementById("t3_serv").value
                var no = document.getElementById("t3_nomb").value
                var ca = document.getElementById("t3_cant").value
                var co = document.getElementById("t3_cost").value
                var doc = document.getElementById("t3_docu").value
                var to = document.getElementById("t3_coTo").value

                var fila =      '<tr id = "fila3'+c3+'">'+
                                '<td colspan="2"><label id="t3_serv'+c3+'">'+se+'</label></td>'+
                                '<td colspan="2"><label id="t3_nomb'+c3+'">'+no+'</label></td>'+
                                '<td><label id="t3_cant'+c3+'">'+ca+'</label></td>'+
                                '<td><label id="t3_cost'+c3+'">'+co+'</label></td>'+
                                '<td><label id="t3_docu'+c3+'">'+doc+'</label></td>'+
                                '<td><label id="t3_coTo'+c3+'">'+to+'</label></td>'+
                                '<td><button type="button" id='+c3+' class="btn btn-danger" onClick="t3_deleted(this.id)">-</button></td>'+
                            '</tr>'
                $('#tablita3').after(fila)
                document.getElementById("t3_serv").value=""
                document.getElementById("t3_nomb").value=""
                document.getElementById("t3_cant").value=0
                document.getElementById("t3_cost").value=0
                document.getElementById("t3_docu").value="FACTURA"
                document.getElementById("t3_coTo").value=0
                
                //totales
                //t2_acCan+=parseInt(ca)
                //t2_acCos+=parseFloat(convertToFloat(co))
                t3_acTot+=parseFloat(convertToFloat(to))
                t3_totales()
                   
            }
            function t3_deleted(d)
            {
                var to = document.getElementById("t3_coTo"+d).innerHTML;
                
                //t2_acCan+=parseInt(ca)
                //t2_acCos+=parseFloat(convertToFloat(co))
                t3_acTot-=parseFloat(convertToFloat(to))
                t3_totales()
                
                $("#fila3"+d).remove();
                //c1=c1-1;
            }
            function t3_totales()
            {

                //document.getElementById("t2_ca").innerHTML= t2_acCan);
                //document.getElementById("t2_co").innerHTML= t2_acCos.toFixed(2));
                document.getElementById("t3_to").innerHTML=t3_acTot.toFixed(2);
                costosExternos();
            }
            
            function costosExternos()
            {
                //COSTOS INDIRECTOS DE OPERACIONES
                var to1 = convertToFloat($('#t1_co').text())
                var to2 = convertToFloat($('#t2_to').text())
                var to3 = convertToFloat($('#t3_to').text())
                sum = parseFloat(to1)+parseFloat(to2)+parseFloat(to3);
                ubi = $('#dir').val()
                if(ubi=="COCHABAMBA"){
                    tasa = 0.17
                }
                if(ubi=="SANTA CRUZ"){
                    tasa = 0.21
                }
                r1 = parseFloat(tasa * sum);
                $('#cap').text(sum.toFixed(2));         //COSTO ACUMULADO PROGRAMADO
                $('#tda').text(tasa.toFixed(2));        //TASA DE APLICACION 
                $('#cpd').text(r1.toFixed(2));          //COSTO PROGRAMADO DE COSTOS INDIRECTOS

                //COSTO FINANCIERO
                var credito = $('#tiempoCredito').val();
                var tasaF  = 0.17;
                var horasAnio = 2496;
                var tasaHoraAnio = parseFloat(tasaF) / parseFloat(horasAnio)
                var tasaFinanciera = tasaHoraAnio *8;
                tasaFinanciera = tasaFinanciera*100;
                var costototalpro = (tasaFinanciera/100)*parseFloat(credito)*(sum+r1);

                $('#tip').text(credito);                   // Tiempo programado
                $('#taf').text((tasaFinanciera.toFixed(4))+"%");    //Tasa financiera
                $('#ctp').text(costototalpro.toFixed(2));           //costo total programado financiero

                //COSTO TOTAL DEL PROYECTO
                var totalProyecto = sum+costototalpro+r1;
                $('#to1').text(totalProyecto.toFixed(2));   //COSTO TOTAL DEL PROYECTO

                //FEE
                if(to1<=5000)
                    feeP = 0.17
                else
                if(to1<=50000)
                    feeP = 0.16
                else
                if(to1>50000)
                    feeP = 0.15
                $('#feeP').text((feeP*100).toFixed(0)+'%') //F.E.E. programado
                                                            //FEEV Typeado por usuario

                //TOTALES
                var clase = $('#tipo').val()
                var feev = $('#feeV').val()
                var feeep = 0;
                if(clase=="EXTERNO"){
                    var b;
                    var feev2="";
                    for(b=0 ; b<feev.length ; b++){
                        if(feev[b]!='%')
                            feev2 = feev2+feev[b];
                    }
                    var porcentaje = parseFloat(feev2);
                    if(porcentaje>0){
                        feeep = totalProyecto * (porcentaje/100);
                         
                    }
                    else{
                        feeep = totalProyecto * feeP;
                    }
                    var proyectoFeee = feeep+totalProyecto;
                    var conImpuestos = proyectoFeee/0.84;
                    $('#to2').text(feeep.toFixed(2)); //FEE total ejecutado
                    $('#to3').text(proyectoFeee.toFixed(2)); //COSTO PROYECTO MAS FEEE
                    $('#to4').text(conImpuestos.toFixed(2)); //COSTO TOTAL DEL PROYECTO CON IMPUESTOS

                }   
                if(clase=="INTERNO"){
                    $('#to2').text($('#to1').text());
                    $('#to3').text($('#to1').text());
                    $('#to4').text($('#to1').text());
                    
                }

                //PUNTO DE REFERENCIA
                $('#hoja').text($('#to4').text());  // PRECIO DE HOJA DE COSTO
                $('#pdf').text($('#prize').val());    //PRECIO PDF

                var price = parseFloat($('#prize').val())
                var diferencia = price - conImpuestos;
                 $('#dif').text(diferencia.toFixed(2));
            }
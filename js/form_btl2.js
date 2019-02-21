
//variables tablita1 y 2
var aguinaldo=0;
var accidente=0;
var vacaciones=0;
var subsidio=0;
var desahucio=0;
var bonoM=0;
var bonoT=0;
var bonoA=0;
var totalBonos=0;
var c2=0;

var t2_acCant=0;
var t2_acLiqu=0;
var t2_acTot1=0;
var t2_acTot2=0;

//variables tablita 3

var c3=0;
var t3_acSub=0;
var t3_acTot=0;


//variables tablita 4
var c4=0;
var t4_acSub=0;
var t4_acTot=0;

//variables tablita 5
var c5=0;
var t5_acSub=0;
var t5_acTot=0;

			function t1_totales(){
				aguinaldo=parseFloat($('#patron1').val());
				accidente=parseFloat($('#patron2').val());
				vacaciones=parseFloat($('#patron3').val());
				subsidio=parseFloat($('#patron4').val());
				desahucio=parseFloat($('#patron5').val());
				bonoM=parseFloat($('#bono1').val());
				bonoT=parseFloat($('#bono2').val());
				bonoA=parseFloat($('#bono3').val());
				totalBonos=bonoM+bonoT+bonoA;
                t2_subTotal();
			}

			function t2_subTotal(){
                var cantidad = parseInt(document.getElementById("t2_cant").value)
                var liquido = parseFloat(document.getElementById("t2_liqu").value)
                var prueba = "NO"; //FALTA UN INPUT TEXT
                var valorP=0;

                /* Porcentajes de aportes laborales para la suma 2
                Fondo de Capitalización Individual			10,00%
				Prima riesgo comun							1,71%
				Comisión AFP								0,50%
				Aporte solidario							0,50%
				TOTAL          								12.71%
				*/
				var porcentajesLaborales = 12.71;
				/* Porcentajes de Aportes Patronales				
				Caja Nacional de Salud				10,00%
				Aporte solidario					3,00%
				AFP´s								3,71%
				Previsión Aguinaldo 				si hay periodo de prueba -> 0  si no hay -> 8.33%
				Provisión Indemnización				si hay periodo de prueba -> 0  si no hay -> 8.33%
				Previsión Segundo  Aguinaldo 		valores introducidos por usuario
				Seguro de Accidente					valores introducidos por usuario
				Vacaciones 							valores introducidos por usuario
				Previsicion de Desahucio			valores introducidos por usuario
				Total 								---
				*/
				if(prueba=="NO"){
					valorP=8.33;
				}
				else
					valorP=0;
                if(liquido==0){
                    totalBonos=0;
                }
                else{
                    totalBonos=bonoM+bonoT+bonoA;
                }
				var porcentajesPatronales=10+3+3.71+valorP+valorP+aguinaldo+accidente+vacaciones+desahucio; 
                var sum1 = liquido;
                var sum2 = (((liquido*100)/87.29)-liquido)+(totalBonos *(porcentajesLaborales/100)); //12.71%
                var sum3 = (liquido+totalBonos+282.78)*(porcentajesPatronales/100);
                var sum4 = totalBonos;
                
                var totalCargasSociales = sum1+sum2+sum3+sum4;
                document.getElementById("t2_tot1").value = totalCargasSociales.toFixed(2);
                document.getElementById("t2_tot2").value = (totalCargasSociales*cantidad).toFixed(2);
                
            }
            
            function t2_addRow(){
                c2=c2+1
                var ci = document.getElementById("t2_ciud").value
                var de = document.getElementById("t2_desc").value
                var ca = document.getElementById("t2_cant").value
                var li = document.getElementById("t2_liqu").value
                var t1 = document.getElementById("t2_tot1").value
                var t2 = document.getElementById("t2_tot2").value
                
                
                var fila = '<tr id = "fila2'+c2+'">'+
                                '<td colspan="2"><label id="t2_ci'+c2+'">'+ci+'</label></td>'+
                                '<td colspan="2"><label id="t2_de'+c2+'">'+de+'</label></td>'+
                                '<td><label id="t2_ca'+c2+'">'+ca+'</label></td>'+
                                '<td><label id="t2_li'+c2+'">'+li+'</label></td>'+
                                '<td><label id="t2_t1'+c2+'">'+t1+'</label></td>'+
                                '<td><label id="t2_t2'+c2+'">'+t2+'</label></td>'+
                                '<td><button type="button" id='+c2+' class="btn btn-danger" onClick="t2_deleted(this.id)">-</button></td>'+
                            '</tr>'
                $('#t2').after(fila)
                document.getElementById("t2_ciud").value="LA PAZ"
                document.getElementById("t2_desc").value=""
				document.getElementById("t2_cant").value=0
				document.getElementById("t2_liqu").value=0
				document.getElementById("t2_tot1").value=0
				document.getElementById("t2_tot2").value=0
                
                //totales
                t2_acCant+=parseInt(ca);
				t2_acLiqu+=parseFloat(li);
				t2_acTot1+=parseFloat(t1);
				t2_acTot2+=parseFloat(t2);
                t2_totales()
            }
            function t2_deleted(d)
            {
                var ca = document.getElementById("t2_ca"+d).innerHTML;
                var li = document.getElementById("t2_li"+d).innerHTML;
                var t1 = document.getElementById("t2_t1"+d).innerHTML;
                var t2 = document.getElementById("t2_t2"+d).innerHTML;
                
                t2_acCant-=parseInt(ca);
				t2_acLiqu-=parseFloat(li);
				t2_acTot1-=parseFloat(t1);
				t2_acTot2-=parseFloat(t2);
                t2_totales()
                
                $("#fila2"+d).remove();
                //c1=c1-1;
            }
            function t2_totales()
            {

                document.getElementById("t2_ca").innerHTML=t2_acCant.toFixed(2);
				document.getElementById("t2_li").innerHTML=t2_acLiqu.toFixed(2);
				document.getElementById("t2_t1").innerHTML=t2_acTot1.toFixed(2);
				document.getElementById("t2_t2").innerHTML=t2_acTot2.toFixed(2);
                costosExternos();
            }
            function t3_subTotal(){
                var can = parseInt(document.getElementById("t3_cant").value)
                var cos = document.getElementById("t3_cost").value

                var doc = document.getElementById("t3_docu").value
                var val=0;
                if((doc=="FACTURA")||(doc=="ALMACEN")){
                  val = can*cos;
                }
                if(doc=="RECIBO"){
                  val = (can*cos)/0.92;
                }
                document.getElementById("t3_subt").value = (can*cos).toFixed(2)
                document.getElementById("t3_tota").value = val.toFixed(2)
            }
            
            function t3_addRow(){
                c3=c3+1
                var ma = document.getElementById("t3_mate").value
                var un = document.getElementById("t3_unid").value
                var ca = document.getElementById("t3_cant").value
                var co = document.getElementById("t3_cost").value
                var su = document.getElementById("t3_subt").value
                var dc = document.getElementById("t3_docu").value
                var to = document.getElementById("t3_tota").value

                var fila = '<tr id = "fila3'+c3+'">'+
                                '<td colspan="2"><label id="t3_ma'+c3+'">'+ma+'</label></td>'+
                                '<td><label id="t3_un'+c3+'">'+un+'</label></td>'+
                                '<td><label id="t3_ca'+c3+'">'+ca+'</label></td>'+
                                '<td><label id="t3_co'+c3+'">'+co+'</label></td>'+
                                '<td><label id="t3_su'+c3+'">'+su+'</label></td>'+
                                '<td><label id="t3_dc'+c3+'">'+dc+'</label></td>'+
                                '<td><label id="t3_to'+c3+'">'+to+'</label></td>'+
                                '<td><button type="button" id='+c3+' class="btn btn-danger" onClick="t3_deleted(this.id)">-</button></td>'+
                            '</tr>'
                $('#t3').after(fila)
                document.getElementById("t3_mate").value=""
                //document.getElementById("t3_prov").value="---"
                //document.getElementById("t3_unid").value="PIEZAS"
                document.getElementById("t3_cant").value=0
                document.getElementById("t3_cost").value=0
                document.getElementById("t3_subt").value=0
                document.getElementById("t3_docu").value="FACTURA"
                document.getElementById("t3_tota").value=0
                
                //totales
                t3_acSub+=parseFloat(su)
                t3_acTot+=parseFloat(to)
                t3_totales()
                   
            }
            function t3_deleted(d)
            {
                var su = document.getElementById("t3_su"+d).innerHTML;
                var to = document.getElementById("t3_to"+d).innerHTML;
                
                t3_acSub-=parseFloat(su)
                t3_acTot-=parseFloat(to)
                t3_totales()
                
                $("#fila3"+d).remove();
                //c1=c1-1;
            }
            function t3_totales()
            {

                document.getElementById("t3_su").innerHTML=t3_acSub.toFixed(2)
                document.getElementById("t3_to").innerHTML=t3_acTot.toFixed(2)
                costosExternos();
            }

            function t4_subTotal(){
                var can = parseInt(document.getElementById("t4_cant").value)
                var cos = parseFloat(document.getElementById("t4_prec").value)
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
                if(doc=="VIATICO"){
                  val = (can*cos)/0.87;
                }
                document.getElementById("t4_subt").value = (can*cos).toFixed(2)
                document.getElementById("t4_tota").value = val.toFixed(2)
            }
            
            function t4_addRow(){
                c4=c4+1
                var se = document.getElementById("t4_serv").value
                var ca = document.getElementById("t4_cant").value
                var pr = document.getElementById("t4_prec").value
                var su = document.getElementById("t4_subt").value
                var dc = document.getElementById("t4_docu").value
                var to = document.getElementById("t4_tota").value

                var fila = '<tr id = "fila4'+c4+'">'+
                                '<td colspan="2"><label id="t4_se'+c4+'">'+se+'</label></td>'+
                                '<td><label id="t4_ca'+c4+'">'+ca+'</label></td>'+
                                '<td><label id="t4_pr'+c4+'">'+pr+'</label></td>'+
                                '<td><label id="t4_su'+c4+'">'+su+'</label></td>'+
                                '<td><label id="t4_dc'+c4+'">'+dc+'</label></td>'+
                                '<td><label id="t4_to'+c4+'">'+to+'</label></td>'+
                                '<td><button type="button" id='+c4+' class="btn btn-danger" onClick="t4_deleted(this.id)">-</button></td>'+
                            '</tr>'
                $('#t4').after(fila)
                document.getElementById("t4_serv").value=""
                //document.getElementById("t3_prov").value="---"
                //document.getElementById("t3_unid").value="PIEZAS"
                document.getElementById("t4_cant").value=0
                document.getElementById("t4_prec").value=0
                document.getElementById("t4_docu").value="FACTURA"
                document.getElementById("t4_tota").value=0
                document.getElementById("t4_subt").value=0
                
                //totales
                t4_acSub+=parseFloat(su)
                t4_acTot+=parseFloat(to)
                t4_totales()
                   
            }
            function t4_deleted(d)
            {
                var su = document.getElementById("t4_su"+d).innerHTML;
                var to = document.getElementById("t4_to"+d).innerHTML;
                
                t4_acSub-=parseFloat(su)
				t4_acTot-=parseFloat(to)
				t4_totales()
                
                $("#fila4"+d).remove();
                //c1=c1-1;
            }
            function t4_totales()
            {

                document.getElementById("t4_su").innerHTML=t4_acSub.toFixed(2)
                document.getElementById("t4_to").innerHTML=t4_acTot.toFixed(2)
                costosExternos();
            }

            function t5_subTotal(){
                var por = document.getElementById("t5_porc").value
                var valor = parseFloat($('#cpc').val())
                var i=0;
                var nuevo="";
                for(i=0;i<por.length;i++)
                	if(por[i]!='%')
                		nuevo +=por[i];
                nuevo = parseFloat(nuevo);
                nuevo = valor * nuevo/100;
                document.getElementById("t5_cost").value = nuevo.toFixed(2);
            }
            
            function t5_addRow(){
                c5=c5+1
                var pe = document.getElementById("t5_pers").value
                var po = document.getElementById("t5_porc").value
                var co = document.getElementById("t5_cost").value

                var fila = '<tr id = "fila5'+c5+'">'+
                                '<td colspan="4"><label id="t5_pe'+c5+'">'+pe+'</label></td>'+
                                '<td colspan="2"><label id="t5_po'+c5+'">'+po+'</label></td>'+
                                '<td colspan="2"><label id="t5_co'+c5+'">'+co+'</label></td>'+
                                '<td><button type="button" id='+c5+' class="btn btn-danger" onClick="t5_deleted(this.id)">-</button></td>'+
                            '</tr>'
                $('#t5').after(fila)
                document.getElementById("t5_pers").value="SERVICIOS GERENCIA GENERAL"
                //document.getElementById("t3_prov").value="---"
                //document.getElementById("t3_unid").value="PIEZAS"
                document.getElementById("t5_porc").value=0
                document.getElementById("t5_cost").value=0
                
                //totales
                t5_acSub+=parseFloat(po)
                t5_acTot+=parseFloat(co)
                t5_totales()
                   
            }
            function t5_deleted(d)
            {
                var su = document.getElementById("t5_t1"+d).innerHTML;
                var to = document.getElementById("t5_t2"+d).innerHTML;
                
                t3_acSub-=parseFloat(su)
                t3_acTot-=parseFloat(to)
                t5_totales()
                
                $("#fila5"+d).remove();
                //c1=c1-1;
            }
            function t5_totales()
            {

                document.getElementById("t5_t1").innerHTML=t5_acSub.toFixed(2)
                document.getElementById("t5_t2").innerHTML=t5_acTot.toFixed(2)
                costosExternos();
            }
            function costosExternos()
            {
                //COSTOS INDIRECTOS DEL PROYECTO
                var to2 = parseFloat($('#t2_t2').text())
                var to3 = parseFloat($('#t3_to').text())
                var to4 = parseFloat($('#t4_to').text())
                var gastosAux=0; //SIN HOJA DE GASTOS AUXILIARES
                var totales = to2 + to3 + to4 + gastosAux;

                $('#cap').val(totales.toFixed(2));         //Costo acumulado programado
                $('#tda').val("0.17");                     //Tasa de aplicacion
                $('#cpc').val((totales*0.17).toFixed(2));  //Costo programado de costos indirectos
                

                //COSTO FINANCIERO
                var credito = parseInt($('#tiempoC').val());
                var tasaF  = 0.17;
                var horasAnio = 2496;
                var tasaHoraAnio = parseFloat(tasaF) / parseFloat(horasAnio)
                var tasaFinanciera = tasaHoraAnio *8;
                tasaFinanciera = tasaFinanciera*100;
                var totalGastosAdministrativos = 0;         //SIN HOJA DE GASTOS AUXILIARES
                var costototalpro = credito*(tasaFinanciera/100)*(totalGastosAdministrativos+(to2+to3+to4))

                $('#tio').val(credito);                   // Tiempo programado
                $('#taf').val((tasaFinanciera.toFixed(4))+"%");    //Tasa financiera
                $('#ctp').val(costototalpro.toFixed(2));           //costo total programado financiero

                //COSTO TOTAL DEL PROYECTO
                var meses=12;
                var totalProyecto = (costototalpro+totalGastosAdministrativos+to2)+((to3+to4)/meses);
                $('#tp1').val(totalProyecto.toFixed(2));   //COSTO TOTAL DEL PROYECTO


                //TOTALES
                var feev = $('#feeV').val()
                    var b;
                    var feev2="";
                    for(b=0 ; b<feev.length ; b++){
                        if(feev[b]!='%')
                            feev2 = feev2+feev[b];
                    }
                    var porcentaje = parseFloat(feev2);
                    var feep = (porcentaje/100)*totalProyecto;
                    $('#tp2').val(feep.toFixed(2)); //FEEP DEL TOTAL PRESUPUESTADO

                    var proyectoFee = feep+totalProyecto;
                    $('#tp3').val(proyectoFee.toFixed(2)); //COSTO PROYECTO MAS FEEE
                    var conImpuestos = proyectoFee/0.84;
                    $('#tp4').val(conImpuestos.toFixed(2)); //COSTO TOTAL DEL PROYECTO CON IMPUESTOS

            }
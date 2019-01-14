//variables tablita 1     
var c1=0;
var t1_acTa=0;
var t1_acCo=0;
var t1_acTi=0;
var t1_acCa=0;       

//variables tablita 2    
var c2=0;
var t2_acTot=0;      

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

//TABLITA 1
                function t1_subTotal(){
                var ti = document.getElementById("t1_tiem").value
                var ca = parseInt(document.getElementById("t1_cant").value)
                var tip = parseFloat(document.getElementById("t1_tieP").value)
                
                var valorTasa= 0
                if(ti=="DIAS")
                    valorTasa=208
                if (ti=="HORAS") 
                    valorTasa=26
                var costoT = tip*ca*valorTasa;
                document.getElementById("t1_tasa").value = activacoma(valorTasa.toFixed(2));
                document.getElementById("t1_cost").value = activacoma(costoT.toFixed(2));
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
                $('#tablita1').append(fila)
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
                document.getElementById("t1_ta").innerHTML= activacoma(t1_acTa.toFixed(2));
                document.getElementById("t1_co").innerHTML= activacoma(t1_acCo.toFixed(2));
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
                document.getElementById("t2_tota").value = activacoma(val.toFixed(2))
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
                $('#tablita2').append(fila)
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
                t2_acTot+=parseFloat(convertToFloat(to))
                t2_totales()
                
                $("#fila2"+d).remove();
                //c1=c1-1;
            }
            function t2_totales()
            {

                //document.getElementById("t2_ca").innerHTML=activacoma(t2_acCan);
                //document.getElementById("t2_co").innerHTML=activacoma(t2_acCos.toFixed(2));
                document.getElementById("t2_to").innerHTML=activacoma(t2_acTot.toFixed(2));
            }
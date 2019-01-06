//Variables tablita 1
//Segun excel -> Hora: 26     Dia: 208
var c1=0;
var t1_tasaTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
var t1_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

//tablita 1
			function t1_subTotal(a){
                var ti = document.getElementById("t1_can"+a).value
                var ca = parseFloat(document.getElementById("t1_can"+a).value)
                var tip = parseFloat(document.getElementById("t1_tip"+a).value)
                
                var val = 0
                if(ti=="DIAS")
                	val=208
                if (ti=="HORAS") 
                	val=26
                var costoT = ti*ca*val;
                t1_tasaTotal[a] = costoT.toFixed(2);
                t1_costoTotal[a]=costoT.toFixed(2);

                costoT = activacoma(costoT.toFixed(2));
                document.getElementById("t1_tot"+a).value =  costoT;
                actualizarTotalT1();
            }

            function actualizarTotalT1(){
                var acCosto=0;
                var acPrecio=0;
                var i =0;
                for(i=0;i<=c1;i++){
                    acCosto+= parseFloat(t1_costoTotal[i]);
                    acPrecio+= parseFloat(t1_precio[i]);
                }
                //acCosto = activacoma(acCosto);
                //acPrecio = activacoma(acPrecio);
                document.getElementById("t1_costoT").innerHTML= activacoma(acCosto.toFixed(2));
                document.getElementById("t1_cantidad").innerHTML= activacoma(acPrecio.toFixed(2));
                document.getElementById("t1_cantidad").innerHTML= activacoma(acPrecio.toFixed(2));
                  
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

            function addRow_t1(){
                c1=c1+1;
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

                $('#tablita1').append(fila);
                actualizarTotalT2(c2);
            }
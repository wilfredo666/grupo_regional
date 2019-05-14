// variables globales
var tasaAplicacion = 0.14;//tasa de aplicacion
var tasFinanciera = 0.054;//tasa financiera
// funciones globales
function calcular(){

}
function inicio(){
    document.getElementById("tasaDa").value=tasaAplicacion
    document.getElementById("tasaFi").value=tasFinanciera
}//valores que se cargan a cargar la pagina
function dias_credito_manual(){
    document.getElementById("tiempoPr").value=document.getElementById("number").value
}//tiempo de credito a tiempo programado (manualmente)
function costosExternos(){

    var total_item = 0;
    var costo_indirecto=0;
    var te1=0;
    var tiempoP=0;
    var costo_financiero=0;
    var cf1=0;
    var cf2=0;
    var costo_proyecto=0;
    var tot_item_sin_fee=0;
    var fee=0;
    var fee_de_cot=0;
    var cot_mas_fee=0;
    var fee2=0;
    var cot_cliente=0;
    var diferencia=0;

    var t1_costoT = document.getElementById("totalCo").innerHTML //t1: total - costo total programado de mod
    var t3_costoT = document.getElementById("t3_costoT").innerHTML //t3: total - costo total
    var t4_costoT = document.getElementById("t4_costoT").innerHTML //t4: total - costo total
    var t1_precioT = document.getElementById("totalPr").innerHTML //t1: total - precio cotizado sin fee
    var t3_precioT = document.getElementById("t3_precioT").innerHTML //t3: total - precio cotizado sin fee
    fee=document.getElementById("feeV").value//F.E.E.
    tiempoP=document.getElementById("tiempoPr").value//tiempo programado
    // total en items
    total_item = parseFloat(t1_costoT)+parseFloat(t3_costoT)+parseFloat(t4_costoT)
    document.getElementById("costoAp").value=total_item.toFixed(2)
    //costo indirecto
    costo_indirecto = (total_item*tasaAplicacion).toFixed(2)
    document.getElementById("costoPd").value=costo_indirecto
    //costo financiero   
    cf1=total_item+parseFloat(costo_indirecto)
    cf2=((tiempoP/100)*tasFinanciera).toFixed(3)
    costo_financiero=(cf2*cf1).toFixed(2)
    document.getElementById("costoTo").value=costo_financiero
    //total cotizacion sin fee
    tot_item_sin_fee=parseFloat(t1_precioT)+parseFloat(t3_precioT)+parseFloat(t4_costoT)
    document.getElementById("totalE1").value=tot_item_sin_fee.toFixed(2)
    //F.E.E. de cotizacion sin fee
    fee_de_cot=(tot_item_sin_fee/100)*fee
    document.getElementById("totalF2").value=fee_de_cot.toFixed(2)
    //costo del proyecto
    fee2=(((parseFloat(total_item)+parseFloat(costo_indirecto)+parseFloat(costo_financiero))/100)*fee).toFixed(2)
    costo_proyecto=((parseFloat(total_item)+parseFloat(costo_indirecto)+parseFloat(costo_financiero))+parseFloat(fee2))/0.84
    document.getElementById("costoVA").value=costo_proyecto.toFixed(2)
    //cotizacion para el cliente
    cot_cliente=parseFloat(tot_item_sin_fee)+parseFloat(fee_de_cot)
    document.getElementById("costoED").value=cot_cliente.toFixed(2)
    //diferencia
    diferencia=parseFloat(cot_cliente)-parseFloat(costo_proyecto)
    document.getElementById("diferencia").value=diferencia.toFixed(2)
}//calculos que se muestran en el lado derecho de la planilla
function dias_credito(){
    dias_cliente=$('#cliente').val().split("-")
    $('#number').val(dias_cliente[1])//tiempo de credito (en dias)
    $('#tiempoPr').val(dias_cliente[1])
}//tiempo de credito de los clientes
function prorrateo(costo_item){
    var item_costo=costo_item.toFixed(2)
    var total_item2=parseFloat(document.getElementById("costoAp").value)
    var pro=parseFloat(total_item2)+
        parseFloat(document.getElementById("costoPd").value)+
        parseFloat(document.getElementById("costoTo").value)
    var pro2=(parseFloat(pro)/0.84).toFixed(2)//total de items + costos indirectos + impuestos
    var pro3=(parseFloat(item_costo)/parseFloat(total_item2))*parseFloat(pro2)
    return pro3.toFixed(2)
}//prorrateo

//**************************** t1 = personal que interviene en la operacion ************************

var c=0;
var tasaEjecutivo = 30; //Ejecutivo de cuenta - valor en horas
var tasaEncargado = 26; //Encargado logistico - valor en horas
var tasaPresupuestada = 0;
var vTip = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - tiempo programado
var vCant = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - cantidad de personas
var vTasa = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - tasa presupuestaria
var vCosto = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - costo programado de mod
var vPre = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - precio cotizado sin fee

function addRow(){
    var fila = '<tr id="fila1'+c+'">'+ 
        '<td>'+
        '<select onChange="actualizarTaza('+c+')" class="form-control"  name="staf[]" id="staf'+c+'" >'+
        '<option>SUPERVISOR</option>'+
        '<option>SOPORTE LOGISTICO</option>'+
        '</select>'+
        '</td>'+  
        '<td><input type="text" class="form-control" name="detalle[]" id="detalle'+c+'" ></td>'+
        '<td><select class="form-control" onChange= "actualizarTaza('+c+')" name="dayorhour[]" id="dayorhour'+c+'" >'+
        '<option>SELECCIONAR</option>'+
        '<option>DIAS</option>'+
        '<option>HORAS</option>'+
        '</select></td>'+
        '<td><input type="number" class="form-control" name="time[]" id="time'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();" step="0.01"></td>'+
        '<td><input type="number" class="form-control" name="nrop[]" id="nrop'+c+'" value ="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();" step="0.01"></td>'+
        '<td><input type="text" class="form-control" name="tasa[]" id="tasa'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" readonly></td>'+
        '<td><input type="text" class="form-control" name="costop[]" id="costop'+c+'" value="0" readonly></td>'+
        '<td><input type="number" name="cs[]" id="cs'+c+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="text" class="form-control" name="precioC[]" id="precioC'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();"></td>'+
        '<td><button type="button" class="btn btn-danger" onclick="t1_deleted('+c+')" id='+c+' >-</button></td>'+
        '</tr>'
    $('#tablita1').before(fila);
    /*actualizarTaza(c);*/
    c=c+1;
}//agragar fila
function t1_deleted(d){
    vTip[d]=0;
    vCant[d]=0;
    vTasa[d]=0;
    vCosto[d]=0;
    vPre[d]=0;
    totales1();
    $("#fila1"+d).remove();
}//eliminar fila
function actualizarTaza(numero){
    var staff = document.getElementById("staf"+numero).value; //detalle
    var dayHour = document.getElementById("dayorhour"+numero).value; //tiempo: dias u horas
    if (staff=="SUPERVISOR") {
        if (dayHour=="DIAS")
            tasaPresupuestada=tasaEjecutivo*8; 
        if (dayHour=="HORAS")
            tasaPresupuestada=tasaEjecutivo; 
        if (dayHour=="SELECCIONAR")
            tasaPresupuestada=0;
        vTasa[numero]=tasaPresupuestada.toFixed(2);
        document.getElementById("tasa"+numero).value =tasaPresupuestada.toFixed(2);//tasa presupuestaria
    }
    if (staff=="SOPORTE LOGISTICO") {
        if (dayHour=="DIAS")
            tasaPresupuestada=tasaEncargado*8;
        if (dayHour=="HORAS")
            tasaPresupuestada=tasaEncargado;
        if (dayHour=="SELECCIONAR")
            tasaPresupuestada=0;
        document.getElementById("tasa"+numero).value =tasaPresupuestada.toFixed(2);//tasa presupuestaria
    }
    actualizarCostoTotal(numero);
}
function actualizarCostoTotal(numer){
    var t = parseInt(document.getElementById("time"+numer).value); // tiempo programado
    var nro = parseInt(document.getElementById("nrop"+numer).value);// cantidad de personas
    var tas = parseFloat(document.getElementById("tasa"+numer).value);// tasa presupuestaria
    var pr =parseFloat(document.getElementById("precioC"+numer).value);// precio cotizado sin fee
    var r=t*nro*tas;//calculo para costo programado de mod
    document.getElementById("costop"+numer).value =r.toFixed(2);//costo programado de mod
    vTip[numer]=t;//array - tiempo programado
    vCant[numer]=nro;//array - cantidad de personas
    vTasa[numer] =tas.toFixed(2);//array - tasa presupuestaria
    vCosto[numer]=r.toFixed(2);//array - costo programado de mod
    vPre[numer]=pr.toFixed(2);//array - precio cotizado sin fee
    totales1();
    prorrateo(r);
    document.getElementById("cs"+numer).value=prorrateo(r);
}
function totales1(){
    var acTime=0
    var acCant=0
    var acTasa=0
    var acCosto=0
    var acPrecio=0
    var i=0;
    for(i=0;i<=c;i++){
        acTime+= parseInt(vTip[i])
        acCant+= parseInt(vCant[i])
        acTasa+= parseFloat(vTasa[i])
        acCosto+=parseFloat(vCosto[i])
        acPrecio+=parseFloat(vPre[i])
    }
    document.getElementById("totalTi").innerHTML = acTime;//total - tiempo programado
    document.getElementById("totalCa").innerHTML = acCant;//total - cantidad de personas
    document.getElementById("totalTa").innerHTML = acTasa.toFixed(2);//total - tasa presupuestaria
    document.getElementById("totalCo").innerHTML = acCosto.toFixed(2);//total - costo total programado de mod
    document.getElementById("totalPr").innerHTML = acPrecio.toFixed(2);//total - precio cotizado sin fee
    costosExternos();
}

//**************************** t3 = materiales / servicios que intervienen en la operacion ************************

var c3 = 0;
var t3_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - costo total
var t3_precio = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - precio cotizado sin fee

function addRow_t3(){
    var fila = '<tr id="fila3'+c3+'">'+
        '<td><input type="text" name="t3_ser[]" id="t3_ser'+c3+'" class="form-control"></td>'+
        '<td><input type="text" name="t3_nom[]" id="t3_nom'+c3+'" class="form-control"></td>'+
        '<td><input type="number" name="t3_dia[]" id="t3_dia'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><input type="number" name="t3_can[]" id="t3_can'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><input type="number" name="t3_cos[]" id="t3_cos'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><select name="t3_tip[]" id="t3_tip'+c3+'" onChange="t3_subTotal('+c3+')" class="form-control">'+
        '<option>FACTURA</option>'+
        '<option>RECIBO</option>'+
        '</select></td>'+
        '<td><input type="text" name="t3_tot[]" id="t3_tot'+c3+'" class="form-control" readonly></td>'+
        '<td><input type="number" name="t3_cs[]" id="t3_cs'+c3+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="number" name="t3_pre[]" value="0" id="t3_pre'+c3+'" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c3+' onClick="t3_deleted('+c3+')">-</button></td>'+
        '</tr>'

    $('#tablita3').before(fila);
    /*actualizarTotalT3(c3);*/
    c3=c3+1;
}//agregar fila
function t3_deleted(d){
    t3_costoTotal[d]=0
    t3_precio[d]=0
    actualizarTotalT3();

    $("#fila3"+d).remove();
}//eliminar fila
function t3_subTotal(o){
    var costoT2=0
    var dia = parseFloat(document.getElementById("t3_dia"+o).value)//dia
    var can = parseFloat(document.getElementById("t3_can"+o).value)//cantidad
    var cos = parseFloat(document.getElementById("t3_cos"+o).value)//costo unitario
    var tipo = document.getElementById("t3_tip"+o).value//documento
    var pre = parseFloat(document.getElementById("t3_pre"+o).value)//precio cotizado sin fee
    var costoT1=dia*can*cos
    if (tipo=="FACTURA") {
        costoT2 = ((costoT1/100)*3)+costoT1; //3% al costo total 
    }
    if (tipo=="RECIBO") {
        costoT2 = ((costoT1/100)*41)+costoT1; //41% al costo total
    }
    t3_costoTotal[o]=costoT2.toFixed(2);
    t3_precio[o] = pre.toFixed(2);

    document.getElementById("t3_tot"+o).value =  costoT2.toFixed(2);
    actualizarTotalT3();
    document.getElementById("t3_cs"+o).value=prorrateo(costoT2)
}
function actualizarTotalT3(){
    var acCosto=0;
    var acPrecio=0;
    var i =0;
    for(i=0;i<=c3;i++){
        acCosto+= parseFloat(t3_costoTotal[i]);
        acPrecio+= parseFloat(t3_precio[i]);
    }
    document.getElementById("t3_costoT").innerHTML= acCosto.toFixed(2);
    document.getElementById("t3_precioT").innerHTML= acPrecio.toFixed(2);
    costosExternos();
}

//**************************** t4 = productos / equipos propios de grupo regional ************************

var c4 = 0;
var t4_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - costo total
var t4_costoUnitario = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - costo unitario

function addRow_t4(){
    var fila = '<tr id="fila4'+c4+'">'+
        '<td><input type="text" name="t4_pro[]" id="t4_pro'+c4+'" class="form-control"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" class="form-control" name="t4_can[]" id="t4_can'+c4+'" step="0.01"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" name="t4_cos['+c4+']" id="t4_cos'+c4+'" class="form-control" step="0.01"></td>'+
        '<td><input type="text" name="t4_coT[]" id="t4_coT'+c4+'" class="form-control" readonly></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c4+' onClick="t4_deleted('+c4+')">-</button></td>'+
        '</tr>'

    $('#tablita4').before(fila);
    /*actualizarTotalT4(c4);*/
    c4=c4+1;
}//agregar fila
function t4_deleted(d){
    t4_costoTotal[d]=0
    t4_costoUnitario[d]=0
    actualizarTotalT4();

    $("#fila4"+d).remove();
}//eliminar fila
function t4_subTotal(e){
    var ca = parseFloat(document.getElementById("t4_can"+e).value)//cantidad
    var co = parseFloat(document.getElementById("t4_cos"+e).value)//costo unitario
    //costo total
    var costoT = ca*co;
    document.getElementById("t4_coT"+e).value =  costoT.toFixed(2);
    t4_costoTotal[e]=costoT.toFixed(2);
    t4_costoUnitario[e]=co.toFixed(2);
    actualizarTotalT4();
}
function actualizarTotalT4(){
    var acCosto=0;
    var acPrecio=0;
    var acUnitario=0;
    var i =0;
    for(i=0;i<=c4;i++){
        acCosto+= parseFloat(t4_costoTotal[i]);
        acUnitario+=parseFloat(t4_costoUnitario[i]);
    }
    document.getElementById("t4_costoU").innerHTML= acUnitario.toFixed(2)
    document.getElementById("t4_costoT").innerHTML= acCosto.toFixed(2)
    costosExternos();    
}

//**************************** t5 = modal - items orden de compra ************************

var c5 = 0;
var t5_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - costo total

function addRow_t5(){
    //valores de input
    var fila = '<tr id="fila5'+c5+'">'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" class="form-control" name="t5_can[]" id="t5_can'+c5+'" step="0.01"></td>'+
        '<td><input type="text" name="t5_pro[]" id="t5_pro'+c5+'" class="form-control"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" name="t5_cos[]" id="t5_cos'+c5+'" class="form-control" step="0.01"></td>'+
        '<td><input type="text" name="t5_coT[]" id="t5_coT'+c5+'" class="form-control" readonly></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c5+' onClick="t5_deleted('+c5+')">-</button></td>'+
        '</tr>'

    $('#tablita5').before(fila);
    /*actualizarTotalT4(c4);*/
    c5=c5+1;
}//agregar fila
function t5_deleted(d){
    t5_costoTotal[d]=0
    actualizarTotalT5();
    $("#fila5"+d).remove();
}//eliminar fila
function t5_subTotal(e){
    var oc_ca = parseFloat(document.getElementById("t5_can"+e).value)//cantidad
    var oc_co = parseFloat(document.getElementById("t5_cos"+e).value)//costo unitario
    //costo total
    var oc_costoT = oc_ca*oc_co;
    document.getElementById("t5_coT"+e).value =  oc_costoT.toFixed(2);
    t5_costoTotal[e]=oc_costoT.toFixed(2);
    actualizarTotalT5();
}
function actualizarTotalT5(){
    var acCosto=0;
    var i =0;
    for(i=0;i<=c5;i++){
        acCosto+= parseFloat(t5_costoTotal[i]);
    }
    document.getElementById("t5_costoT").innerHTML= acCosto.toFixed(2)
}


function prueba(numero){
    alert ("eso es")
}
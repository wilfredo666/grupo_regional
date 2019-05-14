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
    
    var fila = '<tr id="fila1'+IDT1+'">'+ 
        '<td>'+
        '<select onChange="actualizarTaza('+IDT1+')" class="form-control"  name="staf[]" id="staf'+IDT1+'" >'+
        '<option>EJECUTIVO DE CUENTAS</option>'+
        '<option>ENCARGADO LOGISTICO</option>'+
        '</select>'+
        '</td>'+  
        '<td><input type="text" class="form-control" name="detalle[]" id="detalle'+IDT1+'" ></td>'+
        '<td><select class="form-control" onChange= "actualizarTaza('+IDT1+')" name="dayorhour[]" id="dayorhour'+IDT1+'" >'+
        '<option>SELECCIONAR</option>'+
        '<option>DIAS</option>'+
        '<option>HORAS</option>'+
        '</select></td>'+
        '<td><input type="number" class="form-control" name="time[]" id="time'+IDT1+'" value="0" onkeyup="actualizarCostoTotal('+IDT1+')" onClick="this.select();" step="0.01"></td>'+
        '<td><input type="number" class="form-control" name="nrop[]" id="nrop'+IDT1+'" value ="0" onkeyup="actualizarCostoTotal('+IDT1+')" onClick="this.select();" step="0.01"></td>'+
        '<td><input type="text" class="form-control" name="tasa[]" id="tasa'+IDT1+'" value="0" onkeyup="actualizarCostoTotal('+IDT1+')" readonly></td>'+
        '<td><input type="text" class="form-control" name="costop[]" id="costop'+IDT1+'" value="0" readonly></td>'+
        '<td><input type="number" name="cs[]" id="cs'+IDT1+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="text" class="form-control" name="precioC[]" id="precioC'+IDT1+'" value="0" onkeyup="actualizarCostoTotal('+IDT1+')" onClick="this.select();"></td>'+
        '<td><button type="button" class="btn btn-danger" onclick="t1_deleted('+IDT1+')" id='+IDT1+' >-</button></td>'+
        '</tr>'
    $('#tablita1').before(fila);
    actualizarTaza(IDT1);
    IDT1=IDT1+1;
}
function t1_deleted(d){
    $("#time"+d).val(0);
    $("#nrop"+d).val(0);
    $("#tasa"+d).val(0);
    $("#costop"+d).val(0);
    $("#precioC"+d).val(0);
    totales1();

    $("#fila1"+d).remove();
    //c1=c1-1;
}
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
    var t = parseInt(document.getElementById("time"+numer).value);
    var nro = parseInt(document.getElementById("nrop"+numer).value);
    var tas = parseFloat(document.getElementById("tasa"+numer).value);
    var pr =parseFloat(document.getElementById("precioC"+numer).value);
    vPre[numer]=pr.toFixed(2);
    var r=t*nro*tas;
    vCosto[numer]=r.toFixed(2);
    vTasa[numer] = tas.toFixed(2);
    vTip[numer]=t;
    vCant[numer]=nro;
    r=r.toFixed(2);
    document.getElementById("costop"+numer).value =r;
    totales1();
    //prorrateo(r);
    document.getElementById("cs"+numer).value=prorrateo(r); 
}
function totales1(){
    var acTime=0
    var acCant=0
    var acTasa=0
    var acCosto=0
    var acPrecio=0
    var i;
    for(i=0;i<IDT1;i++){
        if($("#time"+i).length)
            acTime+= parseInt($("#time"+i).val());
        if($("#nrop"+i).length)
            acCant+= parseInt($("#nrop"+i).val());
        if($("#tasa"+i).length)
            acTasa+= parseFloat($("#tasa"+i).val());
        if($("#costop"+i).length)
            acCosto+=parseFloat($("#costop"+i).val());
        if($("#precioC"+i).length)
            acPrecio+=parseFloat($("#precioC"+i).val());
    }
    document.getElementById("totalTi").innerHTML = acTime;
    document.getElementById("totalCa").innerHTML = acCant;
    document.getElementById("totalTa").innerHTML = acTasa.toFixed(2);
    document.getElementById("totalCo").innerHTML = acCosto.toFixed(2);
    document.getElementById("totalPr").innerHTML = acPrecio.toFixed(2);
    costosExternos();

}

//**************************** t3 = materiales / servicios que intervienen en la operacion ************************

var c3 = 0;
var t3_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - costo total
var t3_precio = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];//array - precio cotizado sin fee

function addRow_t3(){
    
    var fila = '<tr id="fila3'+IDT3+'">'+
        '<td><input type="text" name="t3_ser[]" id="t3_ser'+IDT3+'" class="form-control"></td>'+
        '<td><input type="text" name="t3_nom[]" id="t3_nom'+IDT3+'" class="form-control"></td>'+
        '<td><input type="number" name="t3_dia[]" id="t3_dia'+IDT3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+IDT3+')" class="form-control" step="0.01"></td>'+
        '<td><input type="number" name="t3_can[]" id="t3_can'+IDT3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+IDT3+')" class="form-control" step="0.01"></td>'+
        '<td><input type="number" name="t3_cos[]" id="t3_cos'+IDT3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+IDT3+')" class="form-control" step="0.01"></td>'+
        '<td><select name="t3_tip[]" id="t3_tip'+IDT3+'" onChange="t3_subTotal('+IDT3+')" class="form-control">'+
        '<option>FACTURA</option>'+
        '<option>RECIBO</option>'+
        '<option>SIN IMPUESTO</option>'+
        '<option>ALQUILER SIN RECIBO</option>'+
        '</select></td>'+
        '<td><input type="text" name="t3_tot[]" id="t3_tot'+IDT3+'" value="0" class="form-control" readonly></td>'+
        '<td><input type="number" name="t3_cs[]" id="t3_cs'+IDT3+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="number" name="t3_pre[]" value="0" id="t3_pre'+IDT3+'" onClick="this.select()" onkeyup="t3_subTotal('+IDT3+')" class="form-control" step="0.01"></td>'+
        '<td><button type="button" class="btn btn-danger" id='+IDT3+' onClick="t3_deleted('+IDT3+')">-</button></td>'+
        '</tr>'

    $('#tablita3').before(fila);
    /*IDT3=IDT3+1;*/
    actualizarTotalT3(IDT3);
    IDT3=IDT3+1;
}
function t3_deleted(d){
    $("#t3_tot"+d).val(0);
    $("#t3_pre"+d).val(0);
    actualizarTotalT3();

    $("#fila3"+d).remove();
    //c1=c1-1;
}
function t3_subTotal(o){

    var dia = parseFloat(document.getElementById("t3_dia"+o).value)
    var can = parseFloat(document.getElementById("t3_can"+o).value)
    var cos = parseFloat(document.getElementById("t3_cos"+o).value)
    var pre = parseFloat(document.getElementById("t3_pre"+o).value)
    var tipo = document.getElementById("t3_tip"+o).value
    var valorT=0
    if (tipo=="FACTURA") {
        valorT = 0.87;
    }
    if (tipo=="RECIBO") {
        valorT = 1/0.845;
    }
    if (tipo=="SIN IMPUESTO") {
        valorT = 1;
    }
    if (tipo=="ALQUILER SIN RECIBO") {
        valorT = 1/0.84;
    }
    var costoT = dia*can*cos*valorT;
    t3_costoTotal[o]=costoT.toFixed(2);
    t3_precio[o] = pre.toFixed(2);

    document.getElementById("t3_tot"+o).value =  costoT.toFixed(2);
    actualizarTotalT3();
    document.getElementById("t3_cs"+o).value=prorrateo(costoT)
}
function actualizarTotalT3(){
    var i;
    var acCosto=0;
    var acPrecio=0;
    for(i=0;i<IDT3;i++){
        if($("#t3_tot"+i).length)
            acCosto+= parseFloat($("#t3_tot"+i).val());
        if($("#t3_pre"+i).length)
            acPrecio+= parseFloat($("#t3_pre"+i).val());
        
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
    
    var fila = '<tr id="fila4'+IDT4+'">'+
        '<td><input type="text" name="t4_pro[]" id="t4_pro'+IDT4+'" class="form-control"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+IDT4+')" class="form-control" name="t4_can[]" id="t4_can'+IDT4+'" step="0.01"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+IDT4+')" name="t4_cos['+IDT4+']" id="t4_cos'+IDT4+'" class="form-control" step="0.01"></td>'+
        '<td><input type="text" name="t4_coT[]" id="t4_coT'+IDT4+'" value="0" class="form-control" readonly></td>'+
        '<td><input type="number" name="t4_cs[]" id="t4_cs'+IDT4+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+IDT4+')" name="t4_pre[]" id="t4_pre'+IDT4+'" class="form-control"></td>'+
        '<td><button type="button" class="btn btn-danger" id='+IDT4+' onClick="t4_deleted(this.id)">-</button></td>'+
        '</tr>'

    $('#tablita4').before(fila);
    actualizarTotalT4(IDT4);
    IDT4=IDT4+1;
}
function t4_deleted(d){
    $("#t4_coT"+d).val(0)
    $("#t4_pre"+d).val(0)
    $("#t4_coU"+d).val(0)
    actualizarTotalT4();

    $("#fila4"+d).remove();
    //c1=c1-1;
}
function t4_subTotal(e){
    var ca = parseFloat(document.getElementById("t4_can"+e).value)
    var co = parseFloat(document.getElementById("t4_cos"+e).value)
    var pre = parseFloat(document.getElementById("t4_pre"+e).value)
    var costoT = ca*co;
    t4_costoUnitario[e]=co.toFixed(2);
    t4_costoTotal[e]=costoT.toFixed(2);
    t4_precio[e] = pre.toFixed(2);

    costoT = costoT.toFixed(2);
    document.getElementById("t4_coT"+e).value =  costoT;
    actualizarTotalT4();
    document.getElementById("t4_cs"+e).value=prorrateo(costoT)
}
function actualizarTotalT4(){
    var acCosto=0;
    var acPrecio=0;
    var acUnitario=0;
    var i;
    for(i=0;i<=IDT4;i++){
        if($("#t4_coT"+i).length)
            acCosto+= parseFloat($("#t4_coT"+i).val());
        if($("#t4_pre"+i).length)
            acPrecio+= parseFloat($("#t4_pre"+i).val());
        if($("#t4_cos"+i).length)
            acUnitario+= parseFloat($("#t4_cos"+i).val());
        
    }
    //acCosto = acCosto);
    //acPrecio = acPrecio);
    document.getElementById("t4_costoU").innerHTML= acUnitario.toFixed(2)
    document.getElementById("t4_costoT").innerHTML= acCosto.toFixed(2)
    document.getElementById("t4_precioT").innerHTML= acPrecio.toFixed(2)
    costosExternos();    
}


function costosExternos(){
    //costos indirectos de operaciones

    var total = 0;
    var costoProg=0;
    var te1=0
    var t1_costoT = document.getElementById("totalCo").innerHTML
    var t2_costoT = document.getElementById("t2_costoT").innerHTML
    var t3_costoT = document.getElementById("t3_costoT").innerHTML
    var t4_costoT = document.getElementById("t4_costoT").innerHTML
    var t5_costoT = document.getElementById("t5_costoT").innerHTML

    var t1_precioT = document.getElementById("totalPr").innerHTML
    var t2_precioT = document.getElementById("t2_precioT").innerHTML
    var t3_precioT = document.getElementById("t3_precioT").innerHTML
    var t4_precioT = document.getElementById("t4_precioT").innerHTML
    /*var t4_precioT = document.getElementById("t4_costoT").innerHTML*/
    var t5_precioT = document.getElementById("t5_precioT").innerHTML
    /*var t5_precioT = document.getElementById("t5_costoT").innerHTML*/

    var j1 = convertToFloat(t1_precioT)
    var j2 = convertToFloat(t2_precioT)
    var j3 = convertToFloat(t3_precioT)
    var j4 = convertToFloat(t4_precioT)
    var j5 = convertToFloat(t5_precioT) 

    total = parseFloat(t1_costoT)+parseFloat(t2_costoT)+parseFloat(t3_costoT)+parseFloat(t5_costoT)
    costoProg = total * tasaAplicacion
    /*$('#costoAp').text(total.toFixed(2))*/ //Costo acumulado programado
    document.getElementById("costoAp").value=total.toFixed(2)
    //$('#tasaDa').text(tasaAplicacion)                //tasa de aplicacion(onLoad)
    /*$('#costoPd').text((costoProg).toFixed(2))*/ //costo programado de C.I.
    document.getElementById("costoPd").value=(costoProg).toFixed(2)

    //costo financiero
    var exoin = $('#exoin').val()
    var tasaFinanciera = 0.0544872; //EN PORCENTAJE SOLO ES TASA/100
    var tiempoP = $('#number').val()
    var costoPF = (tasaFinanciera/100) * tiempoP * (total+costoProg)
    /*$('#tiempoPr').text(tiempoP)*/ //tiempo programado
    document.getElementById("tiempoPr").value=tiempoP
    //$('#tasaFi').text("0.05%")  // tasa financiera(onLoad)
    $('#costoTo').val(costoPF.toFixed(2))  //costo total programado financiero


    //tercera fila
    te1 = parseFloat(costoProg) + parseFloat(costoPF) + parseFloat(total)+parseFloat(t4_costoT)
    te1 = te1.toFixed(2)
    /*$('#totalE1').text(te1)*/  //Costo total del proyecto (ejecutado)
    document.getElementById("totalE1").value=te1
    var preciosF = 0;
    if(exoin=="INTERNO"){
        $('#totalF1').val(te1)
        $('#totalE2').val(te1)
        document.getElementById("totalF1").value=$('#totalE1').val()
        /*$('#totalF2').text($('#totalE1').val())*/
        document.getElementById("totalF2").value=$('#totalE1').val()
        /*$('#totalE3').text($('#totalE1').val())*/
        document.getElementById("totalE3").value=$('#totalE1').val()
        /*$('#totalE4').text($('#totalE1').val())*/
        document.getElementById("totalE4").value=$('#totalE1').val()
        $('#totalF4').val($('#totalE1').val())
    }
    if(exoin=="EXTERNO"){
        preciosF = parseFloat(j1)+parseFloat(j2)+parseFloat(j3)+parseFloat(j4)+parseFloat(j5)
        $('#totalF1').val(preciosF.toFixed(2)) //Costo total del proyecto (FEE)
    }
    //segunda fila
    
    if(parseFloat(document.getElementById("totalE1").value)<5000){
        var feeP = 0.16;
    }
    else if(parseFloat(document.getElementById("totalE1").value)<50000){
        var feeP = 0.15;     
    }
    else{
        var feeP = 0.14;
    }
    document.getElementById("feeP").value=(feeP*100).toFixed(0);
    /*$('#feeV').text("10%");   //F.E.V (onload)*/

    //cuarta fila
    var FEE = 0;
    var te2 = 0;

    if(exoin=="EXTERNO"){
        if(feeP==0)
            FEE = te1 * feeP
        else
            FEE = te1 * feeP
        te2 = FEE;
        $('#totalE2').val(FEE.toFixed(2)) //FEE EJECUTADO
    }  

    //EXTRACCION DE INPUT
    var feev = $('#feeV').val()


    if(exoin=="EXTERNO"){
        var b;
        var feev2="";
        for(b=0 ; b<feev.length ; b++){
            if(feev[b]!='%')
                feev2 = feev2+feev[b];
        }
        var porcentaje = parseFloat(feev2);

        if(feeP==0)
            FEE = preciosF * (porcentaje/100)
        else
            FEE = preciosF * (porcentaje/100)
        $('#totalF2').val(FEE.toFixed(2)) //FEE FEE
    }  

    //quinta fila
    var te3 = 0;

    if(exoin=="EXTERNO"){
        var val1 = convertToFloat($('#totalE1').val());
        var val2 = convertToFloat($('#totalE2').val());
        te3 = parseFloat(val1) + parseFloat(val2);
        $('#totalE3').val(te3.toFixed(2))  // costo total del proyecto + FEE (ejecutado)
    }

    //6ta fila
    var te4 = 0;
    var tf4 = 0;

    if(exoin=="EXTERNO"){
        te4 = parseFloat(te3/0.84);
        /*$('#totalE4').text(te4.toFixed(2))*/  // costo total del proyecto + impuestos
        document.getElementById("totalE4").value=te4.toFixed(2)
    }

    if(exoin=="EXTERNO"){
        tf4 = parseFloat(preciosF + FEE);
        $('#totalF4').val(tf4.toFixed(2))
    }

    //COSTO DE VALOR AGREGADO
    document.getElementById("costoVA").value=$('#totalE4').val()// Costo programado del proyecto
    var totalF1=$('#totalF1').val()
    var totalF2=$('#totalF2').val()
    document.getElementById("costoED").value=(parseFloat(totalF1)+parseFloat(totalF2)).toFixed(2)// Costo estimado del proyecto
    var dif = parseFloat(tf4) - parseFloat(te4);
    document.getElementById("diferencia").value=dif.toFixed(2)
    inicio()

}
function resticcion(){
    if (document.getElementById('diferencia').value<0){
        alert ("Su proyecto se encuentra en perdida, verificar porfavor!!")
        return false
        }
}

function ActualizacionRapida() {
            //BUSCANDO ID MAXIMO CON ATRIBUTO DE REFERENCIA  
            //CREACCION DE ALGORITMO DE RECORRIDO HASTA LA DETECCION DE ERROR
            var x;
            for(x=1;x<=15;x++){
            if(!($("#staf"+x).length))
                break;
            }
            IDT1=x;
            totales1();

            var z;
            for(z=1;z<=15;z++){
            if(!($("#t2_tot"+z).length))
                break;
            }
            IDT2=z;
            actualizarTotalT2();

            var y;
            for(y=1;y<=15;y++){
            if(!($("#t3_tot"+y).length))
                break;
            }
            IDT3=y;
            actualizarTotalT3();

            var v;
            for(v=1;v<=15;v++){
            if(!($("#t4_coT"+v).length))
                break;
            }
            IDT4=v;
            actualizarTotalT4();

            var l;
            for(l=1;l<=15;l++){
            if(!($("#t5_costoT"+l).length))
                break;
            }
            IDT5=l;
            actualizarTotalT5();


}
window.onload = ActualizacionRapida;
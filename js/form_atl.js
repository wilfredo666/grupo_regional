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
var vCant = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
var vTip = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

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

var tasaAplicacion = 0.17;
//t2_subTotal(0);
//actualizarTaza(0);
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
}

function addRow(){
    c=c+1;
    var fila = '<tr id="fila1'+c+'">'+ 
        '<td>'+
        '<select onChange="actualizarTaza('+c+')" class="form-control"  name="staf['+c+']" id="staf'+c+'" >'+
        '<option>EJECUTIVO DE CUENTAS</option>'+
        '<option>ENCARGADO LOGISTICO</option>'+
        '</select>'+
        '</td>'+
        '<td><input type="text" class="form-control" name="detalle['+c+']" id="detalle'+c+'" ></td>'+
        '<td><select class="form-control" onChange= "actualizarTaza('+c+')" name="dayorhour['+c+']" id="dayorhour'+c+'" >'+
        '<option>SELECCIONAR</option>'+
        '<option>DIAS</option>'+
        '<option>HORAS</option>'+
        '</select></td>'+
        '<td><input type="number" class="form-control" name="time['+c+']" id="time'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();" step="0.01"></td>'+
        '<td><input type="number" class="form-control" name="nrop['+c+']" id="nrop'+c+'" value ="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();" step="0.01"></td>'+
        '<td><input type="text" class="form-control" name="tasa['+c+']" id="tasa'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" readonly></td>'+
        '<td><input type="text" class="form-control" name="costop['+c+']" id="costop'+c+'" value="0" readonly></td>'+
        '<td><input type="text" class="form-control" name="precioC['+c+']" id="precioC'+c+'" value="0" onkeyup="actualizarCostoTotal('+c+')" onClick="this.select();"></td>'+
        '<td><button type="button" class="btn btn-danger" onclick="t1_deleted('+c+')" id='+c+' >-</button></td>'+
        '</tr>'
    $('#tablita1').after(fila);
    actualizarTaza(c);
}
function t1_deleted(d)
{
    vTip[d]=0
    vCant[d]=0
    vTasa[d]=0;
    vCosto[d]=0;
    vPre[d]=0;
    totales1();

    $("#fila1"+d).remove();
    //c1=c1-1;
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
    document.getElementById("totalTi").innerHTML = acTime;
    document.getElementById("totalCa").innerHTML = acCant;
    document.getElementById("totalTa").innerHTML = acTasa.toFixed(2);
    document.getElementById("totalCo").innerHTML = acCosto.toFixed(2);
    document.getElementById("totalPr").innerHTML = acPrecio.toFixed(2);
    costosExternos();

}


function t2_subTotal(u){
    var ca = parseFloat(document.getElementById("t2_can"+u).value)
    var co = parseFloat(document.getElementById("t2_cos"+u).value)
    var pre = parseFloat(document.getElementById("t2_pre"+u).value)
    var doc = document.getElementById("t2_doc"+u).value
    var costoT =0;
    if(doc=="FACTURA")
        costoT=0.87;
    if(doc=="RECIBO")
        costoT=1.09;
    costoT= costoT*ca*co;
    t2_costoTotal[u]=costoT.toFixed(2);
    t2_precio[u] = pre.toFixed(2);

    costoT = costoT.toFixed(2);
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
    document.getElementById("t2_costoT").innerHTML= acCosto.toFixed(2);
    document.getElementById("t2_precioT").innerHTML= acPrecio.toFixed(2);
    costosExternos();
}

function addRow_t2(){
    c2=c2+1;
    var fila = '<tr id="fila2'+c2+'">'+
        '<td><input type="text" name="t2_mat['+c2+']"  id="t2_mat'+c2+'" class="form-control"></td>'+
        '<td><input type="text" name="t2_nom['+c2+']" id="t2_nom'+c2+'" class="form-control"></td>'+
        '<td><input type="number" name="t2_can['+c2+']" id="t2_can'+c2+'" onkeyup="t2_subTotal('+c2+')" onClick="this.select()" value="0" class="form-control" step="0.01"></td>'+
        '<td><input type="number" name="t2_cos['+c2+']"id="t2_cos'+c2+'" onkeyup="t2_subTotal('+c2+')" onClick="this.select()" value="0" class="form-control" step="0.01"></td>'+
        '<td><select name="t2_doc['+c2+']" id="t2_doc'+c2+'" onchange="t2_subTotal('+c2+')" class="form-control">'+
        '<option>FACTURA</option>'+
        '<option>RECIBO</option>'+
        '</select></td>'+
        '<td><input type="text" class="form-control" name="t2_tot['+c2+']" id="t2_tot'+c2+'" readonly></td>'+
        '<td><input type="number" name="t2_pre['+c2+']" id="t2_pre'+c2+'" onkeyup="t2_subTotal('+c2+')" value="0" class="form-control" step="0.01"></td>'+
        '<td></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c2+' onClick="t2_deleted('+c2+')">-</button></td>'+
        '</tr>'

    $('#tablita2').after(fila);
    actualizarTotalT2();
}
function t2_deleted(d)
{
    t2_costoTotal[d]=0
    t2_precio[d]=0
    actualizarTotalT2();

    $("#fila2"+d).remove();
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
function addRow_t3(){
    c3=c3+1;
    var fila = '<tr id="fila3'+c3+'">'+
        '<td><input type="text" name="t3_ser['+c3+']" id="t3_ser'+c3+'" class="form-control"></td>'+
        '<td><input type="text" name="t3_nom['+c3+']" id="t3_nom'+c3+'" class="form-control"></td>'+
        '<td><input type="number" name="t3_dia['+c3+']" id="t3_dia'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><input type="number" name="t3_can['+c3+']" id="t3_can'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><input type="number" name="t3_cos['+c3+']" id="t3_cos'+c3+'" value="0" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><select name="t3_tip['+c3+']" id="t3_tip'+c3+'" onChange="t3_subTotal('+c3+')" class="form-control">'+
        '<option>FACTURA</option>'+
        '<option>RECIBO</option>'+
        '<option>SIN IMPUESTO</option>'+
        '<option>ALQUILER SIN RECIBO</option>'+
        '</select></td>'+
        '<td><input type="text" name="t3_tot['+c3+']" id="t3_tot'+c3+'" class="form-control" readonly></td>'+
        '<td><input type="number" name="t3_pre['+c3+']" value="0" id="t3_pre'+c3+'" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c3+' onClick="t3_deleted('+c3+')">-</button></td>'+
        '</tr>'

    $('#tablita3').after(fila);
    actualizarTotalT3(c3);
}
function t3_deleted(d)
{
    t3_costoTotal[d]=0
    t3_precio[d]=0
    actualizarTotalT3();

    $("#fila3"+d).remove();
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
    //acCosto = acCosto);
    //acPrecio = acPrecio);
    document.getElementById("t4_costoU").innerHTML= acUnitario.toFixed(2)
    document.getElementById("t4_costoT").innerHTML= acCosto.toFixed(2)
    document.getElementById("t4_precioT").innerHTML= acPrecio.toFixed(2)
    costosExternos();    
}

function addRow_t4(){
    c4=c4+1;
    var fila = '<tr id="fila4'+c4+'">'+
        '<td><input type="text" name="t4_pro['+c4+']" id="t4_pro'+c4+'" class="form-control"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" class="form-control" name="t4_can['+c4+']" id="t4_can'+c4+'" step="0.01"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" name="t4_cos['+c4+']" id="t4_cos'+c4+'" class="form-control" step="0.01"></td>'+
        '<td><input type="text" name="t4_coT['+c4+']" id="t4_coT'+c4+'" class="form-control" readonly></td>'+
        '<td><input type="hidden" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" name="t4_pre['+c4+']" id="t4_pre'+c4+'" class="form-control"></td>'+
        '<td></td>'+
        '<td></td>'+
        '<td></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c4+' onClick="t4_deleted(this.id)">-</button></td>'+
        '</tr>'

    $('#tablita4').after(fila);
    actualizarTotalT4(c4);
}
function t4_deleted(d)
{
    t4_costoTotal[d]=0;
    t4_precio[d]=0;
    t4_costoUnitario[d]=0;
    actualizarTotalT4();

    $("#fila4"+d).remove();
    //c1=c1-1;
}
function t5_subTotal(a){
    var ca = parseFloat(document.getElementById("t5_can"+a).value)
    var co = parseFloat(document.getElementById("t5_coU"+a).value)
    var pre = parseFloat(document.getElementById("t5_pre"+a).value)
    var costoT = ca*co;
    t5_costoUnitario[a]=co.toFixed(2);
    t5_costoTotal[a]=costoT.toFixed(2);
    t5_precio[a] = pre.toFixed(2);

    costoT = costoT.toFixed(2)
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
    //acCosto = acCosto);
    //acPrecio = acPrecio);
    document.getElementById("t5_costoU").innerHTML= acUnitario.toFixed(2)
    document.getElementById("t5_costoT").innerHTML= acCosto.toFixed(2)
    document.getElementById("t5_precioT").innerHTML= acPrecio.toFixed(2)
    costosExternos();    
}

function addRow_t5(){
    c5=c5+1;
    var fila = '<tr id="fila5'+c5+'">'+
        '<td><input type="text" name="t5_pro['+c5+']" id="t5_pro'+c5+'" class="form-control"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" class="form-control" name="t5_can['+c5+']" id="t5_can'+c5+'" step="0.01"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" name="t5_coU['+c5+']" id="t5_coU'+c5+'" class="form-control" step="0.01"></td>'+
        '<td><input type="text" name="t5_coT['+c5+']" id="t5_coT'+c5+'" class="form-control" readonly></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" name="t5_pre['+c5+']" id="t5_pre'+c5+'" class="form-control" step="0.01"></td>'+
        '<td></td>'+
        '<td></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c5+' onClick="t5_deleted(this.id)">-</button></td>'+
        '</tr>'

    $('#tablita5').after(fila);
    actualizarTotalT5(c5);
}
function t5_deleted(d)
{
    t5_costoTotal[d]=0;
    t5_precio[d]=0;
    t5_costoUnitario[d]=0;
    actualizarTotalT5();

    $("#fila5"+d).remove();
    //c1=c1-1;
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
    var t5_precioT = document.getElementById("t5_precioT").innerHTML

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
        /*$('#totalE2').text($('#totalE1').val())*/
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
    var feeP = 0.10;
    /*if(te1<5000)
                    feeP = 0.17
                else
                if(te1<50000)
                    feeP = 0.16
                else
                if(te1>50000)
                    feeP = 0.15*/
    /*$('#feeP').text((feeP*100).toFixed(0)+'%')*/ //F.E.E. programado
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
    document.getElementById("costoED").value=(parseFloat(totalF1)-parseFloat(totalF2)).toFixed(2)// Costo estimado del proyecto
    var dif = parseFloat(tf4) - parseFloat(te4);
    document.getElementById("diferencia").value=dif.toFixed(2)
    inicio()

}
function inicio(){
    /*$('#tasaDa').text(tasaAplicacion);*/
    document.getElementById("tasaDa").value=tasaAplicacion
    /*$("#tasaFi").text("0.05%")*/ // tasa financiera(onLoad)
    document.getElementById("tasaFi").value="0.05";
    //$("#feeV").val("10%");
}

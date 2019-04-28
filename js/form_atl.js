// variables globales

// funciones globales
function calcular(){
    
}
//costos que se muestran en el lado derecho de la planilla
function costosExternos(){

    var total_item = 0;
    var costoProg=0;
    var te1=0
    
    var t1_costoT = document.getElementById("totalCo").innerHTML //t1: total - costo total programado de mod
    var t3_costoT = document.getElementById("t3_costoT").innerHTML //t3: total - costo total
    var t4_costoT = document.getElementById("t4_costoT").innerHTML //t4: total - costo total
    // total en items
    total_item = parseFloat(t1_costoT)+parseFloat(t3_costoT)+parseFloat(t4_costoT)
    document.getElementById("costoAp").value=total_item.toFixed(2) 
    
    var t1_precioT = document.getElementById("totalPr").innerHTML //t1: precio cotizado sin fee
    var t3_precioT = document.getElementById("t3_precioT").innerHTML //t3: precio cotizado sin fee

    var j1 = convertToFloat(t1_precioT)
    var j3 = convertToFloat(t3_precioT)

    
   /* costoProg = total * tasaAplicacion*/
    

}

//**************************** t1 = personal directo que interviene en la operacion ************************

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
}
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
    /*   prorrateo(r);*/
    /*document.getElementById("cs"+numer).value=prorrateo(r); */
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
    document.getElementById("totalCo").innerHTML = acCosto.toFixed(2);//total - costo total programado de mod
    document.getElementById("totalPr").innerHTML = acPrecio.toFixed(2);
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
        '<option>SIN IMPUESTO</option>'+
        '<option>ALQUILER SIN RECIBO</option>'+
        '</select></td>'+
        '<td><input type="text" name="t3_tot[]" id="t3_tot'+c3+'" class="form-control" readonly></td>'+
        '<td><input type="number" name="t3_cs[]" id="t3_cs'+c3+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="number" name="t3_pre[]" value="0" id="t3_pre'+c3+'" onClick="this.select()" onkeyup="t3_subTotal('+c3+')" class="form-control" step="0.01"></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c3+' onClick="t3_deleted('+c3+')">-</button></td>'+
        '</tr>'

    $('#tablita3').before(fila);
    /*actualizarTotalT3(c3);*/
    c3=c3+1;
}
function t3_subTotal(o){
var valorT=0
    var dia = parseFloat(document.getElementById("t3_dia"+o).value)//dia
    var can = parseFloat(document.getElementById("t3_can"+o).value)//cantidad
    var cos = parseFloat(document.getElementById("t3_cos"+o).value)//costo unitario
    var tipo = document.getElementById("t3_tip"+o).value//documento
    var pre = parseFloat(document.getElementById("t3_pre"+o).value)//precio cotizado sin fee
    if (tipo=="FACTURA") {
        valorT = 0.87;
    }
    if (tipo=="RECIBO") {
        valorT = 1/0.845; //aqui se extrae el 15.5 %
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

var t4_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
var t4_precio = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]; 
var t4_costoUnitario = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
var c4 = 0;
function addRow_t4(){
    var fila = '<tr id="fila4'+c4+'">'+
        '<td><input type="text" name="t4_pro[]" id="t4_pro'+c4+'" class="form-control"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" class="form-control" name="t4_can[]" id="t4_can'+c4+'" step="0.01"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" name="t4_cos['+c4+']" id="t4_cos'+c4+'" class="form-control" step="0.01"></td>'+
        '<td><input type="text" name="t4_coT[]" id="t4_coT'+c4+'" class="form-control" readonly></td>'+
        '<td><input type="number" name="t4_cs[]" id="t4_cs'+c4+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t4_subTotal('+c4+')" name="t4_pre[]" id="t4_pre'+c4+'" class="form-control"></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c4+' onClick="t4_deleted(this.id)">-</button></td>'+
        '</tr>'

    $('#tablita4').before(fila);
    /*actualizarTotalT4(c4);*/
    c4=c4+1;
}
function t4_subTotal(e){
    var ca = parseFloat(document.getElementById("t4_can"+e).value)//cantidad
    var co = parseFloat(document.getElementById("t4_cos"+e).value)//costo unitario
    var pre = parseFloat(document.getElementById("t4_pre"+e).value)// precio cotizado sin fee
    var costoT = ca*co;
    t4_costoUnitario[e]=co.toFixed(2);
    t4_costoTotal[e]=costoT.toFixed(2);
    t4_precio[e] = pre.toFixed(2);

    costoT = costoT.toFixed(2);
    document.getElementById("t4_coT"+e).value =  costoT;//costo total
    actualizarTotalT4();
    document.getElementById("t4_cs"+e).value=prorrateo(costoT)
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

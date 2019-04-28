



// materiales y servicios que intervienen en la operacion

//materiales
//Solamente habilitado factura, por tanto:
//Costo total estimado = cantidad *c/u * 0.87
var c2=0;
var t2_costoTotal = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
var t2_precio = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

//servicios
// dias * cantidad * c/u * tipooForma
//Factura = *0.87
//Recibo = *1.18
//Sin impuesto = *1 
// Alquiler sin recibo = *1.19 


//variables tablita 4

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
    document.getElementById("t2_cs"+u).value=prorrateo(costoT)
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
    
    var fila = '<tr id="fila2'+c2+'">'+
        '<td><input type="text" name="t2_mat[]"  id="t2_mat'+c2+'" class="form-control"></td>'+
        '<td><input type="text" name="t2_nom[]" id="t2_nom'+c2+'" class="form-control"></td>'+
        '<td><input type="number" name="t2_can[]" id="t2_can'+c2+'" onkeyup="t2_subTotal('+c2+')" onClick="this.select()" value="0" class="form-control" step="0.01"></td>'+
        '<td><input type="number" name="t2_cos[]"id="t2_cos'+c2+'" onkeyup="t2_subTotal('+c2+')" onClick="this.select()" value="0" class="form-control" step="0.01"></td>'+
        '<td><select name="t2_doc[]" id="t2_doc'+c2+'" onchange="t2_subTotal('+c2+')" class="form-control">'+
        '<option>FACTURA</option>'+
        '<option>RECIBO</option>'+
        '</select></td>'+
        '<td><input type="text" class="form-control" name="t2_tot[]" id="t2_tot'+c2+'" readonly></td>'+
        '<td><input type="number" name="t2_cs[]" id="t2_cs'+c2+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="number" name="t2_pre[]" id="t2_pre'+c2+'" onkeyup="t2_subTotal('+c2+')" value="0" class="form-control" step="0.01"></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c2+' onClick="t2_deleted('+c2+')">-</button></td>'+
        '</tr>'

    $('#tablita2').before(fila);
    actualizarTotalT2();
    c2=c2+1;
}
function t2_deleted(d)
{
    t2_costoTotal[d]=0
    t2_precio[d]=0
    actualizarTotalT2();

    $("#fila2"+d).remove();
    //c1=c1-1;
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
    document.getElementById("t5_cs"+a).value=prorrateo(costoT)
    document.getElementById("t3_cs"+a).value=prorrateo(costoT)
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
    
    var fila = '<tr id="fila5'+c5+'">'+
        '<td><input type="text" name="t5_pro[]" id="t5_pro'+c5+'" class="form-control"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" class="form-control" name="t5_can[]" id="t5_can'+c5+'" step="0.01"></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" name="t5_coU[]" id="t5_coU'+c5+'" class="form-control" step="0.01"></td>'+
        '<td><input type="text" name="t5_coT[]" id="t5_coT'+c5+'" class="form-control" readonly></td>'+
        '<td><input type="number" name="t5_cs[]" id="t5_cs'+c5+'" class="form-control" step="0.01" value="0" readonly></td>'+
        '<td><input type="number" value="0" onClick="this.select()" onkeyup="t5_subTotal('+c5+')" name="t5_pre[]" id="t5_pre'+c5+'" class="form-control" step="0.01"></td>'+
        '<td><button type="button" class="btn btn-danger" id='+c5+' onClick="t5_deleted(this.id)">-</button></td>'+
        '</tr>'

    $('#tablita5').before(fila);
    actualizarTotalT5(c5);
    c5=c5+1;
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


function inicio(){
    /*$('#tasaDa').text(tasaAplicacion);*/
    document.getElementById("tasaDa").value=tasaAplicacion
    /*$("#tasaFi").text("0.05%")*/ // tasa financiera(onLoad)
    document.getElementById("tasaFi").value="0.05";
    //$("#feeV").val("10%");
}
/*agregados por wilfredo*/
function prorrateo(costo){
    var tot_costos1=parseFloat(document.getElementById("totalCo").innerHTML)+parseFloat(document.getElementById("t2_costoT").innerHTML)+parseFloat(document.getElementById("t3_costoT").innerHTML)+parseFloat(document.getElementById("t4_costoT").innerHTML)+parseFloat(document.getElementById("t5_costoT").innerHTML)
    var tot_costos3=parseFloat(document.getElementById("totalE4").value)-parseFloat(document.getElementById("totalE3").value)
    var tot_costos2=parseFloat(document.getElementById("costoPd").value)+parseFloat(document.getElementById("costoTo").value)
    var pro=tot_costos2/tot_costos1*parseFloat(costo)+parseFloat(costo)+tot_costos3
    return pro.toFixed(2);
}
/*function resticcion(){
    if (document.getElementById('diferencia').value<0){
        alert ("Su proyecto se encuentra en perdida, verificar porfavor!!")
        return false
        }
}*/
function prueba(){
}
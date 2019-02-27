function codigo_proyecto(){
    /*aqui los extrae del modal modal_generar_codigo.php*/
    /*codigo aleatorio*/
    ultimo_codigo_int=$('#ultimo_codigo').val()
    ultimo_codigo_str=String(ultimo_codigo_int),
        inicio=4,
        fin=6,
        ultimo_codigo_str2=ultimo_codigo_str.substring(fin);
    /*alert(ultimo_codigo_str2);*/
    codigo=$('#area').val()+$('#ciudad').val()+$('#cliente').val()+ultimo_codigo_str2;
    $('#codigo').val(codigo)
    /*aqui lleva el valor a form_x.php*/
    $('#form_codigo').val(codigo)
    fecha_actual()
}
/*poniendo la fecha de inicio en automatico*/
function fecha_actual(){
    f=new Date()
    y=f.getFullYear()
    m=f.getMonth()+1
    d=f.getDate()
    if(d<10){
        d='0'+d; //agrega cero si el menor de 10
    }

    if(m<10){
        m='0'+m; //agrega cero si el menor de 10 
    }
    $('#date').val(y+"-"+m+"-"+d)
}
function p(){
    alert("prueba")
}

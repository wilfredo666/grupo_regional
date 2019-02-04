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
}
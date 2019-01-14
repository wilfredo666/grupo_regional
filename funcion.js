function agregar_usuario(id_usuario, ci_usuario, nombre_usuario, clave, nivel_usuario) {
    
    cadena_datos="id_usuario=" + id_usuario +
        "&ci_usuario=" + ci_usuario +
        "&nombre_usuario=" + nombre_usuario +
        "&clave=" + clave +
        "&nivel_usuario=" + nivel_usuario;
    
    $.ajax({
        type: "POST",
        url: "agregarDatos.php",
        data: cadena_datos,
        success: function(r){
            if(r==1){
                $('#tabla').load('pruebas.php');
                alertify.success('Guardado con exito'); 
            }else{
                alertify.error('Fallo en el guardado ');
            }
        }
    })
    
}
function editar_usuario(datos){
    d=datos.split("||");
    $('#id_usuariou').val(d[0]);
    $('#ci_usuariou').val(d[1]);
    $('#nombre_usuariou').val(d[2]);
    $('#claveu').val(d[3]);
    $('#nivel_usuariou').val(d[4]);
}
function actualizarDatos(){
    
    id_usuario=$('#id_usuariou').val();
    ci_usuario=$('#ci_usuariou').val();
    nombre_usuario=$('#nombre_usuariou').val();
    clave=$('#claveu').val();
    nivel_usuario=$('#nivel_usuariou').val();
    
    cadena_datos="id_usuario=" + id_usuario +
        "&ci_usuario=" + ci_usuario +
        "&nombre_usuario=" + nombre_usuario +
        "&clave=" + clave +
        "&nivel_usuario=" + nivel_usuario;
    
    $.ajax({
        type: "POST",
        url: "actualizarDatos.php",
        data: cadena_datos,
        success: function(r){
            if(r==1){
                $('#tabla').load('pruebas.php');
                alertify.success('Actualizado con exito con exito'); 
            }else{
                alertify.error('Fallo en la actualizacion ');
            }
        }
    })
}

/*function mostrar(dato_a_mostrar){
    d=dato_a_mostrar;
    alert(dato_a_mostrar);
}*/

function preguntar(id_usuario){
    alertify.confirm('Eliminar datos', '¿ Esta seguro ?', function(){ eliminar_usuario(id_usuario) }
                , function(){ alertify.error('Cancelado')});
}
function eliminar_usuario(id_usuario){
     cadena_datos="id_usuario=" + id_usuario
    $.ajax({
        type: "POST",
        url: "eliminarDatos.php",
        data: cadena_datos,
        success: function(r){
            if(r==1){
                $('#tabla').load('pruebas.php');
                alertify.success('Eliminado con exito'); 
            }else{
                alertify.error('Fallo en la eliminacion');
        }
        }
    })
    
}
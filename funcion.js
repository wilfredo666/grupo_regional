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
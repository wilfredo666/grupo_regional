<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>documento de prueba</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="funcion.js"></script>
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
    </head>
    <body>
        <div class="container">
            <div class="col-sm-12" id="tabla">
                <h1>Tablas dinamicas con ajax, mysql, php</h1>
                <caption>
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#modalNuevo" data-dismiss="modal">+ Agregar nuevo </svg></button>
                </caption>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id usuario</th>
                        <th>Carnet de identidad</th>
                        <th>Nombre</th>
                        <th>Contraseña</th>  
                        <th>Nivel</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "conexion.php";
                    $consulta = "select * from usuario";
                    $usuario = mysqli_query($con,$consulta);
                    while($fila=mysqli_fetch_row($usuario)){
                    $datos=$fila[0]."||".$fila[1]."||".$fila[2]."||".$fila[3]."||".$fila[4];
                    ?>
                    <tr>
                        <td><?php echo $fila[0]?></td>
                        <td><?php echo $fila[1]?></td>
                        <td><?php echo $fila[2]?></td>
                        <td><?php echo $fila[3]?></td>
                        <td><?php echo $fila[4]?></td>
                        <td><button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="editar_usuario('<?php echo $datos ?>')">Editar</button></td>
                        <td><button class="btn btn-danger" onclick="preguntar('<?php echo $fila[0]?>')">Quitar</button></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Para registros nuevos -->
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" id="guardarNuevo">Agregar nuevo usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Id Usuario</label>
                        <input type="text" class="form-control" id="id_usuario">
                        <label for="">Carnet de idenidad</label>
                        <input type="text" class="form-control" id="ci_usuario">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre_usuario">
                        <label for="">Contraseña</label>
                        <input type="text" class="form-control" id="clave_usuario">
                        <label for="">Nivel</label>
                        <input type="text" class="form-control" id="nivel_usuario">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="agregarNuevo">Agregar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Para edicion de datos -->
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Editar usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" hidden="" id="id">
                        <label for="">Id usuario</label>
                        <input type="text" class="form-control" id="id_usuariou">
                        <label for="">Carnet de idenidad</label>
                        <input type="text" class="form-control" id="ci_usuariou">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre_usuariou">
                        <label for="">Clave</label>
                        <input type="text" class="form-control" id="claveu">
                        <label for="">Nivel</label>
                        <input type="text" class="form-control" id="nivel_usuariou">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="actualizar_datos" data-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="alertifyjs/alertify.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script>
        $(document).ready(function(){
            /*para agregar datos*/
            $('#agregarNuevo').click(function(){
                id_usuario=$('#id_usuario').val();
                ci_usuario=$('#ci_usuario').val();
                nombre_usuario=$('#nombre_usuario').val();
                clave=$('#clave_usuario').val();
                nivel_usuario=$('#nivel_usuario').val();
                agregar_usuario(id_usuario, ci_usuario, nombre_usuario, clave, nivel_usuario)
            })
             /*para actualizar datos*/
            $('#actualizar_datos').click(function(){
                actualizarDatos();
            })
                
        })
    </script>
    </body>
</html>
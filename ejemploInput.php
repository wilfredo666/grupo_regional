<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario ATL</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script type="text/javascript" src="js/form_atl.js"></script>   
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

        <style>
        	input[name=hola] {
        	  width: 20%;
			  padding: 0px 0px;
			  margin: 5px 5px; 
			}	

			input[name=lobas]:focus {
			  background-color: #F9F7F6;
			}

			//PARA INPUTS EN ESPECIFICOS PUEDES CAMBIAR EN VEZ DE 'TYPE=NUMBER' A 'NAME=HOLA' O UN ID O CUALQUIER ATRIBUTO DEL INPUT
        </style>
    </head>

    <body>

    
    <div align="center">

    	<code>...............REDUCCION DE PADDING DE INPUTS NUMERICOS............</code><br><br>
		    <pre>INPUT CON BOOTSTRAP POR DEFECTO</pre>
		    <input type="number" style="width: 20%" class="form-control" name="bootstrap" value="0.123456"> 
		    <br><pre>SIN BOOTSTRAP </pre>
		    <input type="number" name="hola" value="0.123456"><br>
		    <br><pre>ALTERANDO EL CSS DE BOOTSTRAP</pre>
		    <input type="number" style="padding: 0px 0px; width: 20%; " class="form-control" value="0.123456"> 
		 <br><br><br>
	    <code>____________HERRAMIENTA DE POR SI ACASO xD____________</code> <br><br>
	    <pre>INPUT CON EVENTO AL ESCRIBIR (UTIL PARA EL INGRESO DE CALCULOS EN LOS INPUT DE COSTOS)</pre>
	    <br>		    
	    <input type="number" style="width: 20%;" name="lobas" class="form-control" placeholder="ESCRIBEME">
    </div>

      <script src="js/jquery-3.3.1.js"></script>
      <script src="bootstrap/js/bootstrap.js"></script>        
    </body>

</html>

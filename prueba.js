/*acceder elemento mediante etiqueta*/
var tg1 = document.getElementsByTagName("h1")[1];
var link= document.getElementsByTagName("a")[0];
console.log(tg1);
console.log(link.href); // acceso a un contenido especifico
/*acceder elemento por medio de su id*/
document.getElementById("lb1").innerHTML="holaa mundo para el label";
document.getElementById("ip1").value="entonces es una prueba";
function calculo(){
    n1=document.getElementById("num1").value
    n2=document.getElementById("num2").value
    document.getElementById("res").value=parseInt(n1)*parseInt(n2)
    /*se puede realizar operaciones indiferente del tipo de input (text o number) siempre y cuando se transforme en int en la funsion js, cuando se coloco el input de tipo number simplemente limita evitando la introduccion de letras*/
}

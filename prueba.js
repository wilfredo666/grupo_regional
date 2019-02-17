/*acceder elemento mediante etiqueta*/
var tg1 = document.getElementsByTagName("h1")[1];
var link= document.getElementsByTagName("a")[0];
console.log(tg1);
console.log(link.href); // acceso a un contenido especifico
/*acceder elemento por medio de su id*/
document.getElementById("lb1").innerHTML="holaa mundo para el label";
document.getElementById("ip1").value="entonces es una prueba";

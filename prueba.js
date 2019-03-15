/*acceder elemento mediante etiqueta*/
var tg1 = document.getElementsByTagName("h1")[0];
var link= document.getElementsByTagName("a")[0];
console.log(tg1);
console.log(link.href); // acceso a un contenido especifico
/*acceder elemento por medio de su id*/
document.getElementById("lb1").innerHTML="holaa mundo para el label";
document.getElementById("ip1").value="entonces es una prueba";
/*acceder al elemento mediante su id y luego su etiqueta*/
sel1=document.getElementById("sel1")
op1=sel1.getElementsByTagName("option")[1].innerHTML

sel2=document.getElementById("sel2")
sel2.getElementsByTagName("option")[1].innerHTML=op1

console.log(op1)
function cambio(){
   alert(document.getElementById("ip1").value)
}
function calculo(){
    n1=document.getElementById("num1").value
    n2=document.getElementById("num2").value
    document.getElementById("res").value=parseFloat(n1)*parseFloat(n2)
    /*se puede realizar operaciones indiferente del tipo de input (text o number) siempre y cuando se transforme en int en la funsion js, cuando se coloco el input de tipo number simplemente limita evitando la introduccion de letras*/
}
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
    /*$('#fecha').val(y+"-"+m+"-"+d)*/
    document.getElementById("fecha").value=y+"-"+m+"-"+d
}
/*funciones*/
function suma(a,b){
    
}
function mostrar(){
    alert(document.getElementById('num3').value)
}
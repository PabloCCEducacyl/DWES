var otrogenero = document.getElementById("otrogenero")
function otrotro(){
        otrogenero.removeAttribute('disabled');
        otrogenero.setAttribute('required', "true");}
function otrotrotro(){
        otrogenero.removeAttribute('required');
        otrogenero.setAttribute("disabled", "true");}

var diadehoy = new Date(); //sale algo así, (Tue Nov 15 2022 08:34:07 GMT+0100 (hora estándar de Europa central) que no sirve vaya 
var anno = diadehoy.getFullYear();                      //YYYY
var mes = ("0" + (diadehoy.getMonth() + 1)).slice(-2);  //MM
var dia = ("0" + (diadehoy.getDate())).slice(-2);       //DD


var diamax = (anno +"-"+ mes +"-"+ dia); // sale YYYY+MM+DD que es lo que nos sirve

        document.getElementById("fecha_nacimiento").setAttribute('max',diamax)

/*var fotomono = document.getElementsByClassName("foto-mono"),
function mono(){
        let stylemono = getComputedStyle("foto-mono")
        let alturamono = fotomono.getAttribute("height")
        let paddingmono = 200 - alturamono}
window.onload(){
        $.each( fotomono, function( key, value ) {
                alert( key + ": " + value );
              });
};*/
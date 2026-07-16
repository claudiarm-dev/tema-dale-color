//*** INICIO: BANNER + PLANTILLA ***//
$(function(){     
  //ANIMACIÓN DE ROTACIÓN   
  $('.carousel').carousel({
      interval: 3000
});

});
//*** FIN: BANNER + PLANTILLA ***//

//*** INICIO: SCROLL ***//
  //SUBIR
$(function() {
  $('.scrollTop').on('click', function(e){
    e.preventDefault();
    $('html, body').animate({scrollTop: 0}); //LA CLASE HACE EL LLAMADO DE CUANDO HAGAN CLICK SUBIR DESPACIO
});

  //QUE APAREZCA
$(window).scroll(function() {
  var scroll = $(window).scrollTop(); //CAPTURA CLASE DEL SCROLL
  if (scroll >= 50) { //SI ES MAYOR O IGUAL 50% AL HACER SCROLL
    $('.scrollTop').addClass('esconder'); //AGREGAR A LA CLASE "SCROLLTOP" LA CLASE "ESCONDER"
  } else {
     $('.scrollTop').removeClass('esconder');//SI NO ES MAYOR O = 50% ELIMINA LA CLASE "ESCONDER"
  }
  });
});
//*** FIN: SCROLL ***//

//*** INICIO: MOSTRAR DIV DEPENDIENDO LA SELECCIÓN ***//
$(document).ready(function () {
  $('select').change(function () { //SELECTOR
    $(this).find('option:selected') //SI ES SELECCIONADO UNA OPCIÓN 
      .each(function () {
        var optionValue = $(this).attr("value");
        if (optionValue) { //SI LA CLASE "CAJACOLOR" NO ESTA SELECCIONADO OCULTAR DIV
          $('.cajaColor').not('.' + optionValue).hide().animate({ opacity: 0 }, 800); //ANIMACION PARA DESAPARECER
          $('.' + optionValue).show().animate({ opacity: 1 }, 800);  //ANIMACION PARA MOSTRAR
          } else { //SI NO PASA LA CLASE "CAJACOLOR" SE DEBE MOSTRAR
            $('.cajaColor').hide().animate({ opacity: 0,}, 800);         
          }
      });
  }).change();
});
//*** FIN: MOSTRAR DIV DEPENDIENDO LA SELECCIÓN ***//

//*** INICIO: BOTÓN CALCULAR CANTIDAD "1 CUADRO" VALORES DE MEDIDAS + MATERIA + COLOR + MOLDURAS + MANO DE OBRA ***//
function f2(){ 
  //CAPTURA CLASE ALTO Y LARGO
  var a = +document.getElementById('alturaCuadro').value;
  var b = +document.getElementById('largoCuadro').value;

  //CAPTURA CLASE COLOR
  var w = document.getElementById('colorBlancas').checked;
  var x = document.getElementById('colorDoradas').checked;
  var y = document.getElementById('colorNegra').checked;
  var z = document.getElementById('colorPersonalizado').checked;

  //VALORES DE COLORES 
  var blanco = 1000;
  var doradas = 1500;
  var negro = 2000;
  var personalizado = 2500;

  //CAPTURA CLASE MOLDURAS
  var m = document.getElementById('molAluminio').checked;
  var n = document.getElementById('molRustica').checked;
  var o = document.getElementById('molGrecas').checked;

  //VALORES DE MOLDURAS 
  var aluminio = 10;
  var rustico = 15;
  var grecas = 20;


  //CALCULO POR MEDIDA, COLOR, MATERIAL Y MANO DE OBRA EN CM2
  if(w == true){ //SI SELECCIONA COLOR BLANCO
    if(m == true){ //SI SELECIONA ALUMINIO
      var total = (a*b*15)+(a*b*8)+(a*aluminio*2)+(b*aluminio*2)+blanco+10000; //CALCULA ALTOXLARGOXVALORVIDRIO + ALTOXLARGOXMADERABASE + ALTOXMOLDURA X 2 + LARGOXMOLDURAX2 + VALOR COLOR + MANO DE OBRA
      document.getElementById('total').innerHTML = (`$${total}`); //MUESTRA EL TOTAL + EL SIGNO $
    }else if(n == true){ //SI SELECIONA RUSTICO
      var total =  (a*b*15)+(a*b*8)+(a*rustico*2)+(b*rustico*2)+blanco+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else if(o == true){ //SI SELECIONA GRECAS
      var total = (a*b*15)+(a*b*8)+(a*grecas*2)+(b*grecas*2)+blanco+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else{
      document.getElementById('total').innerHTML = ('Wow debes rellenar y seleccionar'); //SI NO SELECCIONA UNA MOLDURA MENSAJE ERROR
    }     
  }else if(x == true){ //SI SELECCIONA COLOR DORADO
    if(m == true){ 
      var total = (a*b*15)+(a*b*8)+(a*aluminio*2)+(b*aluminio*2)+doradas+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else if(n == true){ 
      var total = (a*b*15)+(a*b*8)+(a*rustico*2)+(b*rustico*2)+doradas+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else if(o == true){ 
      var total = (a*b*15)+(a*b*8)+(a*grecas*2)+(b*grecas*2)+doradas+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else{
      document.getElementById('total').innerHTML = ('Wow debes rellenar y seleccionar'); 
    }   
  }else if(y == true){ //SI SELECCIONA COLOR NEGRO
    if(m == true){
      var total = (a*b*15)+(a*b*8)+(a*aluminio*2)+(b*aluminio*2)+negro+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else if(n == true){
      var total = (a*b*15)+(a*b*8)+(a*rustico*2)+(b*rustico*2)+negro+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else if(o == true){
      var total = (a*b*15)+(a*b*8)+(a*grecas*2)+(b*grecas*2)+negro+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else{
      document.getElementById('total').innerHTML = ('Wow debes rellenar y seleccionar');
    }
  }else if(z == true){ //SI SELECCIONA COLOR PERSONALIZADO
    if(m == true){
      var total = (a*b*15)+(a*b*8)+(a*aluminio*2)+(b*aluminio*2)+personalizado+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else if(n == true){
      var total = (a*b*15)+(a*b*8)+(a*rustico*2)+(b*rustico*2)+personalizado+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else if(o == true){
      var total = (a*b*15)+(a*b*8)+(a*grecas*2)+(b*grecas*2)+personalizado+10000;
      document.getElementById('total').innerHTML = (`$${total}`);
    }else{
      document.getElementById('total').innerHTML = ('Wow debes rellenar y seleccionar');
    }
  }else{
    document.getElementById('total').innerHTML = ('Wow debes rellenar y seleccionar'); //SI NO SELECCIONA UN COLOR
  } 
}
//*** FIN: BOTÓN CALCULAR CANTIDAD "1 CUADRO" VALORES DE MEDIDAS + MATERIA + COLOR + MOLDURAS + MANO DE OBRA ***//

//*** INICIO: BOTÓN CALCULAR CANTIDAD "2 CUADROS" VALORES DE MEDIDAS + MATERIA + COLOR + MOLDURAS + MANO DE OBRA ***//
function f3(){ 
  //CAPTURA CLASE ALTO Y LARGO
  var a = +document.getElementById('alturaCuadro1').value;
  var b = +document.getElementById('largoCuadro1').value;
  var c = +document.getElementById('alturaCuadro2').value;
  var d = +document.getElementById('largoCuadro2').value;

  //CAPTURA ÁREA TOTAL Y PERIMETRO
  var areaTotal = a*b+c*d;
  var perimetroTotal = 2*a+2*b+2*c+2*d;

  //CAPTURA CLASE COLOR
  var w = document.getElementById('colorBlancas1').checked;
  var x = document.getElementById('colorDoradas1').checked;
  var y = document.getElementById('colorNegra1').checked;
  var z = document.getElementById('colorPersonalizado1').checked;

  //VALORES DE COLORES 
  var blanco = 1000;
  var doradas = 1500;
  var negro = 2000;
  var personalizado = 2500;

  //CAPTURA CLASE MOLDURAS
  var m = document.getElementById('molAluminio1').checked;
  var n = document.getElementById('molRustica1').checked;
  var o = document.getElementById('molGrecas1').checked;

  //VALORES DE MOLDURAS 
  var aluminio = 10;
  var rustico = 15;
  var grecas = 20;


  //CALCULO POR MEDIDA, COLOR, MATERIAL Y MANO DE OBRA EN CM2
  if(w == true){ //SI SELECCIONA COLOR BLANCO
    if(m == true){ //SI SELECIONA ALUMINIO
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*aluminio)+blanco+14000; //CALCULA ALTOXLARGOXVALORVIDRIO + ALTOXLARGOXMADERABASE + ALTOXMOLDURA X 2 + LARGOXMOLDURAX2 + VALOR COLOR + MANO DE OBRA
      document.getElementById('totalDos').innerHTML = (`$${total}`); //MUESTRA EL TOTAL + EL SIGNO $
    }else if(n == true){ //SI SELECIONA RUSTICO
      var total =  (areaTotal*15)+(areaTotal*8)+(perimetroTotal*rustico)+blanco+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else if(o == true){ //SI SELECIONA GRECAS
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*grecas)+blanco+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else{
      document.getElementById('totalDos').innerHTML = ('Wow debes rellenar y seleccionar'); //SI NO SELECCIONA UNA MOLDURA MENSAJE ERROR
    }     
  }else if(x == true){ //SI SELECCIONA COLOR DORADO
    if(m == true){ 
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*aluminio)+doradas+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else if(n == true){ 
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*rustico)+doradas+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else if(o == true){ 
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*grecas)+doradas+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else{
      document.getElementById('totalDos').innerHTML = ('Wow debes rellenar y seleccionar'); 
    }   
  }else if(y == true){ //SI SELECCIONA COLOR NEGRO
    if(m == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*aluminio)+negro+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else if(n == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*rustico)+negro+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else if(o == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*grecas)+negro+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else{
      document.getElementById('totalDos').innerHTML = ('Wow debes rellenar y seleccionar');
    }
  }else if(z == true){ //SI SELECCIONA COLOR PERSONALIZADO
    if(m == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*aluminio)+personalizado+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else if(n == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*rustico)+personalizado+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else if(o == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*grecas)+personalizado+14000;
      document.getElementById('totalDos').innerHTML = (`$${total}`);
    }else{
      document.getElementById('totalDos').innerHTML = ('Wow debes rellenar y seleccionar');
    }
  }else{
    document.getElementById('totalDos').innerHTML = ('Wow debes rellenar y seleccionar'); //SI NO SELECCIONA UN COLOR
  } 
}
//*** FIN: BOTÓN CALCULAR CANTIDAD "2 CUADROS" VALORES DE MEDIDAS + MATERIA + COLOR + MOLDURAS + MANO DE OBRA ***//

//*** INICIO: BOTÓN CALCULAR CANTIDAD "3 CUADROS" VALORES DE MEDIDAS + MATERIA + COLOR + MOLDURAS + MANO DE OBRA ***//
function f4(){ 
  //CAPTURA CLASE ALTO Y LARGO
  var a = +document.getElementById('alturaCuadro3').value;
  var b = +document.getElementById('largoCuadro3').value;
  var c = +document.getElementById('alturaCuadro4').value;
  var d = +document.getElementById('largoCuadro4').value;
  var f = +document.getElementById('alturaCuadro5').value;
  var g = +document.getElementById('largoCuadro5').value;

  //CAPTURA ÁREA TOTAL Y PERIMETRO
  var areaTotal = a*b+c*d+f*g;
  var perimetroTotal = 2*a+2*b+2*c+2*d+2*f+2*g;

  //CAPTURA CLASE COLOR
  var w = document.getElementById('colorBlancas2').checked;
  var x = document.getElementById('colorDoradas2').checked;
  var y = document.getElementById('colorNegra2').checked;
  var z = document.getElementById('colorPersonalizado2').checked;

  //VALORES DE COLORES 
  var blanco = 1000;
  var doradas = 1500;
  var negro = 2000;
  var personalizado = 2500;

  //CAPTURA CLASE MOLDURAS
  var m = document.getElementById('molAluminio2').checked;
  var n = document.getElementById('molRustica2').checked;
  var o = document.getElementById('molGrecas2').checked;

  //VALORES DE MOLDURAS 
  var aluminio = 10;
  var rustico = 15;
  var grecas = 20;


  //CALCULO POR MEDIDA, COLOR, MATERIAL Y MANO DE OBRA EN CM2
  if(w == true){ //SI SELECCIONA COLOR BLANCO
    if(m == true){ //SI SELECIONA ALUMINIO
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*aluminio)+blanco+14000; //CALCULA ALTOXLARGOXVALORVIDRIO + ALTOXLARGOXMADERABASE + ALTOXMOLDURA X 2 + LARGOXMOLDURAX2 + VALOR COLOR + MANO DE OBRA
      document.getElementById('totalTres').innerHTML = (`$${total}`); //MUESTRA EL TOTAL + EL SIGNO $
    }else if(n == true){ //SI SELECIONA RUSTICO
      var total =  (areaTotal*15)+(areaTotal*8)+(perimetroTotal*rustico)+blanco+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else if(o == true){ //SI SELECIONA GRECAS
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*grecas)+blanco+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else{
      document.getElementById('totalTres').innerHTML = ('Wow debes rellenar y seleccionar'); //SI NO SELECCIONA UNA MOLDURA MENSAJE ERROR
    }     
  }else if(x == true){ //SI SELECCIONA COLOR DORADO
    if(m == true){ 
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*aluminio)+doradas+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else if(n == true){ 
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*rustico)+doradas+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else if(o == true){ 
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*grecas)+doradas+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else{
      document.getElementById('totalTres').innerHTML = ('Wow debes rellenar y seleccionar'); 
    }   
  }else if(y == true){ //SI SELECCIONA COLOR NEGRO
    if(m == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*aluminio)+negro+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else if(n == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*rustico)+negro+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else if(o == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*grecas)+negro+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else{
      document.getElementById('totalTres').innerHTML = ('Wow debes rellenar y seleccionar');
    }
  }else if(z == true){ //SI SELECCIONA COLOR PERSONALIZADO
    if(m == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*aluminio)+personalizado+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else if(n == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*rustico)+personalizado+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else if(o == true){
      var total = (areaTotal*15)+(areaTotal*8)+(perimetroTotal*grecas)+personalizado+14000;
      document.getElementById('totalTres').innerHTML = (`$${total}`);
    }else{
      document.getElementById('totalTres').innerHTML = ('Wow debes rellenar y seleccionar');
    }
  }else{
    document.getElementById('totalTres').innerHTML = ('Wow debes rellenar y seleccionar'); //SI NO SELECCIONA UN COLOR
  } 
}
//*** FIN: BOTÓN CALCULAR CANTIDAD "3 CUADROS" VALORES DE MEDIDAS + MATERIA + COLOR + MOLDURAS + MANO DE OBRA ***//

//*** INICIO: MENSAJE VALIDACIÓN ***//
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
//*** FIN: MENSAJE VALIDACIÓN ***//

//*** INICIO: VALIDACIÓN TELÉFONO ***//
function onlyNumberKey(evt) {
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
      return false;
  return true;
}
//*** INICIO: VALIDACIÓN TELÉFONO ***//


//*** INICIO: PLANTILLA POP UP ***//
$( document ).ready(function() {
  $('#popupInicio').modal('toggle')
});
//*** FIN: PLANTILLA POP UP ***//


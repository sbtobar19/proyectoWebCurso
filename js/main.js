(function () { // Para que se ejecute solo una vez
    "use strict";

    document.addEventListener('DOMContentLoaded', function () {

      /*var mapa = document.querySelector('#mapa');
if(mapa) {
   // coloca aquí tu código de los mapas
}  --- este codigo lo agregue en la seeccion 33, clase 258 de las preguntas, para evitar un futuro error en la seccion 38, 
//clase 294 en donde no me funcionaba la pagina de registro, ademas de esto copie todos los scripts*/

var mapa = document.querySelector('#mapa');
if(mapa) {
  //Codigo mapa inicio
  var map = L.map('mapa').setView([-33.4291298,-70.7056581], 15); //Cambiamos el L.map('map') por L.map('mapa') ya que nuestra variable es mapa. 
  //Tambien para darle la ubicación del mapa pegamos las coordenadas en este caso serian setView([-33.4291298,-70.7056581], 15); - el número , 15) hace referencia al zoom.

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([-33.4291298,-70.7056581]).addTo(map) //Cambiamos coordenadas en L.marker([-33.437057, -70.647860]).addTo(map), en este caso -33.4291298,-70.7056581 direccion que quieras
      .bindPopup('GDLWEBCAMP 2019 <br> Boletos ya disponibles') //Frase encima del puntero del mapa
      .openPopup()
      .bindTooltip('descripcion') //Aparece cuando te situas encima del puntero del mapa
      .openTooltip()

  //codigo mapa final
}

        //Creamos nuestras variables, seleccionando nuestros elemento anteriormente declarados en el registro.html para tener acceso a ellos.

        //Campos Datos, para los datos de registro.

        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        //Campos Pases

        var paseDia = document.getElementById('paseDia');
        var paseDosDias = document.getElementById('paseDosDias');
        var paseCompleto = document.getElementById('paseCompleto');

        //Botones y Divs

        var calcular = document.getElementById('calcular');
        var error = document.getElementById('error');
        var btnRegistro = document.getElementById('btnRegistro');
        var listaProducto = document.getElementById('listaProducto');
        var regalo = document.getElementById('regalo'); // Seccion 32, clase 247, en el video lo coloca fuera del 'DOMContentLoaded', 
        //revisando las preguntas dice que era por problema de cache, que si se puede colocar adentro, en caso de que de error colocarlo afuera del 'DOMContentLoaded' y 
        //averiguar por que no funcionaría correctamente si esta adentro de DOM.
        var sumaTotal = document.getElementById('sumaTotal');

        //Camisas y etiquetas

        var camisaEvento = document.getElementById('camisaEvento');
        var etiquetas = document.getElementById('etiquetas');

        //extras
        //desabilitando boton de pagar para que este desabilitado hasta que no den click en boton calcular
        btnRegistro.disabled = true;

        //Eventos

        //Codigo para corregir error en consola de addEventListener, seccion 38, clase 294. Al trabajar con un selector que no existe, marcara un error, 
        //por lo que hay que coloar el codigo dentro de un   if(document.getElementById('calcular')){}. Seleccionamos el calcular pero podemos seleccionar cualquiera de los de arriba

        if(document.getElementById('calcular')){ //Hace referencia a la explicacion de arriba. https://cybmeta.com/como-comprobar-si-un-elemento-existe-con-jquery -

        calcular.addEventListener('click', calcularMontos); //Creamos el evento 'click' para el boton de calcular y luego creamos la funcion "calcularMontos".

        paseDia.addEventListener('blur', mostrarDias); //Creamos el evento 'blur' que nos permite tomar el valor ingresado una vez que nos salgamos la selección de pases.
        paseDosDias.addEventListener('blur', mostrarDias);
        paseCompleto.addEventListener('blur', mostrarDias);

        nombre.addEventListener('blur', validarCampos); //Creamos el evento en nombre para validar campo de nombre
        apellido.addEventListener('blur', validarCampos); //Creamos el evento en appellido para validar campo de appellido
        email.addEventListener('blur', validarCampos); //Creamos el evento en email para validar campo de email
        email.addEventListener('blur', validarMail); //Creamos el evento en email para validar campo de email

        function validarCampos() { //Función para validar campos

            if (this.value == '') { //Si el valor del formulario esta vació situandose en el evento de nombre, en este caso en  formulario para a mandar una alerta.
                error.style.display = 'block';
                error.innerHTML = "Este campo es obligatorio";
                this.style.border = '1px solid red';
                error.style.border = '1px solid red';
            } else {
                error.style.display = 'none';
                this.style.border = '1px solid #cccccc';
            }
        }

        function validarMail() {

            if (this.value.indexOf("@") > -1) { //El index busca el caracter en la cadena o en un array, sino existe el valor arroja un -1 en caso de que el valor sea mayor a -1 va a pasar la validación
                error.style.display = 'none';
                this.style.border = '1px solid #cccccc';
            } else { //Mensaje sino tiene @, mejorar validación a futuro ya que presenta el mismo problema que las demas, cuando cambias de campos y vuelves lo marca correcto. seeccion 32, 255
                error.style.display = 'block';
                error.innerHTML = "Debe tener al menos un @";
                this.style.border = '1px solid red';
                error.style.border = '1px solid red'
            }
        }

        function calcularMontos(event) { //Creamos la funcion para calcularMontos
            event.preventDefault();
            if (regalo.value === '') { //Validamos la seleccion del regalo, sino toma nada aparece una alerta.
                alert("Debes elegir un regalo");
                regalo.focus(); //Hacemos focus en la selección de regalo.
            } else {
                var boletosDia = parseInt(paseDia.value, 10) || 0; //la función parseInt(,10)||0   /  Lo utilizamos para asegurarnos de que la función se cumpla correctamente al dar el "totalPagar".
                //console.log("Cantidad de boletos por día: " +boletosDia);
                var boletosDosDias = parseInt(paseDosDias.value, 10) || 0;
                //console.log("Cantidad de boletos por dos días: " + boletosDosDias);
                var boletoCompleto = parseInt(paseCompleto.value, 10) || 0;
                //console.log("Cantidad de boletos para todos días: " + boletoCompleto);

                var cantCamisas = parseInt(camisaEvento.value, 10) || 0;
                //console.log("Cantidad de camisas: " + cantCamisas);

                var cantEtiquetas = parseInt(etiquetas.value, 10) || 0;
                //console.log("Cantidad de etiquetas: " + cantEtiquetas);

                var totalPagar = (boletosDia * 30) + (boletosDosDias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);
                //console.log(totalPagar);

                var listadoProductos = [];//Declaramos un arreglo.

                    //forma de mostrar solo si ahi valores en el array
                    if (boletosDia >= 1){ //Los días son tomados desde el ID de Registro.html
                        listadoProductos.push(boletosDia + ' Pases por dia');
                    }
                    
                    if (boletosDosDias >= 1){
                        listadoProductos.push(boletosDosDias + ' Pases por dos dias');
                    }
                    
                    if (boletoCompleto >= 1){
                        listadoProductos.push(boletoCompleto + ' Pase completo');
                    }

                    if (cantCamisas >= 1){
                        listadoProductos.push(cantCamisas + ' Camisas');
                    }
                    
                    if (cantEtiquetas >= 1){
                        listadoProductos.push(cantEtiquetas + ' Etiquetas');
                    }
                    
                    listaProducto.style.display="block";

                    //forma de mostrar detalles de compra
                    listaProducto.innerHTML = '';

                    for (var i = 0; i< listadoProductos.length; i++) {
                        listaProducto.innerHTML += listadoProductos[i]+ '<br/>';
                    }
                    //la funcion toFixed es para mostar dos numeros despues de la coma
                    sumaTotal.innerHTML = "$ " + totalPagar.toFixed(2); //El toFixed es para que solo nos regrese dos decimales
                    
                    //habilitando boton de pagar para que este habilitado una ves que den click en boton calcular
                    btnRegistro.disabled = false;
                    //agregando el valor del total a pagar al input con el id de total_pedido existente en el html registro
                    document.getElementById('total_pedido').value = totalPagar;
            }
        }

        function mostrarDias() {

            var boletosDia = parseInt(paseDia.value, 10) || 0; //la función parseInt(,10)||0   /  Lo     utilizamos para asegurarnos de que la función se cumpla correctamente al dar el "totalPagar".
            //console.log("Cantidad de boletos por día: " +boletosDia);
            var boletosDosDias = parseInt(paseDosDias.value, 10) || 0;
            //console.log("Cantidad de boletos por dos días: " + boletosDosDias);
            var boletoCompleto = parseInt(paseCompleto.value, 10) || 0;
            //console.log("Cantidad de boletos para todos días: " + boletoCompleto);

            var diasElegidos = []; //Declaramos un arreglo.

            if (boletosDia > 0) { //Los días son tomados desde el ID de Registro.html
                diasElegidos.push('viernes'); //Si selecionamos pases para un dia mandara el pulso solo del menu del viernes, anexandolo al arreglo.
            }
            if (boletosDosDias > 0) {
                diasElegidos.push('viernes', 'sabado'); //Si selecionamos pases para dos dias mandara el pulso solo el menu del viernes y sabado, anexandolo al arreglo.
            }
            if (boletoCompleto > 0) {
                diasElegidos.push('viernes', 'sabado', 'domingo'); //Si selecionamos pases para todos los dias mandara pulso para todos los menues, anexandolo al arreglo
            }

            for (var i = 0; i < diasElegidos.length; i++) {
                document.getElementById(diasElegidos[i]).style.display = 'block'; //Recorrera el arreglo y tomando los pulso, pasara el elemento de display:none del CSS a block, mostrandose los menues.
            }

            //Sección 32, clase 252, el profesor pone el codigo en una de las preguntas para ocultar cuando se devuelva a 0 pero no funciona correctamente.
            /*if (diasElegidos.length == 0) {
            var todosDias = document.getElementsByClassName('contenido-dia');
            for (var i = 0; i < todosDias.length; i++) {
            todosDias[i].style.display = 'none';
             }
            }*/
        }
      } //Cierre del if para corrgir error de addEventListener
    }); //DOM CONTENT LOADED
})();

$(function(){

    //lettering
    $('.nombre-sitio').lettering();

    // agregar clase a menu
    //agregando barra de color naranja en la barra navegadora acorde a la pagina que estamos
    $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo')
    

    // menu fijo a lo larga de la pagina
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight){
            $('.barra').addClass('fixed');
            $('body').css({'margin-top':barraAltura+'px'});
        }else{
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top': '0px'});
        }
    });

    // menu resposivo modo hamburguesa
    // para que asi aparescan las opciones del menu
    
    $('.menu-movil').on('click', function(){
    $('.navegacion-principal').slideToggle();
    });
    // Reaccionar a Resize en la pantalla
    // para que vuelva aparecer el menu
    var breakpoint = 768;
    $(window).resize(function() {
         if($(document).width() >= breakpoint){
           $('.navegacion-principal').show();
         } else {
           $('.navegacion-principal').hide();
         }
    });


    //programa de conferencia
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function(){
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    });

    // plugin de jquery
    // animaciones para los numeros
    // el numero 1200 corresponde a lo que tardara en recorer los numeros
    // animateNumber es el metodo para que asi recorra los numeros
    $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6}, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15}, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}, 1500);
    $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9}, 1500);

    //cuenta regresiva
    $('.cuenta-regresiva').countdown('2020/12/10 09:00:00',function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    //ColorBox
    $('.invitado-info').colorbox({inline:true, width:"50%"});
    //estilo para pop up de boton registrar
    $('.boton_newsletter').colorbox({inline:true, width:"50%"});

});


<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <!--para implementar iconos descargar el archivo de Font Aweosone y luego copiar el all.min.css
   en la carpeta css y tambien copiar la carpeta de web fonts en la carpeta donde tiene el proyecto-->
  <link rel="stylesheet" href="css/all.min.css">
  <!--etiquetas par implementar nuevas fuentes-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"/>

  <?php
    //validando que se carge una hoja de estilo acorde a la pagina que accedemos
    //con el metodo basename($_SERVER['PHP_SELF']); almecenamos la ruta de la pagina que accedemos
    $archivo = basename($_SERVER['PHP_SELF']);

    //con el metodo str_replace('.php', "", $archivo); cambiamos o reemplazamos algo de la ruta 
    //acorde a la pagina que accedimos
    //orden del metodo primero va lo que se queiere reemplazar 
    //luego va por que se va a reemplazar
    // y por ultimo va la ruta a cual se reemplazara 
    //en este caso estamos pasando por parametros la ruta de la pagina que se reemplazara
    $pagina = str_replace(".php", "", $archivo);

    //en este caso si intramos a la pagina Invitados carga dicha hoja de estilo detallada en el echo
    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<link rel="stylesheet" href="css/colorbox.css">';
    }
    //en este caso si intramos a la pagina Conferencia carga dicha hoja de estilo detallada en el echo
    else if($pagina == 'conferencia'){
      echo '<link rel="stylesheet" href="css/lightbox.css">';
    }
  ?>

  <meta name="theme-color" content="#fafafa">
</head>

<body class = "<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <header class="site-header">
      <div class="hero">
          <div class="contenido-header">
              <nav class="redes-sociales">
                <!--metodo para poner icono de las redes sociales es copiar la etiqueta i-->
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-pinterest"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
              </nav>
              <div class="informativo-evento">
                <div class="clearfix">
                      <p class="fecha"><i class="fas fa-calendar-alt" aria-hidden="true"></i>10-12 Dic</p>
                      <p class="cuidad"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>Santiago, Ch</p>
                </div>
                  <h1 class="nombre-sitio">GdlWebCamp</h1>
                  <p class="eslogan">La mejor Conferencia de <span>diseño web</span></p>          
               </div>
      </div><!--hero-->
  </header>
  <div class="barra">
      <div class="contenedor clearfix">
          <div class="logo">
            <a href="index.php">
              <img src="img/logo.svg" alt="logo gdlwebcamp">
            </a>
          </div>

          <div class="menu-movil">
              <span></span>
              <span></span>
              <span></span>
          </div>

          <nav class="navegacion-principal clearfix">
              <a href="conferencia.php">Conferencia</a>
              <a href="calendario.php">Calendario</a>
              <a href="invitados.php">Invitados</a>
              <a href="registro.php">Reservaciones</a>
          </nav>
      </div><!--contenedor -->
  </div><!--barra -->
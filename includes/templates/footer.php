<footer class="site-footer">
    <div class="contenedor clearfix">
        <div class="footer-informacion">
            <h3>Sobre <span>gdlwebcamp</span></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, atque magnam ex aperiam beatae reprehenderit itaque consequatur est veritatis</p>
        </div>
        <div class="ultimos-tweets">
            <h3>ultimos <span>tweets</span></h3>
            <ul>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore necessitatibus eum sequi </li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore necessitatibus eum sequi </li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore necessitatibus eum sequi </li>
            </ul>
        </div>
        <div class="menu">
            <h3>redes <span>sociales</span></h3>
            <nav class="redes-sociales">
                <!--metodo para poner icono de las redes sociales es copiar la etiqueta i-->
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </nav>
        </div>
    </div>
    <p class="copyright">
        Todos Los Derechos Reservados GdlWebCamp 2016.
   </p>

<!-- Begin Mailchimp Signup Form -->
<!--pop up de mailchimp-->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>

<div style= "display:none;" >
    <div id="mc_embed_signup">
      <form action="https://gmail.us17.list-manage.com/subscribe/post?u=d136f666353261328faad7cb0&amp;id=ce5a62f92c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll">
            <h2>Suscribete al Newsletter y no te pierdas nada de este evento</h2>
          <div class="indicates-required">
            <span class="asterisk">*</span> es obligatorio
          </div>
          <div class="mc-field-group">
            <label for="mce-EMAIL">Tu Correo 
              <span class="asterisk">*</span>
            </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
          </div>
          <div id="mce-responses" class="clear">
              <div class="response" id="mce-error-response" style="display:none"></div>
              <div class="response" id="mce-success-response" style="display:none"></div>
          </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d136f666353261328faad7cb0_ce5a62f92c" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
          </div>
      </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
</div>

<!--End mc_embed_signup-->
</footer>

<!--fin del codigo html de la pagina creada por nosotros-->

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>

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
      echo '<script src="js/jquery.colorbox-min.js"></script>';
    }
    //en este caso si intramos a la pagina Conferencia carga dicha hoja de estilo detallada en el echo
    else if($pagina == 'conferencia'){
      echo '<script src="js/lightbox.js"></script>';
    }
  ?>

  <script src="js/main.js"></script>
  
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  
</body>

</html>

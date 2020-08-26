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

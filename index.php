<?php include_once 'includes/templates/header.php'; ?>
<section class = "seccion contenedor" >
    <h2>La mejor Conferencia De Diseño Web En Español</h2>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ratione ullam mollitia beatae reprehenderit animi temporibus repudiandae harum. Totam rem a accusantium maiores laboriosam assumenda aut corrupti nostrum fugiat cupiditate!
    </p>
</section><!--seccion-->

<section class="programa">
    <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg">
            <source src="videos/video.mp4" type="video/mp4">
            <source src="videos/video.webm" type="video/webm">
            <source src="videos/video.ogv" type="video/ogb">  
        </video>
    </div><!--contenedor video-->
    <div class="contenido-programa">
        <div class="contenedor">
            <div class="programa-evento">
            <?php
                //capturando error en caso de que la pagina no se conecte a la base de datos
                //mediante un try catch
                //o haya algun problema en la conexion
                try{
                //require_once es una funcion que agrega un archivo como la funcion include_once
                //se agrega la ruta del archivo a insertar
                //require_once sirve tambien para abrir la conexion a la base de datos
                //anidando tablas mediante una consulta en sql y anidando partes de la query con los signos .=
                require_once('includes/funciones/bd_conexion.php');
                $sql = " SELECT * FROM `categoria_evento` ";
                //almacenando en variable la conexion a la base de datos junto con la consulta 
                //acorde a la informacion a mostrar
                $resultado = $conn->query($sql);
                }
                catch(\Exception $e) {
                //almacenado y imprimiendo error en conexion a la base de datos
                echo $e->getMessage();
                }
            ?>
                <h2>Programa Del Evento</h2>
                <nav class="menu-programa">
                    <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){?>
                    <?php $categoria = $cat['cat_evento']; ?>
                        <a href="#<?php echo strtolower($categoria)?>">
                            <i class="<?php echo $cat['icono'];?>" aria-hidden="true"></i><?php echo $categoria; ?>
                        </a>
                    <?php } ?>
                </nav>
                <?php
                    //capturando error en caso de que la pagina no se conecte a la base de datos
                    //o haya algun problema en la conexion
                    try{
                        //require_once es una funcion que agrega un archivo como la funcion include_once
                        //se agrega la ruta del archivo a insertar
                        //require_once sirve tambien para abrir la conexion a la base de datos
                        //anidando tablas mediante una consulta en sql y anidando partes de la query con los signos .=
                        require_once('includes/funciones/bd_conexion.php');
                        $sql = " SELECT evento_id, 
                                        nombre_evento, 
                                        fecha_evento, 
                                        hora_evento, 
                                        cat_evento,
                                        icono, 
                                        nombre_invitado, 
                                        apellido_invitado ";
                        $sql .= " FROM eventos ";
                        $sql .= " INNER JOIN categoria_evento ";
                        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                        $sql .= " INNER JOIN invitados ";
                        $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                        $sql .= " AND eventos.id_cat_evento = 1 ";
                        $sql .= " ORDER BY evento_id  LIMIT 2; ";

                        //concatenando consulta sql
                        $sql .= " SELECT evento_id, 
                                        nombre_evento, 
                                        fecha_evento, 
                                        hora_evento, 
                                        cat_evento,
                                        icono, 
                                        nombre_invitado, 
                                        apellido_invitado ";
                        $sql .= " FROM eventos ";
                        $sql .= " INNER JOIN categoria_evento ";
                        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                        $sql .= " INNER JOIN invitados ";
                        $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                        $sql .= " AND eventos.id_cat_evento = 2 ";
                        $sql .= " ORDER BY evento_id  LIMIT 2; ";

                        //concatenando consulta sql
                        $sql .= " SELECT evento_id, 
                                        nombre_evento, 
                                        fecha_evento, 
                                        hora_evento, 
                                        cat_evento,
                                        icono, 
                                        nombre_invitado, 
                                        apellido_invitado ";
                        $sql .= " FROM eventos ";
                        $sql .= " INNER JOIN categoria_evento ";
                        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                        $sql .= " INNER JOIN invitados ";
                        $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                        $sql .= " AND eventos.id_cat_evento = 3 ";
                        $sql .= " ORDER BY evento_id  LIMIT 2; ";

                    }catch(\Exception $e) {
                        //almacenado y imprimiendo error en conexion a la base de datos
                        echo $e->getMessage();
                    }
                ?>

                <?php 
                    //el multi query es para realizar las variadas consultas a la base de datos
                    //registradas en la variable sql declarada anteriormente
                    $conn->multi_query($sql);
                ?>

                <?php 
                    do {
                        //almacenando en variable el resultado de la multi consulta a la base de datos
                        $resultado = $conn->store_result(); 
                        //almacenando el  valor de la variable Resultado que almanacena el obtenido de la consulta realizada a la base de datos
                        $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
                        <!-- declarando una variable para validar los eventos a mostrar por categoria-->
                        <?php $i = 0; ?>
                        <!-- recoriiendo el resultado de la cosulta realizada a la base de datos y almacenando el valor en una nueva variable -->
                        <?php foreach($row as $evento): ?>
                            <!-- validando los eventos que se van a mostrar por tipo de categoria  -->
                            <?php if($i % 2 == 0) {?>
                                <!-- echo strtolower($evento['cat_evento']); imprime la categoria del evento desde la base de datos-->
                                <div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar clearfix">
                            <?php }?>
                                <div class="detalle-evento">
                                    <!-- echo utf8_encode($evento['nombre_evento']); imprime el nombre del evento desde la base de datos-->
                                    <h3><?php echo ($evento['nombre_evento']); ?></h3>
                                    <!-- echo $evento['hora_evento'];  imprime la hora del evento desde la base de datos-->
                                    <p><i class="far fa-clock" aria-hidden="true"></i><?php echo $evento['hora_evento']; ?></p>
                                    <!-- echo $evento['fecha_evento'];  imprime la fecha del evento desde la base de datos-->
                                    <p><i class="far fa-calendar-alt"></i><?php echo $evento['fecha_evento']; ?></p>
                                    <!-- echo $evento['nombre_invitado'];  imprime el nombre del invitado al evento desde la base de datos-->
                                    <p><i class="fas fa-user" aria-hidden="true"></i><?php echo $evento['nombre_invitado'] ." " .$evento['apellido_invitado'] ; ?></p>
                                </div>
                            <?php if ($i % 2 == 1):?>
                                <a href="calendario.php" class="button float-right"> Ver todos</a>
                                </div> <!--talleres-->
                            <?php endif; ?> 
                        <!-- auto incrementando el valor de variable i-->   
                        <?php $i++; ?>
                        <!-- cierre de foreach-->  
                        <?php endforeach; ?>
                        <?php $resultado->free(); ?>
                    <?php } while ($conn->more_results() && $conn->next_result()); ?>





                </div> <!--talleres-->
            </div><!--programa evento-->
        </div><!--contenedor-->
    </div><!--contenido-programa-->
</section><!--programa-->

<?php include_once 'includes/templates/invitados.php'; ?>

<div class="contador parallax">
    <div class="contenedor">
        <ul class="resumen-evento clearfix">
            <li><p class="numero"></p>Invitados</li>
            <li><p class="numero"></p>Talleres</li>
            <li><p class="numero"></p>Dias</li>
            <li><p class="numero"></p>Conferencias</li>
        </ul>
    </div>
</div><!--contenedor resumen evento-->

<section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
        <ul class="lista-precios clearfix">
            <li>
                <div class="tabla-precio">
                    <h3>Pase por dia</h3>
                    <p class="numero">$30</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>
            <li>
                <div class="tabla-precio">
                    <h3>Todos los dias</h3>
                    <p class="numero">$50</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button">Comprar</a>
                </div>
            </li>
            <li>
                <div class="tabla-precio">
                    <h3>Pase por 2 dias</h3>
                    <p class="numero">$45</p>
                    <ul>
                        <li>Bocadillos Gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>
        </ul>
    </div>
</section><!--precio entradas-->

<div id="mapa" class="mapa"></div>

<section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
            <!--forma para hacer una caja de comentario o testimonio-->
            <blockquote>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem ab, perspiciatis unde dignissimos nihil impedit iste veritatis quod ratione maxime ad recusandae debitis, nulla tenetur? Necessitatibus at neque in quos.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo aponte Escobedo <span>Diseñador en @prisma</span></cite>
                </footer>
            </blockquote>
        </div><!--fin testimonial-->

        <div class="testimonial">
            <!--forma para hacer una caja de comentario o testimonio-->
            <blockquote>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem ab, perspiciatis unde dignissimos nihil impedit iste veritatis quod ratione maxime ad recusandae debitis, nulla tenetur? Necessitatibus at neque in quos.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo aponte Escobedo <span>Diseñador en @prisma</span></cite>
                </footer>
            </blockquote>
        </div><!--fin testimonial-->

        <div class="testimonial">
            <!--forma para hacer una caja de comentario o testimonio-->
            <blockquote>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem ab, perspiciatis unde dignissimos nihil impedit iste veritatis quod ratione maxime ad recusandae debitis, nulla tenetur? Necessitatibus at neque in quos.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>Oswaldo aponte Escobedo <span>Diseñador en @prisma</span></cite>
                </footer>
            </blockquote>
        </div><!--fin testimonial-->
    </div>
</section>

<div class="newsletter parallax">
    <div class="contenido contenedor">
        <p>Registrate al Newsletter</p>
        <h3>gdlwebcamp</h3>
        <a href="#" class="button transparente"> Registro</a>
    </div><!--contenido-->
</div><!--newsletter-->

<section class="seccion">
    <h2>faltan</h2>
    <div class="cuenta-regresiva contenedor">
        <ul class="clearfix">
            <li><p id="dias" class="numero"></p> Dias</li>
            <li><p id="horas" class="numero"></p> Horas</li>
            <li><p id="minutos" class="numero"></p> Minutos</li>
            <li><p id="segundos" class="numero"></p> Segundos</li>
        </ul>
    </div>
</section><!--cuenta regresiva-->

<?php include_once 'includes/templates/footer.php'; ?>
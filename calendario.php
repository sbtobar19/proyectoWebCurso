<?php include_once 'includes/templates/header.php'; ?>


<!--seccion de fotos con plugin de expancion-->
<!--plugin de expancion data-lightbox="galeria"-->
<section class="seccion contenedor">
    <h2>Calendario de Eventos</h2>

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
            $sql .= " ORDER BY evento_id ";
            //almacenando en variable la conexion a la base de datos junto con la consulta 
            //acorde a la informacion a mostrar
            $resultado = $conn->query($sql);
        }catch(\Exception $e) {
            //almacenado y imprimiendo error en conexion a la base de datos
            echo $e->getMessage();
        }
    ?>
    <div class="calendario">
        <?php
            $calendario = array();

            //fetch_assoc es una funcion con la cual definimos la forma 
            //que imprime los resultado de la consulta
            //almacendamos la impresion de los resultado de la consulta en una variable
            //con el siclo while imprimimos todos los resultado de la consulta
            while($eventos = $resultado->fetch_assoc()){  
                //obtenido fechas de los eventos 
                $fecha = $eventos['fecha_evento'];
                //insertando informacion de la consulta a la base de datos en un arreglo
                //acorde a los valores que queremos mostrar 
                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
                );
                //almacenado el arreglo que almacena el resultado de la consulta a la base de datos dentro de otro arreglo
                //el array calendario agrupa los valores obtenidos desde la consulta realizada a la base de datos
                //con el campo fecha dentro de los corchetes estamosa agrupando los eventos acorde a su fecha
                $calendario[$fecha][] = $evento;
                ?>
                <?php } //cierre de ciclo while fetch_assoc ?>

                <?php
                    // imprime todos los eventos
                    foreach($calendario as $dia => $lista_eventos){ ?>
                        <h3>
                            <i class="far fa-calendar-alt"></i>
                            <?php 
                                //formas de imprimir las fechas de los eventos
                                //unix
                                setlocale(LC_TIME,'es_ES.utf-8');

                                //windows
                                //se agrega el utf-8 para que imprima sin caracteres raro la fecha
                                setlocale(LC_TIME, 'spanish.UTF-8');

                                echo strftime("%A, %d de %B del %Y",strtotime($dia)); 
                            ?>
                        </h3>

                        <?php 
                            foreach($lista_eventos as $evento){?>
                            <div class="dia">
                                <p class="titulo"><?php echo $evento['titulo']; ?></p>
                                <p class="hora">
                                    <i class = "far fa-clock" aria-hidden = "true"></i> 
                                    <!-- imprimiendo la fecha y hora desde la consulta realizada
                                         a la base de datos y que se almacena en el array evento -->
                                    <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                                </p>
                                <p>
                                    <!-- imprimiendo los iconos desde la consulta realizada
                                         a la base de datos y que se almacena en el array evento -->
                                    <i class = "<?php echo $evento['icono']; ?>" aria-hidden = "true"></i> 
                                    <!-- imprimiendo las categorias desde la consulta realizada
                                         a la base de datos y que se almacena en el array evento -->
                                    <?php echo $evento['categoria']; ?>
                                </p>
                                <p>
                                    <i class="fas fa-user" aria-hidden="true"></i>
                                    <!-- imprimiendo los invitados desde la consulta realizada
                                         a la base de datos y que se almacena en el array evento -->
                                    <?php echo $evento['invitado']; ?>
                                </p>
                                <!--<pre>
                                    <?php 
                                    //mostrando los valores obtenidos de la consulta realizada a la base de datos
                                    //no se puede imprimir resultado de una consulta con un echo
                                    //var_dump ($evento);
                                    ?>
                                </pre>-->
                            </div>

                           <?php } // cierre de foreach ($lista_eventos as $evento) ?>

                    <?php } // ciere de foreach ($calendario as $dia => $lista_eventos)?>
                <!--<pre>
                    <?php 
                    //mostrando los valores obtenidos de la consulta realizada a la base de datos
                    //no se puede imprimir resultado de una consulta con un echo
                    //var_dump ($calendario);
                    ?>
                </pre>-->


            
    </div><!--cierre div calendario-->
    <?php 
        //con la funcion close cerramos la conexion a la base de datos
        $conn->close();
    ?>

</section>

<?php include_once 'includes/templates/footer.php'; ?>
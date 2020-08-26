<!--seccion de fotos con plugin de expancion-->
<!--plugin de expancion data-lightbox="galeria"-->

<?php
        //capturando error en caso de que la pagina no se conecte a la base de datos
        //o haya algun problema en la conexion
        try{
            //require_once es una funcion que agrega un archivo como la funcion include_once
            //se agrega la ruta del archivo a insertar
            //require_once sirve tambien para abrir la conexion a la base de datos
            //anidando tablas mediante una consulta en sql y anidando partes de la query con los signos .=
            require_once('includes/funciones/bd_conexion.php');
            //se ocupan estas comillas para seleccionar la tabla ``
            $sql = " SELECT * from `invitados`";
            //almacenando en variable la conexion a la base de datos junto con la consulta 
            //acorde a la informacion a mostrar
            $resultado = $conn->query($sql);
        }catch(\Exception $e) {
            //almacenado y imprimiendo error en conexion a la base de datos
            echo $e->getMessage();
        }
    ?>
    <section class="invitados contenedor seccion">
        <h2>Nuestros Invitados</h2>
        <ul class="lista-invitados clearfix">
            <?php
                while($invitados = $resultado->fetch_assoc()){  ?>
                    <li>
                        <div class="invitados">
                            <a class = "invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
                                <img src="img/<?php echo $invitados['url_imagen']?>" alt="imagen invitado">
                                <p><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']?></p>
                            </a>
                        </div>
                    </li>
                    <div style = "display:none;">
                        <div class ="invitado-info" id = "invitado<?php echo $invitados['invitado_id']; ?>">
                            <h2><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?></h2>
                            <img src="img/<?php echo $invitados['url_imagen']?>" alt="imagen invitado">
                            <p> <?php echo $invitados['descripcion'] ?> </p>
                        </div>
                    </div>

                    
            <?php } //cierre de ciclo while fetch_assoc ?>
        </ul>
    </section><!--invitados-->
    <?php 
        //con la funcion close cerramos la conexion a la base de datos
        $conn->close();
    ?>
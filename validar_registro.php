<?php 
      //se movio todo para arriba para evitar que almomento de recargar la pagina que muestra luego
      //de insertar los registros no vuelva a insertar nuevamente registros al momento de recargarla
      //obteniendo metodo post que obtiene valores del registro una ves que se va a pagar
      if(isset($_POST['submit'])):
            //almacenando valores obteniedos del metodo post en variables 
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $regalo = $_POST['regalos'];
            $total = $_POST['total_pedido'];
            $fecha = date('Y-m-d H:i:s');

            //PEDIDOS
            //almacenando los valores obteniedos del metodo post en arreglos
            //ya que estos resultado del metodo post tienen mas de un valor 
            //por eso se almacenandn como un arreglo
            $boletos = $_POST['boletos'];
            $camisas = $_POST['pedido_camisas'];
            $etiquetas = $_POST['pedido_etiquetas'];

            //primero llamamos al metodo json creado y almacenado en otro archivo php 
            //en la ruta includes/funciones/funciones.php 
            include_once 'includes/funciones/funciones.php';
            //luego inicialisamos el metodo json 
            //luego pasamos las variables a utilizar
            //por parametros en el mismo orden 
            //que la declaramos en el metodo creado en
            //includes/funciones/funciones.php 
            //almecenamos el valor que retorna el metodo json en una variable 
            $pedido = productos_json($boletos, $camisas, $etiquetas);

            //EVENTOS
            $eventos = $_POST['registro'];

            $registo = eventos_json($eventos);

            try{
                  //require_once es una funcion que agrega un archivo como la funcion include_once
                  //se agrega la ruta del archivo a insertar
                  //require_once sirve tambien para abrir la conexion a la base de datos
                  require_once('includes/funciones/bd_conexion.php');
                  //stmt signifia una variable que almacena un valor o una query de sql
                  //el metodo prepare es para que la conexion a la base de datos 
                  //se vaya preparando por que se ejecutara algun tipo de query para la base de datos
                  //se declara de la siguiente forma primero va la variable
                  //que almacena la conexion a la base de datos y luego signo y flecha ->
                  //y por ultimo la query que se ejecutara entre parentesis y comillas dobles
                  //y estamos almacenando la query en una variable 
                  //los valores a insertar se dejan con el signo de ? ya que en otra función
                  //setiaremos los valores de ? por los valores que se agregaran a la base de datos
                  $stmt = $conn->prepare("INSERT INTO registrados(nombre_registrado
                                                                 ,apellido_registrado
                                                                 ,email_registrado
                                                                 ,fecha_registro
                                                                 ,pases_articulos
                                                                 ,talleres_registrados
                                                                 ,regalo 
                                                                 ,total_pagado)
                                           values(?,?,?,?,?,?,?,?)");
                  //el metodo bind_param es el que agregara los valores a la base de datos 
                  //mediante la query insert que realizamos arriba
                  //pero primero se agregan los tipos de datos de cada parametros que seleccionamos 
                  //en la consulta para insertar y tienen que ser la misma cantidad de registros
                  //a los cuales se le insertara datos por eso primero esta esto dentro de las parentesis
                  //ssssssis siginifica que los 6 primeros son tipos de datos string o texto
                  //el 7 es un tipo de dato numerico y el 8 es string o texto
                  //y luego de agregar los tipos de datos de las columnas que se insertara información
                  //van las variables que traen los valores a insertar
                  //las variables $pedido y $regalo son los valores que obtenimos de los json que creamos
                  //para obtener de forma correcta los valores
                  $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registo, $regalo, $total);
                  //con el metodo execute estamos diciendole a la variable
                  //que ejecute la query que almacena y que agrege los valores acorde a como los detallamos
                  $stmt->execute();
                  $stmt->close();
                  $conn->close();
                  //con este metodo le agregamos un valor a la url de lapagina que se carga luego
                  //de insertar los valores para que no se agregen
                  //nuevamente los datos insertados al momento de recargar la pagina
                  header('Location: validar_registro.php?exitoso=1');
            } catch(Exception $e) {
                  //almacenado y imprimiendo error en conexion a la base de datos
                  echo $e->getMessage();
            }
      ?>
      <?php endif; ?>

<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
      <h2>Resumen Registros</h2>

      <?php 
            // primero validamos si en la url de la pagina se returna el valor de exitoso 
            //mediante el metodo get obtiene los valores de la url de la pagina
            if(isset($_GET['exitoso']));
                  //luego validamos si el valor de exitoso es igual a 1
                  if($_GET['exitoso'] == "1"):
                        //muestra este mensaje si el valor de exitoso es igual a 1
                        echo = "Registro Exitoso";
                  //cierre del if
                  endif;
            //cierre del if
            endif;

      //obteniendo metodo post que obtiene valores del registro una ves que se va a pagar
      //if(isset($_POST['submit'])):
            //almacenando valores obteniedos del metodo post en variables 
            //$nombre = $_POST['nombre'];
            //$apellido = $_POST['apellido'];
            //$email = $_POST['email'];
            //$regalo = $_POST['regalos'];
            //$total = $_POST['total_pedido'];
            //$fecha = date('Y-m-d H:i:s');

            //PEDIDOS
            //almacenando los valores obteniedos del metodo post en arreglos
            //ya que estos resultado del metodo post tienen mas de un valor 
            //por eso se almacenandn como un arreglo

            //$boletos = $_POST['boletos'];
            //$camisas = $_POST['pedido_camisas'];
            //$etiquetas = $_POST['pedido_etiquetas'];

            //primero llamamos al metodo json creado y almacenado en otro archivo php 
            //en la ruta includes/funciones/funciones.php 

            //include_once 'includes/funciones/funciones.php';

            //luego inicialisamos el metodo json 
            //luego pasamos las variables a utilizar
            //por parametros en el mismo orden 
            //que la declaramos en el metodo creado en
            //includes/funciones/funciones.php 
            //almecenamos el valor que retorna el metodo json en una variable 

            //$pedido = productos_json($boletos, $camisas, $etiquetas);

            //EVENTOS
            //$eventos = $_POST['registro'];

            //$registo = eventos_json($eventos);

            //try{
                  //require_once es una funcion que agrega un archivo como la funcion include_once
                  //se agrega la ruta del archivo a insertar
                  //require_once sirve tambien para abrir la conexion a la base de datos

                  //require_once('includes/funciones/bd_conexion.php');

                  //stmt signifia una variable que almacena un valor o una query de sql
                  //el metodo prepare es para que la conexion a la base de datos 
                  //se vaya preparando por que se ejecutara algun tipo de query para la base de datos
                  //se declara de la siguiente forma primero va la variable
                  //que almacena la conexion a la base de datos y luego signo y flecha ->
                  //y por ultimo la query que se ejecutara entre parentesis y comillas dobles
                  //y estamos almacenando la query en una variable 
                  //los valores a insertar se dejan con el signo de ? ya que en otra función
                  //setiaremos los valores de ? por los valores que se agregaran a la base de datos

                  //$stmt = $conn->prepare("INSERT INTO registrados(nombre_registrado
                                                                 //,apellido_registrado
                                                                 //,email_registrado
                                                                 //,fecha_registro
                                                                 //,pases_articulos
                                                                 //,talleres_registrados
                                                                 //,regalo 
                                                                 //,total_pagado)
                                           //values(?,?,?,?,?,?,?,?)");

                  //el metodo bind_param es el que agregara los valores a la base de datos 
                  //mediante la query insert que realizamos arriba
                  //pero primero se agregan los tipos de datos de cada parametros que seleccionamos 
                  //en la consulta para insertar y tienen que ser la misma cantidad de registros
                  //a los cuales se le insertara datos por eso primero esta esto dentro de las parentesis
                  //ssssssis siginifica que los 6 primeros son tipos de datos string o texto
                  //el 7 es un tipo de dato numerico y el 8 es string o texto
                  //y luego de agregar los tipos de datos de las columnas que se insertara información
                  //van las variables que traen los valores a insertar
                  //las variables $pedido y $regalo son los valores que obtenimos de los json que creamos
                  //para obtener de forma correcta los valores

                  //$stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registo, $regalo, $total);
                  
                  //con el metodo execute estamos diciendole a la variable
                  //que ejecute la query que almacena y que agrege los valores acorde a como los detallamos
                  
                  //$stmt->execute();
                  //$stmt->close();
                  //$conn->close();
            //} catch(Exception $e) {

                  //almacenado y imprimiendo error en conexion a la base de datos

                  //echo $e->getMessage();
            //}
      ?>

      <?php //endif; ?>
</section>

<?php include_once 'includes/templates/footer.php'; ?>
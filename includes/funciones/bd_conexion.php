<?php
    //order de declarar la variable que conecta a la base de datos
    //puerto o servidor, usuario, contraseña , base de datos a conectar
    $conn = new mysqli('localhost', 'root','', 'gdlwebcamp');

    //validnado si la conexion se realizo correctamente
    //si no nos muestra el error por cual no se conecto a la base de datos
    if($conn->connect_error){
        echo $error-> $conn->connect_error;
    }

?>
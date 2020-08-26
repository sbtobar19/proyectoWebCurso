<?php
    //pasando por parametros los valores obtenidos del metodo post submit
    //almacenados en las variables $boletos,$camisas,$etiquetas existente en archivo
    //validar registros .php
    //el campo de los voletos tiene que ser obligatorio por ese motivo
    //no se le asigna un valor a diferencia de las otras variables
    //a las variables se le agrega el signo de & 
    //sirve para que se pase por referencia el valor de la variable 
    function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0){
        //asignando valores a array de dias
        $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'dos_dias');    
        //la funcion array_combine es para unir dos array 
        //mesclando sus valores para poder idenficiar 
        //mejor cada valor del array
        $total_boletos = array_combine($dias, $boletos);
        
        $json = array();

        //recoriendo la cantidad de boletos 
        //acorde a los valores que se seleccione en los boletos
        foreach($total_boletos as $key => $boletos):
            //si la cantidad de boletos seleccionados es mayor a 0
            //almacena en valor como un dato int en la variable json
            if((int)$boletos > 0):
                $json[$key] = (int) $boletos;
            endif;
        endforeach;

        //agregando al json las cantidades de camisas seleccionadas 
        $camisas = (int) $camisas;
        //si la cantidad de camisas seleccionadas es mayor a 0 
        //se agrega el valor en el json
        if($camisas > 0):
            $json['camisas'] = $camisas;
        endif;

        //agregando al json las cantidades de etiquetas seleccionadas 
        $etiquetas = (int) $etiquetas;
        //si la cantidad de etiquetas seleccionadas es mayor a 0 
        //se agrega el valor en el json
        if($etiquetas > 0):
            $json['etiquetas'] = $etiquetas;
        endif;

        return json_encode($json);
    }

    function eventos_json(&$eventos){
        //siempre que se utiliza el metodo json_encode la variable tiene que ser un arreglo
        $eventos_json = array();
        foreach($eventos as $evento):
            //se agrega unos [] vacios para que muestre y almacena todos los eventos seleccionados
            $eventos_json['eventos'][] = $evento;
        endforeach;

        return json_encode($eventos_json);
    }
?>
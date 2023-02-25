<?php

    $num1 = 654;
    $num2 = 0;

    try{
        //intentámos hacer
        $resultado = $num1/$num2;
        $msg = 'el resultado es: '.$resultado;
    }
    catch ( Error $e ){
        // si fallara el try
        //log de errores
        echo $e->getMessage();
        echo $e->getFile();
        echo $e->getLine();
        echo '<br>';
        $msg = 'no se puede dividir por 0';
    }


    echo $msg;
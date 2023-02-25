<?php

    /* CRUD de marcas */
    function listarMarcas() : mysqli_result | false
    {
        $link = conectar();
        $sql = "SELECT * FROM marcas";
        try {
            $resultado = mysqli_query( $link, $sql );
        }
        catch ( Exception $e ){
            /* log de errores */
            echo $e->getMessage();
            $resultado = false;
        }
        return $resultado;
    }

    function verMarcaPorID()
    {

    }
    function agregarMarca()
    {

    }
    function modificarMarca()
    {

    }
    function eliminarMarca()
    {

    }

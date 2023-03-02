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
    function agregarMarca() : bool
    {
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "INSERT INTO marcas 
                            ( mkNombre )
                       VALUE 
                            ( '".$mkNombre."' )";
        try {
            $resultado = mysqli_query($link, $sql);
            return $resultado;
        }
        catch ( Exception $e ){
            /* log de errores */
            echo $e->getMessage();
            return false;
        }
    }
    function modificarMarca()
    {

    }
    function eliminarMarca()
    {

    }

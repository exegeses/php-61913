<?php

    /* CRUD de marcas */
    function listarMarcas() : mysqli_result | false
    {
        $link = conectar();
        $sql = "SELECT * FROM marcas";
        try {
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception $e ){
            /* log de errores */
            echo $e->getMessage();
            $resultado = false;
        }
        return $resultado;
    }

    function verMarcaPorID() : array | false
    {
        $idMarca = $_GET['idMarca'];
        $link = conectar();
        $sql = "SELECT * FROM marcas
                    WHERE idMarca = ".$idMarca;
        try{
            $resultado = mysqli_query($link, $sql);
            $marca = mysqli_fetch_assoc($resultado);
            return $marca;
        }
        catch ( Exception $e ){
            /* log de errores */
            echo $e->getMessage();
            header('refresh:3;url=adminMarcas.php');
            return false;
        }
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
    function modificarMarca() : bool
    {
        $idMarca = $_POST['idMarca'];
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql = "UPDATE marcas
                   SET mkNombre = '".$mkNombre."'
                   WHERE idMarca = ".$idMarca;
        try {
            $resultado = mysqli_query($link, $sql);
            header('refresh:3;url=adminMarcas.php');
            return $resultado;
        }
        catch ( Exception $e ){
            /* log de errores */
            echo $e->getMessage();
            return false;
        }
    }
    function eliminarMarca()
    {

    }

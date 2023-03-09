<?php

    /* CRUD de marcas */
    function listarMarcas() : mysqli_result | false
    {
        $link = conectar();
        $sql = "SELECT * FROM marcasX";
        try {
            $resultado = mysqli_query( $link, $sql );
            /* log de errores */
            $arch = 'log/marcas/logAdminMarcas.txt';
            $logAdminMarcas = fopen($arch, 'a');
            $contenido = date('d/m/Y H:i:s')."\n";
            $contenido .= 'mensaje: '.mysqli_error($link)."\n";
            $contenido .= 'Archivo: '.$e->getFile()."\n";
            $contenido .= 'Nro Línea: '.$e->getLine()."\n";
            $contenido .= 'Mensaje: '.$e->getMessage()."\n";
            $contenido .= '----------------------'."\n";
            fwrite($logAdminMarcas, $contenido );
            fclose($logAdminMarcas);
            //echo $e->getMessage();
            return $resultado;
        }
        catch ( Exception $e ){
            /* log de errores */
           /* $arch = 'log/marcas/logAdminMarcas.txt';
            $logAdminMarcas = fopen($arch, 'a');
            $contenido = date('d/m/Y H:i:s')."\n";
            //$contenido .= 'mensaje: '.mysqli_error($link)."\n";
            $contenido .= 'Archivo: '.$e->getFile()."\n";
            $contenido .= 'Nro Línea: '.$e->getLine()."\n";
            $contenido .= 'Mensaje: '.$e->getMessage()."\n";
            $contenido .= '----------------------'."\n";
            fwrite($logAdminMarcas, $contenido );
            fclose($logAdminMarcas);*/
            echo $e->getMessage();
            echo 'NO va a ejecutar el log del try, una vez más';
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
    function checkProductoXMarca( int $idMarca ) : int
    {
        $link = conectar();
        $sql = "SELECT 1 FROM productos
                    WHERE idMarca = ".$idMarca;
        try {
            $resultado = mysqli_query( $link, $sql );
            $cantidad = mysqli_num_rows($resultado);
        }
        catch ( Exception $e ){
            /* log de errores */
            echo $e->getMessage();
            $cantidad = 0;
        }
        return $cantidad;
    }

    function eliminarMarca( int $idMarca ) : bool
    {
        $link = conectar();
        $sql = "DELETE FROM marcas
                    WHERE idMarca = ".$idMarca;
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

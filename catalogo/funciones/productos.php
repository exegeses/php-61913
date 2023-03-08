<?php

########################
### CRUD de productos
########################

    function listarProductos() : mysqli_result | false
    {
        $link = conectar();
        $sql = "SELECT idProducto, prdNombre, prdPrecio, 
                       marcas.idMarca, mkNombre,
                       categorias.idCategoria, catNombre,
                       prdImagen
                   FROM productos, marcas, categorias
                   WHERE marcas.idMarca = productos.idMarca
                     AND categorias.idCategoria = productos.idCategoria";
        try {
            $resultado = mysqli_query( $link, $sql );
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }

    function subirImagen() : string
    {
        //si no enviaron archivo
        $prdImagen = 'noDisponible.png';

        //si enviaron archivo
        if( $_FILES['prdImagen']['error'] == 0 ){
            //$prdImagen = pref.ext;
            $time = microtime(true);
            $ext = pathinfo( $_FILES['prdImagen']['name'], PATHINFO_EXTENSION );
            $prdImagen = $time.'.'.$ext;
            ####subir archivo
            $tmp = $_FILES['prdImagen']['tmp_name'];
            $path = 'productos/';
            move_uploaded_file($tmp, $path.$prdImagen);
        }

        return $prdImagen;
    }

    function agregarProducto() : bool
    {
        //captuaramos detos enviados por el form
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];
        $prdImagen = subirImagen();

        $link = conectar();
        $sql = "INSERT INTO productos 
                    ( prdNombre, prdPrecio, idMarca, idCategoria, prdDescripcion, prdImagen )
                    VALUE 
                    ( 
                     '".$prdNombre."',
                     ".$prdPrecio.",
                     ".$idMarca.",
                     ".$idCategoria.",
                     '".$prdDescripcion."',
                     '".$prdImagen."'
                     )";

        try {
            $resultado = mysqli_query($link, $sql);
            return $resultado;
        }
        catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }

        return true;
    }
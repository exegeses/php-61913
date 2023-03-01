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
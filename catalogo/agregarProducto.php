<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/productos.php';
    $checkInsert = agregarProducto();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Alta de un producto</h1>

<?php
        $css = 'danger';
        $mensaje = 'No se pudo agregar el producto';
        if( $checkInsert ) {
            $css = 'success';
            $mensaje = 'Producto agregada correctamente';
?>        
        <div class="alert bg-light text-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
        </div>
<?php
        }
?>

            
    </main>

<?php
    include 'layout/footer.php';
?>
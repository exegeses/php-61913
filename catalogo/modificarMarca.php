<?php
    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $checkUpdate = modificarMarca();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de una marca</h1>
<?php
        $css = 'danger';
        $mensaje = 'No se pudo modificar la marca';
        if( $checkUpdate ) {
            $css = 'success';
            $mensaje = 'Marca modificada correctamente';
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
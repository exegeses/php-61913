<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Contenido de la sección</h1>

        <div class="alert bg-light text-success p-4 col-8 mx-auto shadow">
            mensaje ok
        </div>

        <div class="alert bg-light text-danger p-4 col-8 mx-auto shadow">
            mensaje error
        </div>

    </main>

<?php
    include 'layout/footer.php';
?>
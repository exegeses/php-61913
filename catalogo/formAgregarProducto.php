<?php

	include 'layout/header.php';
	include 'layout/nav.php';
?>

    <main class="container">

        <h1>Alta de un nuevo producto</h1>

        <div class="alert bg-light p-4 col-8 mx-auto border shadow-sm">
            <form action="agregarProducto.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="prdNombre">Nombre del Producto</label>
                    <input type="text" name="prdNombre" class="form-control" id="prdNombre" required>
                </div>

                <label for="prdPrecio">Precio del Producto</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="prdPrecio" class="form-control" id="prdPrecio" min="0" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="idMarca">Marca</label>
                    <select class="form-control" name="idMarca" id="idMarca" required>
                        <option value="">Seleccione una marca</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="idCategoria">Categoría</label>
                    <select class="form-control" name="idCategoria" id="idCategoria" required>
                        <option value="">Seleccione una categoría</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prdPresentacion">Presentación del Producto</label>
                    <textarea name="prdPresentacion" class="form-control" id="prdPresentacion" required></textarea>
                </div>

                <div class="form-group">
                    <label for="prdStock">Stock del Producto</label>
                    <input type="number" name="prdStock" class="form-control" id="prdStock" min="0" required>
                </div>

                <div class="custom-file mt-1 mb-4">
                    <input type="file" name="prdImagen"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco">Seleccionar Archivo: </label>
                </div>

                <button class="btn btn-dark mr-3 px-4">Agregar producto</button>
                <a href="adminProductos.php" class="btn btn-outline-secondary">
                    Volver a panel de productos
                </a>

            </form>
        </div>
    </main>

<?php  include 'layout/footer.php';  ?>
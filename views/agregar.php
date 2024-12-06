<?php
// /views/agregar.php
?>
<?php include_once 'header.php'; ?>
<!-- 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
</head>
<body>
    <h1>Agregar Nuevo Libro</h1>
    <form method="POST" action="index.php?action=agregar">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" required><br>

        <label for="anio_publicacion">Año de Publicación:</label>
        <input type="number" name="anio_publicacion" required><br>

        <label for="genero">Género:</label>
        <input type="text" name="genero" required><br>

        <input type="submit" value="Agregar Libro">
    </form>
</body>
</html>
-->
<form action="index.php?action=agregar" method="POST">
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" required>
    </div>
    <div class="mb-3">
        <label for="anio_publicacion" class="form-label">Año de Publicación</label>
        <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" required>
    </div>
    <div class="mb-3">
        <label for="genero" class="form-label">Género</label>
        <input type="text" class="form-control" id="genero" name="genero" required>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-control" id="estado" name="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Libro</button>
</form>
<?php include_once 'footer.php'; ?>
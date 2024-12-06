<!-- editar.php -->
<?php include_once 'header.php'; ?>

<h1>Editar Libro</h1>

<?php
// Verificar si los datos del libro están disponibles
//if (isset($libro)) :
?>

<form action="index.php?action=editar&id=<?= $libro['id'] ?>" method="POST">
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($libro['titulo']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" class="form-control" id="autor" name="autor" value="<?= htmlspecialchars($libro['autor']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="anio_publicacion" class="form-label">Año de Publicación</label>
        <input type="number" class="form-control" id="anio_publicacion" name="anio_publicacion" value="<?= htmlspecialchars($libro['anio_publicacion']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="genero" class="form-label">Género</label>
        <input type="text" class="form-control" id="genero" name="genero" value="<?= htmlspecialchars($libro['genero']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-control" id="estado" name="estado" required>
            <option value="activo" <?= $libro['estado'] == 'activo' ? 'selected' : '' ?>>Activo</option>
            <option value="inactivo" <?= $libro['estado'] == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar Libro</button>
</form>

<?php 
//else: 
//    echo "<p>No se ha encontrado el libro.</p>";
//endif; 
?>

<?php include_once 'footer.php'; ?>

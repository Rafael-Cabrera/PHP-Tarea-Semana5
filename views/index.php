<?php
// /views/index.php
?>
<?php include_once 'header.php'; ?>
<!-- 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Libros</title>
</head>
<body>
-->
    <h1>Listado de Libros</h1>
    <a href="index.php?action=agregar">Agregar Nuevo Libro</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Año de Publicación</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= $libro['titulo'] ?></td>
                    <td><?= $libro['autor'] ?></td>
                    <td><?= $libro['anio_publicacion'] ?></td>
                    <td><?= $libro['genero'] ?></td>
                    <td>
                    <a href="index.php?action=editar&id=<?= $libro['id'] ?>" class="btn btn-success mb-3">Editar</a>
                        <!-- <a href="index.php?action=eliminar&id=<?= $libro['id'] ?>">Eliminar</a> -->
                        <!-- <a href="index.php?action=cambiar_estado&id=<?= $libro['id'] ?>">Eliminar</a> -->
                    </td>

                    <td>
                        <?php if (isset($libro['estado'])): ?>
                            <span class="badge <?= $libro['estado'] == 'activo' ? 'bg-success' : 'bg-danger' ?>">
                                <?= ucfirst($libro['estado']) ?>
                            </span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Estado no disponible</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($libro['estado'] == 'activo'): ?>
                            <a href="index.php?action=cambiar_estado&id=<?= $libro['id'] ?>&estado=inactivo" class="btn btn-warning btn-sm">Marcar Inactivo</a>
                        <?php else: ?>
                            <a href="index.php?action=cambiar_estado&id=<?= $libro['id'] ?>&estado=activo" class="btn btn-success btn-sm">Marcar Activo</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<!-- 
</body>
</html>
-->
<?php include_once 'footer.php'; ?>
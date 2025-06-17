<?php
require __DIR__ . '/config.php';
require __DIR__ . '/Database.php';

$db       = new Database();
$usuarios = $db->fetchAll('SELECT * FROM usuarios');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Usuarios</h1>
            <a href="create_user.php" class="btn btn-success">
                + Nuevo usuario
            </a>
        </div>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($usuarios) > 0): ?>
                    <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td><?= htmlspecialchars($u['id'], ENT_QUOTES) ?></td>
                            <td><?= htmlspecialchars($u['nombre'], ENT_QUOTES) ?></td>
                            <td><?= htmlspecialchars($u['email'], ENT_QUOTES) ?></td>
                            <td><?= htmlspecialchars($u['created_at'], ENT_QUOTES) ?></td>
                            <td>
                                <a href="edit_user.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                                <button
                                    class="btn btn-sm btn-danger"
                                    onclick="if(confirm('¿Eliminar al usuario <?= addslashes(htmlspecialchars($u['nombre'], ENT_QUOTES)) ?>?')) { window.location='delete_user.php?id=<?= $u['id'] ?>'; }">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
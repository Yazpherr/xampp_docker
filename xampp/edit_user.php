<?php

declare(strict_types=1);

require __DIR__ . '/config.php';
require __DIR__ . '/Database.php';

$db = new Database();

// 1. Procesar el formulario al llegar por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = $_POST['id']     ?? '';
    $nombre = trim($_POST['nombre'] ?? '');
    $email  = trim($_POST['email']  ?? '');

    if (!ctype_digit($id) || $nombre === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.php');
        exit;
    }

    $db->execute(
        'UPDATE usuarios SET nombre = :nombre, email = :email WHERE id = :id',
        [
            ':nombre' => $nombre,
            ':email'  => $email,
            ':id'     => (int) $id,
        ]
    );

    header('Location: index.php');
    exit;
}

// 2. Si es GET, mostrar el formulario con datos actuales
$id = $_GET['id'] ?? '';
if (!ctype_digit($id)) {
    header('Location: index.php');
    exit;
}

$results = $db->fetchAll(
    'SELECT * FROM usuarios WHERE id = :id',
    [':id' => (int) $id]
);

if (count($results) === 0) {
    header('Location: index.php');
    exit;
}

$user = $results[0];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Editar Usuario #<?= htmlspecialchars((string)$user['id'], ENT_QUOTES) ?></h1>
        <form method="post" action="edit_user.php">
            <input type="hidden" name="id" value="<?= (int)$user['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input
                    type="text"
                    name="nombre"
                    class="form-control"
                    value="<?= htmlspecialchars($user['nombre'], ENT_QUOTES) ?>"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="<?= htmlspecialchars($user['email'], ENT_QUOTES) ?>"
                    required>
            </div>
            <button type="submit" class="btn btn-success">Guardar cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
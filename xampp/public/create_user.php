<?php

declare(strict_types=1);

require __DIR__ . '/../config.php';
require __DIR__ . '/../Database.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email  = trim($_POST['email']  ?? '');

    if ($nombre === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: create_user.php');
        exit;
    }

    $db->execute(
        'INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)',
        [
            ':nombre' => $nombre,
            ':email'  => $email,
        ]
    );

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Crear nuevo usuario</h1>
        <form method="post" action="../create_user.php">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input
                    type="text"
                    name="nombre"
                    class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="users.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
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
    <h1>Usuarios</h1>
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Creado</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($usuarios) > 0): ?>
          <?php foreach ($usuarios as $u): ?>
            <tr>
              <td><?= htmlspecialchars($u['id'],   ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($u['nombre'],   ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($u['email'],  ENT_QUOTES) ?></td>
              <td><?= htmlspecialchars($u['created_at'], ENT_QUOTES) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center">No hay usuarios registrados.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

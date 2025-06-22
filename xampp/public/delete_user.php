<?php
// delete_user.php — elimina un usuario y redirige de vuelta
require __DIR__ . '/../config.php';
require __DIR__ . '/../Database.php';

// ① Validar que llegue un ID por GET y sea numérico
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: users.php');
    exit;
}

$id = (int) $_GET['id'];

// ② Instanciar DB y ejecutar DELETE con prepared statement
$db = new Database();
$deleted = $db->execute(
    'DELETE FROM usuarios WHERE id = :id',
    [':id' => $id]
);

// ③ (Opcional) puedes pasar un mensaje por sesión o query string
// header('Location: index.php?deleted=' . ($deleted ? '1' : '0'));

header('Location: users.php');
exit;

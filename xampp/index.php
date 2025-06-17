<?php
ob_start();

require __DIR__ . '/config.php';
require __DIR__ . '/Database.php';

$db       = new Database();
$usuarios = $db->fetchAll('SELECT * FROM usuarios');

header('Content-Type: application/json; charset=utf-8');
echo json_encode($usuarios);

ob_end_flush();

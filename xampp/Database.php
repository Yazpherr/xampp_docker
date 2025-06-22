<?php
// src/Database.php

declare(strict_types=1);

class Database
{
    private \PDO $pdo;

    public function __construct()
    {
        // DSN: Data Source Name
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
            DB_HOST,
            DB_PORT,
            DB_NAME
        );

        try {
            $this->pdo = new \PDO($dsn, DB_USER, DB_PASS, [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, // Excepciones en errores
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,       // Arrays asociativos
                \PDO::ATTR_EMULATE_PREPARES   => false,                   // Usar prepares nativos
            ]);
        } catch (\PDOException $e) {
            // Manejo de error: detener la aplicación con mensaje claro
            die('Error de conexión a la base de datos: ' . $e->getMessage());
        }
    }

    /**
     * Ejecuta una consulta SELECT y devuelve todos los registros.
     *
     * @param string $sql
     * @param array  $params
     * @return array
     */
    public function fetchAll(string $sql, array $params = []): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Ejecuta una consulta INSERT/UPDATE/DELETE.
     *
     * @param string $sql
     * @param array  $params
     * @return int   Número de filas afectadas
     */
    public function execute(string $sql, array $params = []): int
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}

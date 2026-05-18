<?php

class Database
{

    private static ?Database $instance = null;
    private PDO $pdo;

    private function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            //Creamos la conexion con la base de datos.
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            /*error_log("Error de conexion a la base de datos(PDO): " . $e->getMessage());
            die("Error crítico de conexión a la Base de Datoss. Revisa tus credenciales.");*/
            die("ERROR REAL DE PDO: " . $e->getMessage());
        }
    }

    public static function getConnection(): PDO
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}

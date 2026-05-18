<?php

class SalaModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * 
     * OBTENER TODAS LAS SALAS DISPONIBLES EN EL SISTEMA
     * 
     */
    public function obtenerTodas()
    {
        $sql = 'SELECT * FROM salas ORDER BY nombre ASC';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        //Devolver todas las filas xonsultadas como un array de objetos
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPorId(string $id)
    {
        // 1. Preparamos la consulta SQL con un marcador de posición (:id)
        $sql = "SELECT * FROM salas WHERE id_sala = :id LIMIT 1";

        $stmt = $this->db->prepare($sql);

        // 2. Ejecutamos la consulta vinculando el ID de forma segura
        $stmt->execute([
            ':id' => $id
        ]);

        // 3. Obtenemos el resultado
        return $stmt->fetch();
    }
}

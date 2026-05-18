<?php

class ReservaModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Metodo que comprueba si la sala esta ya ocupada en un rango de fechas y horas especificas
     */
    public function comprobarDisponibilidad(int $sala_id, string $fecha, string $hora_inicio, string $hora_fin): bool
    {
        /**
         * 
         * Consulta que busca si hay una sala que este ocupada en una fecha y hora especifica, 
         * Y devuelve su ID
         * 
         */
        $sql = "SELECT 	id_reserva FROM reservas WHERE id_sala = :sala_id 
                AND fecha_reserva = :fecha 
                AND estado = 'activa' 
                AND (hora_inicio < :hora_fin AND hora_fin > :hora_inicio)";
        $stmt = $this->db->prepare($sql);


        /**
         * 
         * Se le pasan los parametros de la consulta para que tomen los valores que recibiremos en el metodo
         * 
         */
        $stmt->execute([
            ':sala_id' => $sala_id,
            ':fecha' => $fecha,
            ':hora_inicio' => $hora_inicio,
            ':hora_fin' => $hora_fin
        ]);

        //devuelve la cantidad de filas encontradas que cumplan con la con la condicion
        //Si es mayor a 0 Significa que la sala esta ocupada (Devuelve TRUE).
        //Si es 0, la sala esta Libre (devuelve false).

        return $stmt->rowCount() > 0;
    }

    /**
     * 
     * Metodo que guarda la reserva
     * 
     */
    public function crearReserva(int $usuario_id, int $sala_id, string $fecha, string $hora_inicio, string $hora_fin): bool
    {
        $sql = "INSERT INTO reservas (id_usuario, id_sala, fecha_reserva, hora_inicio, hora_fin) 
                VALUES (:usuario_id, :sala_id, :fecha, :hora_inicio, :hora_fin)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':sala_id' => $sala_id,
            ':fecha' => $fecha,
            ':hora_inicio' => $hora_inicio,
            ':hora_fin' => $hora_fin
        ]);
    }

    /**
     * 
     * Metodo que obtiene los datos por usuario
     * 
     */
    public function obtenerPorUsuario(int $usuario_id) : array{
        // Todo debe coincidir letra por letra con tu base de datos
        $sql = "SELECT r.*, s.nombre AS nombre_sala 
                FROM reservas r
                INNER JOIN salas s ON r.id_sala = s.id_sala
                WHERE r.id_usuario = :usuario_id
                ORDER BY r.fecha_reserva DESC, r.hora_inicio DESC";
                
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute([
            ':usuario_id' => $usuario_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function cancelarReserva(int $id_reserva, int $id_usuario) : bool {
        // Hacemos un UPDATE en lugar de un DELETE para mantener el historial
        $sql = "UPDATE reservas 
                SET estado = 'cancelada' 
                WHERE id_reserva = :id_reserva AND id_usuario = :id_usuario";
                
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':id_reserva' => $id_reserva,
            ':id_usuario' => $id_usuario
        ]);
    }
}

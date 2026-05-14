<?php

class UsuarioModel {
    private PDO $db; 

    public function __construct() {
        $this->db = Database::getConnection();
    }

    /**
     * ------------------------------------------------------
     * BUSCAR USUARIO EN LA BASE DE DATOS UTILIZANDO CORREO
     * ------------------------------------------------------
     */
    public function buscarPorEmail(string $email){
        //Se prepara la consulta SQL para evitar ataques de inyeccion sql
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);

        //Vinculacion del parametro a la consulta preparada
        $stmt->execute(['email' => $email]);

        //Devolvemos el resultado final
        return $stmt->fetch();
    }

}
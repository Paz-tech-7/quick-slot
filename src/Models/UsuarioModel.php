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

    /**
     * ------------------------------------------- 
     * METODO PARA REGISTRARSE COMO NUEVO USUARIO
     * -------------------------------------------
     */
    public function crearUsuario(string $nombre, string $email, string $passwordHash) : bool {
        
        //1. Se prepara la consulta INSERT a traves de parametros procesados
        $sql = "INSERT INTO usuarios(nombre, email, password, rol) VALUES (:nombre, :email, :password, 'cliente')";
        $stmt = $this->db->prepare($sql);

        //2. Ejecucion rellenando los huecos
        // si tiene exito devuelve true, si falla devuelve false
        return $stmt->execute([
            'nombre'  => $nombre,
            'email'   => $email,
            'password' => $passwordHash
        ]);
    }

}
<?php

class Controller
{
    /**
     * Carga una vista y le pasa datos (opcional)
     * 
     * @param string $vista - Ruta de la vista (ej: 'client/home')
     * @param array $datos - Datos dinámicos para mostrar en la vista
     */
    public function view($vista, $datos = []) : void
    {
        // Extraemos las variables del array para poder usarlas en el HTML
        // Ejemplo: ['nombre' => 'Carlos'] se convierte en la variable $nombre
        if (!empty($datos)) {
            extract($datos);
        }

        $rutaVista = APP_ROOT . '/src/views/' . $vista . '.php';

        if (file_exists($rutaVista)) {
            require_once $rutaVista;
        } else {
            die("Error del Sistema: La vista '{$vista}' no existe en {$rutaVista}");
        }
    }

    /**
     * Carga y devuelve una instancia de un modelo de Base de Datos
     * 
     * @param string $modelo - Nombre del modelo (ej: 'UsuarioModel')
     */
    public function model($modelo) : Object
    {
        $rutaModelo = APP_ROOT . '/src/Models/' . $modelo . '.php';

        if (file_exists($rutaModelo)) {
            require_once $rutaModelo;
            return new $modelo; //Crear conexion con esa tabla y la devuelve
        } else {
            die("Error del Sistema: El modelo '{$modelo}' no existe");
        }
    }
}

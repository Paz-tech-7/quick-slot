<?php

require_once '../src/Models/SalaModel.php';

class ClienteController extends Controller
{

    public function panel() : void
    {
        if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'cliente') {
            header('Location: ' . BASE_URL . 'Auth/login');
            exit();
        }

        //Instancia de modelo de Salas
        $salaModel = new SalaModel();

        //Le pedimos al modelo que traiga todas las salas de la base de datos
        $listaSalas = $salaModel->obtenerTodas();

        $datosParaLaVista = [
            'nombre' => $_SESSION['nombre'] ?? 'Usuario',
            'salas' => $listaSalas
        ];


        $this->view('layout/header', ['css' => ['panel']]);
        $this->view('client/cliente_panel', $datosParaLaVista);
        $this->view('layout/footer');
    }
    public function misReservas() {
        // 1. Barrera de seguridad (siempre obligatoria)
        if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'cliente') {
            header('Location: ' . BASE_URL . 'Auth/login');
            exit();
        }

        // 2. Necesitamos el modelo de reservas para extraer el historial
        // Asegúrate de tener require_once '../src/Models/ReservaModel.php'; arriba del archivo
        $reservaModel = new ReservaModel();
        
        // 3. Ejecutamos nuestra consulta con INNER JOIN pasándole el ID del cliente
        $historial = $reservaModel->obtenerPorUsuario($_SESSION['id_usuario']);

        // 4. Empaquetamos los datos
        $data = [
            'reservas' => $historial
        ];

        // 5. Renderizamos la nueva vista
        $this->view('layout/header', ['css' => ['panel']]); 
        $this->view('client/mis_reservas', $data); // Esta es la vista que crearemos ahora
        $this->view('layout/footer');
    }
}

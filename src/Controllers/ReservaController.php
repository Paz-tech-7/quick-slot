<?php

require_once '../src/Models/ReservaModel.php';
require_once '../src/Models/SalaModel.php';

class ReservaController extends Controller
{

    private object $reservaModel;
    private object $salaModel;

    public function __construct()
    {
        $this->reservaModel = new ReservaModel();
        $this->salaModel = new SalaModel();
    }

    public function solicitar(string $sala_id)
    {
        if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'cliente') {
            header('Location: ' . BASE_URL . 'Auth/login');
            exit();
        }

        $salaExiste = $this->salaModel->buscarPorId($sala_id);

        if (!$salaExiste) {
            header('Location: ' . BASE_URL . 'Cliente/panel');
            exit();
        }

        $data = [
            'sala' => $salaExiste,
            'sala_id' => $sala_id
        ];

        $this->view('layout/header', ['css' => ['auth']]);
        $this->view('client/formulario_reservar', $data);
        $this->view('layout/footer');
    }

    public function procesar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'Cliente/panel');
            exit();
        }

        $usuario_id = $_SESSION['id_usuario'];
        $sala_id = intval($_POST['sala_id']);
        $fecha = trim(strip_tags($_POST['fecha']));
        $hora_inicio = trim(strip_tags($_POST['hora_inicio']));
        $hora_fin = trim(strip_tags($_POST['hora_fin']));

        if ($hora_inicio >= $hora_fin) {
            $data = ['id_sala' => $sala_id, 'error' => 'La hora de inicio debe ser anterior a la hora de finalización.'];
            $this->view('layout/header', ['css' => ['auth']]);
            $this->view('client/formulario_reserva', $data);
            $this->view('layout/footer');
            return;
        }

        $estaOcupada = $this->reservaModel->comprobarDisponibilidad($sala_id, $fecha, $hora_inicio, $hora_fin);

        if ($estaOcupada) {
            $data = ['id_sala' => $sala_id, 'error' => 'Lo sentimos, esa sala ya está reservada en la franja horaria seleccionada.'];
            $this->view('layout/header', ['css' => ['auth']]);
            $this->view('client/formulario_reserva', $data);
            $this->view('layout/footer');
            return;
        }

        $guardadoCorrecto = $this->reservaModel->crearReserva($usuario_id, $sala_id, $fecha, $hora_inicio, $hora_fin);

        if ($guardadoCorrecto) {
            header('Location: ' . BASE_URL . 'Cliente/panel?reserva=success');
            exit();
        } else {
            die("Error crítico del sistema: No se pudo procesar la reserva en la base de datos.");
        }
    }

    /**
     * Procesa la solicitud de cancelación desde el panel del cliente
     */
    public function cancelar(int $id_reserva) {
        // Barrera de seguridad
        if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'cliente') {
            header('Location: ' . BASE_URL . 'Auth/login');
            exit();
        }

        // Ejecutamos la orden en el modelo pasando el ID de la reserva de la URL 
        // y el ID del usuario que está en la sesión
        $this->reservaModel->cancelarReserva($id_reserva, $_SESSION['id_usuario']);

        // Devolvemos al usuario a su pantalla de historial
        header('Location: ' . BASE_URL . 'Cliente/misReservas');
        exit();
    }
}

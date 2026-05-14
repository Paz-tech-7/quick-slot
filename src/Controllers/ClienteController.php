<?php 

class ClienteController extends Controller {
    
    public function panel() {
        if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'cliente') {
            header('Location: ' . BASE_URL . 'Auth/login');
            exit();
        }
        $this->view('layout/header');
        $this->view('client/cliente_panel');
        $this->view('layout/footer');
    }
}
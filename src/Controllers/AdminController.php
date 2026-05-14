<?php 

class AdminController extends Controller {
    public function dashboard() {

        // Verificacion de si la sesion no existe o si el rol no es de administrador
        if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'admin'){
            header('Location: ' . BASE_URL . 'Auth/login');
            exit();
        }

        // Si la verificacion es exitosa rediriguimos al panel de administracion
        $this->view('admin/dashboard');
    }
}
<?php 

class AuthController extends Controller {
    
    //Metodo para mostrar vista del formulario HTML para el login
    public function login() {
        $this->view('layout/header');
        $this->view('auth/login');
        $this->view('layout/footer');
    }

    //Metodo para procesar los datos cuando el usuario hace click en "Entrar"
    public function procesarLogin() {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Limpiamos los datos de entrada
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            // Instancia del modelo y buscamos usuario
            $usuarioModel = $this->model('UsuarioModel');
            $usuarioDB = $usuarioModel->buscarPorEmail($email);

            // Verificacion de datos
            if ($usuarioDB && password_verify($password, $usuarioDB->password)) {

                //Inicio de sesion exitoso
                $_SESSION['id_usuario'] = $usuarioDB->id_usuario;
                $_SESSION['nombre'] = $usuarioDB->nombre;
                $_SESSION['rol'] = $usuarioDB->rol;

                //Redireccion sgun el usuario
                if($usuarioDB->rol == 'admin'){
                    header('Location: ' . BASE_URL . 'Admin/dashboard');
                } else {
                    header('Location: ' . BASE_URL . 'Cliente/panel');
                }
                exit();

            } else {
                // Inicio de sesión fallido: Recargamos la vista enviando un mensaje de error
                $this->view('auth/login', ['error' => 'El correo o la contraseña son incorrectos']);
            }

        } else {
            // Si alguien intenta entrar a la url sin enviar el formulario se le redirige a la pagina del login
            header('Location: ' . BASE_URL . 'auth/login');
            exit();
        }
    }
}
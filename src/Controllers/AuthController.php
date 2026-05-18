<?php

class AuthController extends Controller
{

    //Metodo para mostrar vista del formulario HTML para el login
    public function login() : void
    {
        $this->view('layout/header', ['css' => ['auth']]);
        $this->view('auth/login');
    }

    //Metodo para procesar los datos cuando el usuario hace click en "Entrar"
    public function procesarLogin() : void
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
                if ($usuarioDB->rol == 'admin') {
                    header('Location: ' . BASE_URL . 'Admin/dashboard');
                } else {
                    header('Location: ' . BASE_URL . 'Cliente/panel');
                }
                exit();
            } else {
                // Inicio de sesión fallido: Recargamos la vista enviando un mensaje de error
                $this->view('layout/header', ['css' => ['auth']]);
                $this->view('auth/login', ['error' => 'El correo o la contraseña son incorrectos']);
            }
        } else {
            // Si alguien intenta entrar a la url sin enviar el formulario se le redirige a la pagina del login
            header('Location: ' . BASE_URL . 'auth/login');
            exit();
        }
    }

    public function registro() : void
    {
        $this->view('layout/header', ['css' => ['auth']]);
        $this->view('auth/registro');
    }

    public function procesarRegistro() :void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //1. REcibir y limpiar datos de formulario
            $nombre = trim(strip_tags($_POST['nombre']));
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $password = $_POST['password'];

            $usuarioModel = $this->model('UsuarioModel');

            // 2. Comprobar si el correo ya existe
            // Se usa la funcion que ya se tenia para comprobar si alguien ya usa el email
            if ($usuarioModel->buscarPorEmail($email)) {
                // Si existe detenemos todo y recargamos la vista con un mensaje de error
                $this->view('layout/header');
                $this->view('auth/registro', ['error' => 'Este correo ya está registrado en el sistema.']);
                return;
            }

            // 3 Encriptacion de contraseña
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // 4. Guardamos en la base de datos
            if ($usuarioModel->crearUsuario($nombre, $email, $passwordHash)) {
                //Exitoso redirigir al login para que entre con su nueva cuenta
                header('Location: ' . BASE_URL . 'Auth/login');
                exit();
            } else {
                //Si falla la base de datos por algun motivo tecnico
                $this->view('layout/header');
                $this->view('auth/registro', ['error' => 'Hubo un error al crear la cuenta de usuario, vuelve a intentarlo mas tarde']);
            }
        } else {
            //Si intentan entrar por url directa sin enviar el formulario
            header('Location: ' . BASE_URL . 'Auth/registro');
            exit();
        }
    }

    /**
     * -------------------------
     *  CERRAR SESION DE USUARIO
     * -------------------------
     */
    public function logout(): void
    {
        // Iniciamos la sesion por si no estaba activa (Necesario para poder borrarla)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vaciamos todas las variables de sesion guardadas en memoria
        $_SESSION = array();

        // Destruccion de la cookie de sesion en el navegador del usuario
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        // Destruimos la sesion en el servidor
        session_destroy();

        // Redirigimos al usuario al login con un mensaje de exito o limpio
        header('Location: ' . BASE_URL . 'Auth/login');
        exit();
    }
}

<?php 

class HomeController extends Controller{

    //Metodo index() de accion por defecto
    public function index() : void {
        $this->view('layout/header', ['css' => ['home']]);
        $this->view('client/home');
        $this->view('layout/footer');
    }
}
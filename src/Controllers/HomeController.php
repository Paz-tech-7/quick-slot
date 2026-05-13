<?php 

class HomeController extends Controller{

    //Metodo index() de accion por defecto
    public function index() {
        $this->view('client/home');
    }
}
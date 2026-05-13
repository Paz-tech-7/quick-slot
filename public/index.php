<?php

/**
 * ------------------------------------
 *  INICIACION DE CONFIGURACION GLOBAL
 * ------------------------------------
 */
require_once '../config/config.php';


/**
 * --------------------------
 *  AUTOCARGADOR DE CLASES
 * --------------------------
 */

spl_autoload_register(function ($nombreClase) {
    //Array de carpetas donde php debe buscar las clases
    $directorios = [
        APP_ROOT . '/src/Controllers/',
        APP_ROOT . '/src/Models/',
        APP_ROOT . '/config/'
    ];

    foreach ($directorios as $directorio) {
        $archivo = $directorio . $nombreClase . '.php';
        if (file_exists($archivo)) {
            require_once $archivo;
            return; //Si encuentra una coincidencia, la carga y termina la busqueda
        }
    }
});

/** 
 * ----------------------------
 * CONFIGURACION DEL ENRUTADOR
 * ----------------------------
*/

//Captura lo que el usuario busca en la url Y si no pide nada por defecto carga la home

$url = isset($_GET['url']) ? $_GET['url'] : 'Home/index';

//Divicion de ur por la barra "/" (Ejemplo: url=Reserva/crear -> Controlador: Reserva, Metodo: crear)

$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL); //Limpieza de url de caracteres extraños
$urlParams = explode('/', $url);

// Asignacion del controlador y del metodo
$controladorNombre = isset($urlParams[0]) ? ucwords($urlParams[0]) . 'Controller' : 'HomeController';
$metodoNombre = isset($urlParams[1]) ? $urlParams[1] : 'index';

/**
 * -------------
 *  EJECUCION
 * -------------
 */
$archivoControlador = APP_ROOT . '/src/Controllers/' . $controladorNombre . '.php';

if (file_exists($archivoControlador)) {
    //Si el archivo existe, se instancia la clase con el nombre del controlador
    $controlador = new $controladorNombre();

    //Verificacion si el metodo existe dentro de la clase.
    if (method_exists($controlador, $metodoNombre)){
        $controlador -> {$metodoNombre}();
    } else {
        die("Error 404: El metodo {$metodoNombre} no existe en {$controladorNombre}.");
    }
}else{
    die("Error 404: El controlador {$controladorNombre} no fue encontrado.");
}
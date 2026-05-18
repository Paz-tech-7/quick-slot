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
    // Instanciamos la clase con el nombre del controlador
    $controlador = new $controladorNombre();

    // Verificamos si el metodo existe dentro de la clase
    if (method_exists($controlador, $metodoNombre)){

        // Extraemos los parámetros de la URL
        // array_slice corta el array desde la posición 2 en adelante.
        // Ejemplo: Si la URL es Reserva/solicitar/1, ignoramos [0] y [1], y guardamos ['1'].
        $parametros = array_slice($urlParams, 2);
        
        // Ejecutamos el método inyectando los parámetros
        // Si el array de $parametros está vacío, no pasa nada. Si tiene datos, los inyecta.
        call_user_func_array([$controlador, $metodoNombre], $parametros);

    } else {
        die("Error 404: El metodo {$metodoNombre} no existe en {$controladorNombre}.");
    }
} else {
    die("Error 404: El controlador {$controladorNombre} no fue encontrado.");
}
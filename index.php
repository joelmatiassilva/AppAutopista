<?php

include('objetos/Autopista.php');


function procesarErroresEnAutopistas() {
    $autopista = new Autopista();
    
    $autopistas=$autopista->obtenerAutopistas();
    
    
    var_dump($autopistas);
    foreach ($autopistas as $autopista) {
        
        echo $autopista."<br>";

//        if ($autopista->tieneError()) {
//            avisarQueTieneErrores();
//        }
    }
}

/*
Funcion que muestra a los usuarios que la autopista seleccionada tiene errores en dos casos:
    a) Ya sea que el usuario haya elegido una hora en concreto para ser notificado
    b) Que el user haya elegido ser notificado en cualquier horario
*/

procesarErroresEnAutopistas();



?>
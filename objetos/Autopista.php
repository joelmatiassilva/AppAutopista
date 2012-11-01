<?php

include_once 'Constantes.php';
/**
 * Autopista:
 * 
 *
 * @author AleK
 */
class Autopista {

    function __construct() {
        
    }

    public function obtenerAutopistas() {
        try {
            $bd = new mysqli(db_host, db_user, db_password, 'appdata');
            if ($bd->connect_errno) {
                echo "Failed to connect to MySQL: (" . $bd->connect_errno . ") " . $bd->connect_error;
            }

            $resultado = $bd->query("SELECT * FROM autopista");

            $autopistas=array();
            $resultado->data_seek(0);
            while ($row = $resultado->fetch_assoc()) {
                $autopistas[$row['id_autopista']] = $row['nombre_autopista'];
            }
            
            return $autopistas;
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function tieneError() {
        
    }

    public function avisarQueTieneErrores() {
        
    }

}

?>

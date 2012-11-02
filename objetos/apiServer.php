<?php

include_once 'Constantes.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apiServer
 *
 * @author AleK
 */
class apiServer {

    public function __construct() {
        
    }

    /**
     * Se loguea a una sesion de la api de El Server
     * @param <b>mail:</b> <b>password:</b>
     * @return array con dos campos, access_token y sso
     */
    public function login() {
        $curlInit = curl_init("http://api.elserver.com/sso/login/?sso=" . api_user . "&password=" . api_password);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        $resultadoApi = curl_exec($curlInit);
        curl_close($curlInit);
        $resultado = json_decode($resultadoApi, true);

        return $resultado;
    }

    /**
     * Da un access token para 
     * @return access_token (string)
     */
    public function getAccessToken() {
        $array = $this->login(api_user, api_password);
        return $array['access_token'];
    }

    /**
     * Devuelve las tareas cron realizadas
     * @return  array con las tareas cron
     */
    public function getTareasCron() {

        $curlInit = curl_init("http://api.elserver.com/cron/?access_token=" . $this->getAccessToken() . "&account=patagonianwineshop.com.ar&offset=&limit=&q=&exact=&sortorder=");
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        $resultadoApi = curl_exec($curlInit);
        curl_close($curlInit);
        $resultado = json_decode($resultadoApi, true);

        return $resultado;
    }

    /**
     * Elimina una tarea cron
     * @return  1(exito) o 0 (error)
     */
    public function eliminarTareaCron($access_token, $account, $cron_id) {
        
        $curlInit = curl_init("http://api.elserver.com/cron/?access_token=" . . "&account" . $account . "=&cron_id=" . $cron_id);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        $resultadoApi = curl_exec($curlInit);
        curl_close($curlInit);
        $resultado = json_decode($resultadoApi, true);
        
    }

    public function crearTareaCron() {
        $url ="http://api.elserver.com/cron/?"
        $url .="access_token=";
        $url .= "&account=&";
        $url .= "minute=&";
        $url .= "hour=&";
        $url .= "dayofmonth=&";
        $url .= "month=&";
        $url .= "dayofweek=&";
        $url .= "url=&";
        $url .= "email=&";
        $url .= "auth_user=&"
        $url .= "auth_password=";
        
  
        
        $curlInit = curl_init($url);
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        $resultadoApi = curl_exec($curlInit);
        curl_close($curlInit);
        $resultado = json_decode($resultadoApi, true);
    }

    public function modificarTareaCron() {
        $curlInit = curl_init("access_token=&account=&cron_id=&minute=&hour=&dayofmonth=&month=&dayofweek=&url=&email=&auth_user=&auth_password=&habilitado=");
        curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
        $resultadoApi = curl_exec($curlInit);
        curl_close($curlInit);
        $resultado = json_decode($resultadoApi, true);
    }
}

?>

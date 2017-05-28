<?php

require 'mensaje.php';
require 'BDMensajes.php';

class GestionaMensajes{


    function getMensajesGlobales(){
        
        $datosMensaje = new BDMensajes();
        $mensaje = $datosMensaje->getAllMensajesGlobales();
        $listaMensajes = null;
        if($mensaje){
            $listaMensajes = new ArrayObject();
            
            for($i = 0; $i < sizeof($mensaje); $i++){
                $listaMensajes->append(
                        new mensaje($mensaje[$i]['id'], $mensaje[$i]['emisor'],NULL,
                                    $mensaje[$i]['titulo'],$mensaje[$i]['cuerpo'],
                                    $mensaje[$i]['fecha']));
            }
        }
          return $listaMensajes;
    }
    
    function nuevoMensajeGlobal($emisor,$titulo,$cuerpo){
        $dbMensajes = new BDMensajes();
        $dbMensajes->anadirMensajeGlobal($emisor,$titulo, $cuerpo);
    }
    
}

?>
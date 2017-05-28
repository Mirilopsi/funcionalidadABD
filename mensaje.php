<?php

class Mensaje{

    private $id;
    private $emisor;
    private $titulo;
    private $cuerpo;
    private $fecha;

    function Mensaje($id, $emisor, $receptor,$titulo, $cuerpo, $fecha){
        $this->id = $id;
        $this->emisor = $emisor;
        $this->receptor = $receptor;
        $this->titulo = $titulo;
        $this->cuerpo = $cuerpo;
        $this->fecha = $fecha;
    }

    public function getMensajeId(){
        return $this->id;
    }
    public function getEmisor(){
        return $this->emisor;
    }
    public function getTitulo(){
        return $this->titulo;
    } 
    public function getCuerpo(){
        return $this->cuerpo;
    }
    public function getFecha(){
        return $this->fecha;
    }

}

?>
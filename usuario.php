<?php

class Usuario{
    private $nombre;
    private $email;
    private $clave;
    private $foto;

    function Usuario($nombre, $email, $clave, $foto){
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
        $this->foto = $foto;
    }

    function getNombre(){
        return $this->nombre;
    }
    function getEmail(){
        return $this->email;
    }
    function getClave(){
        return $this->clave;
    }
    function getFoto(){
        return $this->foto;
    }
}

?>
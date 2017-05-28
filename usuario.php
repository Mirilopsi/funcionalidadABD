<?php

class Usuario{
    private $id;
    private $nombre;
    private $email;
    private $clave;
    private $foto;

    function Usuario($id, $nombre, $email, $clave, $foto){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
        $this->foto = $foto;
    }

    function getId(){
        return $this->id;
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
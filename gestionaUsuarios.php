<?php

require 'BDUsuarios.php';
require_once 'Usuario.php';

class GestionaUsuarios{
    /**
    * Función que encripta un string, en este caso la contraseña de acceso de un usuario
    * @param clave: contraseña de acceso del usuario.
    * @return clave encriptada mediante MD5
    **/
    function encriptarClave($clave, $nombreUsuario){
        $claveEncriptar =  $nombreUsuario.'$1$';

        return crypt($clave, $claveEncriptar);
    }

    
    function getIdUsaurio($email){
        $dbUsers = new BDUsuarios();

        return  $dbUsers->getIdUsaurio($email);
    }


    function getUsuarioPorEmail($email){
        $dbUsers = new BDUsuarios();
        $usuario = null;

        if($datosUsuario = $dbUsers->getUsuarioPorEmail($email)){
            
            $usuario = new Usuario($datosUsuario['id'],$datosUsuario['nombre'],
                                    $datosUsuario['edad'],$datosUsuario['email'],
                                    $datosUsuario['clave'],$datosUsuario['foto'] );
       }

       return $usuario;
    }

    function calcularEdadUsuario($fecha){
        //vamos a calcular la edad del usuario
        $tiempo = time() - strtotime($fecha);
        //Dividimos la fecha introducida entre el numero de segundos que tiene un año
        return floor($tiempo / 31556926);
    }

    function insertarNuevoUsuario($nombre, $email, $fecha,$clave, $perfil){
        $dbUsers = new BDUsuarios();
        $dbUsers->insertarNuevoUsuario($nombre, $email, $fecha,$clave, $perfil);
    }

    function guardarImagenUsuario($imagen,$email){
        $ruta = "perfiles/";
        $imagenTmp = $imagen['tmp_name'];
        $ext = $imagen['type'];
        $nombreImagen = $ruta.$imagen['name'];

        if(is_uploaded_file($imagenTmp)){
            move_uploaded_file($imagenTmp,$nombreImagen);
        }else{
            echo 'error';
        }
       
        return $nombreImagen;
    }

    function registrarUsuario($nombre, $email, $fecha, $clave, $imagen){
        $existeUsuario = $this->getUsuarioPorEmail($email);
        $registrado = false;
        $perfil = null;

        if(!$existeUsuario){
            if($imagen){
                $perfil = $this->guardarImagenUsuario($imagen, $email);
            }

            $edad = $this->calcularEdadUsuario($fecha);
            $claveEncriptada = $this->encriptarClave($clave, $nombre);

            $this->insertarNuevoUsuario($nombre, $email, $edad,$claveEncriptada, $perfil);
            $registrado=true;
        }

        return $registrado;
    }

}

?>
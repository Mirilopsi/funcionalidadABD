<?php
require_once('connectBD.php');

class BDUsuarios{

    /**
    * Se encarga de obtener el id de un usuario mediante su email de la base de datos
    * @param $email: es el id de usuario que queremos obtener
    * @return $usuario: datos del usuario si se ha encontrado, null en caso contrario
    **/
    function getIdUsuario($email){
        $conn = conectarBD();
        $usuario = null;

        $sql = "SELECT id FROM usuarios WHERE email = '$email'";     
        $resultado = $conn->query($sql) or die ($conn->error);
        if ($resultado->num_rows > 0) {
            
            while($fila = $resultado->fetch_assoc()){
                $usuario = $fila;
            };

        }

        $conn->close();

        return $usuario;	
    }


    /**
    * Se encarga de obtener un usuario mediante su email de la base de datos
    * @param $email: es el id de usuario que queremos obtener
    * @return $usuario: datos del usuario si se ha encontrado, null en caso contrario
    **/
    function getUsuarioPorEmail($email){
        $conn = conectarBD();
        $usuario = null;

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";     
        $resultado = $conn->query($sql) or die ($conn->error);
        if ($resultado->num_rows > 0) {
            
            while($fila = $resultado->fetch_assoc()){
                $usuario = $fila;
            };

        }

        $conn->close();

        return $usuario;	
    }

    /**
    * Se encarga de añadir un usuario a la bd
    * @param $nombre: es el nombre de usuario que vamos a registrar
    * @param $email: es el email de usuario que vamos a registrar
    * @param $clave: clave del usuario que se va a registrar 
    */
    function insertarNuevoUsuario($nombre, $email, $edad,$clave, $foto){
        $conn = conectarBD();
        if($foto){
            $sql = "INSERT INTO usuarios (nombre, email,edad, clave,foto )
                VALUES ('$nombre','$email',$edad, '$clave', '$foto' ) ";  
        }else{
            $sql = "INSERT INTO usuarios (nombre, email,edad, clave)
                    VALUES ('$nombre','$email',$edad, '$clave' ) ";     
        }
        $result = $conn->query($sql) or die ($conn->error);
        $conn->close();
    }
    
}

?>
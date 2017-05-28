<?php
require('connectBD.php');

class BDMensajes{
    function getAllMensajesGlobales(){
        $conn = conectarBD();

        if(!$conn){
            echo 'Error al conectar con la base de datos.';
            return null;
        }

        $sql = "SELECT * FROM globales ";     
        $result = $conn->query($sql) or die ($conn->error);
        $lista[] = "";
        
        if ($result->num_rows > 0) {
            while($row[] = $result->fetch_assoc()){  $lista = $row; };

        }else{
            $lista= null;
        }

        $conn->close();

        return $lista;	
    }

    /**
    * Se encarga de añadir un usuario a la bd
    * @param $nombre: es el nombre de usuario que vamos a registrar
    * @param $email: es el email de usuario que vamos a registrar
    * @param $clave: clave del usuario que se va a registrar 
    */
     function anadirMensajeGlobal($emisor, $titulo, $cuerpo){
        $conn = conectarBD();

        //Ponemos a NULL los campos que se introducen automáticamente al insertar en la bd, como el id o la fecha
        $sql = "INSERT INTO globales (id, emisor, titulo, cuerpo, fecha)
                VALUES (NULL,'$emisor','$titulo','$cuerpo',NULL ) ";     
        $result = $conn->query($sql) or die ($conn->error);

        $conn->close();
     } 
}
?>
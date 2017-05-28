<?php

define('DB_SERVER', 'localhost');
define('DB_NAME', 'abd');
define('DB_USER', 'miriam');
define('DB_PASS', 'miriam');

function conectarBD(){
    $db = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if(!$db)

        echo 'Error al conectar con la base de datos.';

    return $db;
}
?>
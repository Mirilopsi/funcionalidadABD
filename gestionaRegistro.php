<?php
require_once ('gestionaUsuarios.php');

session_start();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$fecha = $_POST['edad'];
$clave = $_POST['clave'];

echo 'email: '.$email;
$usuarios = new GestionaUsuarios();

if($usuarios->registrarUsuario($nombre, $email, $fecha, $clave)){
    $_SESSION['autenticado'] = true;
}else{
    $_SESSION['autenticado'] = false;
}

echo 'registro válido. <br><a href="index.html">volver</a>';
?>
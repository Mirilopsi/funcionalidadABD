<?php
require_once ('gestionaUsuarios.php');

session_start();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$fecha = $_POST['edad'];
$clave = $_POST['clave'];
$imagen =null;

if($_FILES['perfil']['size'] > 0){
    $imagen =  $_FILES['perfil'];

$usuarios = new GestionaUsuarios();
$usuario = $usuarios->registrarUsuario($nombre, $email, $fecha, $clave, $imagen);
if($usuario){
    $_SESSION['autenticado'] = true;
    $_SESSION['fotoUsuario'] =$usuarios->getIdUsaurio($email);
    $_SESSION['fotoUsuario'] =$usuarioLogeado->getFoto();
    $_SESSION['nombreUsuario'] =$nombre;
}else{
    $_SESSION['autenticado'] = false;
}

echo 'registro válido. <br><a href="index.html">volver</a>';
// echo '<img src="perfiles/'.$_SESSION['logeado']->getFoto().'/>';
?>
<html>
<?php 
session_start();
// session_destroy();

   
    if(isset($_SESSION['autenticado']) && $_SESSION['autenticado']){
        echo '<p style="color:green">Bienvenido '.$_SESSION['nombreUsuario'].'!!</p>';
        echo '<img src="perfiles/'.$_SESSION['fotoUsuario'].'">';
    }else if(isset($_SESSION['autenticado'])){
        echo '<p style="color:red"> El usuario ya existe </p>';
    }

?>
<form method="post" action="gestionaRegistro.php" enctype="multipart/form-data">
    <input type="text" class="nombreUsuario" name="nombre" placeholder="nombre" required>
    <input type="email" name="email" placeholder="email" required pattern="[a-zA-Z0-9_\.\+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-\.]+">
    <input type="date" name="edad" placeholder="edad" required>
    <input type="password" name="clave" placeholder="clave" required>
    <input type="file" name="perfil" >
    <input type="submit" name="enviar">
</form>


</html>
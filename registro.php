<html>

<?php 
    if(isset($_SESSION['autenticado']) && !$_SESSION['autenticado']){
        echo '<p style="color:red"> El usuario ya existe </p>';
    } 
?>
<form method="post" action="gestionaRegistro.php">
    <input type="text" class="nombreUsuario" name="nombre" placeholder="nombre" required>
    <input type="email" name="email" placeholder="email" required pattern="[a-zA-Z0-9_\.\+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-\.]+">
    <input type="date" name="edad" placeholder="edad" required>
    <input type="password" name="clave" placeholder="clave" required>
    <input type="submit" name="enviar">
</form>


</html>
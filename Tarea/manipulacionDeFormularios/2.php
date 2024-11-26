<form action="" method="post">
    <h1>FORMULARIO DE REGISTRO</h1>
    <label for="nombre">Ingrese su Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br><br>
    <label for="email">Ingrese su Email:</label>
    <input type="email" name="email" id="email" required>
    <br><br>
    <label for="pass">Ingrese su Contraseña (no menor a 8 caracteres):</label>
    <input type="password" name="pass" id="pass" required>
    <br><br>
    <input type="submit" value="Enviar">
</form>

<?php
    if ($_POST) {
        //lo mismo que el anterior pero esta vez con un mensaje de confirmacion para el usuario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if (!empty($nombre) && !empty($email) && !empty($pass)) {
            echo "<p>Registro exitoso. Gracias, $nombre!</p>";
        } else {
            echo "<p>Por favor, complete todos los campos.</p>";
        }
    }
?>
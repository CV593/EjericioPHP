<form action="" method="post">
    <h1>FORMULARIO DE CONTACTO</h1>
    <label for="nombre">Ingrese su Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br><br>
    <label for="email">Ingrese su Email:</label>
    <input type="email" name="email" id="email" required>
    <br><br>
    <label for="mensaje">Ingrese su Mensaje:</label>
    <textarea name="mensaje" id="mensaje" required></textarea>
    <br><br>
    <input type="submit" value="Enviar">
</form>

<?php
//aca descubri que _post es mas seguro que _get ya que no se ve en la url
    if ($_POST) {
        echo "<h2>Información recibida</h2>";
        echo "Nombre: " . $_POST['nombre'] . "<br>";
        echo "Email: " . $_POST['email'] . "<br>";
        echo "Mensaje: " . $_POST['mensaje'] . "<br>";
    }
?>
<?php
    $saludo = "Hola Mundo";
    $nombre;
?>

<form method="post" action="">
    <label for="nombre">Ingrese su Nombre Completo:</label>
    <input type="text" id="nombre" name="nombre">
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = filter_input(INPUT_POST, 'nombre');
    echo $saludo . "<br>";
    echo "Bienvenido " . $nombre;
}
?>
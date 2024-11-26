<?php
    $num = 0;
?>

<form method="get">
    <label for="n">Ingrese el primer numero:</label>
    <input type="number" id="n" name="n">
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $num = filter_input(INPUT_GET, 'n', FILTER_VALIDATE_INT);
    if ($num % 2 == 0) {
        echo "El numero ingresado es par.";
    } else {
        echo "El numero ingresado es impar.";
    }
}
?>
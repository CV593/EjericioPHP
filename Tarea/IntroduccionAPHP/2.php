<?php
    $num1 = 0;
    $num2 = 0;
?>

<form method="get">
    <label for="num1">Ingrese el primer numero:</label>
    <input type="number" id="num1" name="num1">
    <label for="num2">Ingrese el segundo numero:</label>
    <input type="number" id="num2" name="num2">
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $num1 = filter_input(INPUT_GET, 'num1', FILTER_VALIDATE_INT);
    $num2 = filter_input(INPUT_GET, 'num2', FILTER_VALIDATE_INT);
    $sum = $num1 + $num2;
    $res = $num1 - $num2;
    $mul = $num1 * $num2;
    echo "Los numeros ingresados son: " . $num1 . " y " . $num2 . "<br>";
    echo "La suma de los numeros es: " . $sum . "<br>";
    echo "La resta de los numeros es: " . $res . "<br>";
    echo "La multiplicacion de los numeros es: " . $mul . "<br>";
    if ($num2 != 0) {
        $division = $num1 / $num2;
        echo "La division de los numeros es: " . $division . "<br>";
    } else {
        echo "No se puede dividir por cero.<br>";
    }
}
?>
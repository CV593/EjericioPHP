<?php
    $num1 = 0;
    $num2 = 0;
    function sum ($num1, $num2) {
        return $num1 + $num2;
    }
    function res ($num1, $num2) {
        return $num1 - $num2;
    }
    function mul ($num1, $num2) {
        return $num1 * $num2;
    }
    function div ($num1, $num2) {
        if ($num2 != 0) {
            return $num1 / $num2;
        } else {
            return "No se puede dividir por cero.";
        }
    }
?>
<h1>
    CALCULADORA BASICA
    <h2>LISTA DE OPCIONES</h2>
    <h3>
        1. Suma<br>
        2. Resta<br>
        3. Multiplicacion<br>
        4. Division<br>
    </h3>
</h1>

<br>
<form method="get">
    <label for="n1">Ingrese el primer numero:</label>
    <input type="number" id="n1" name="n1"><br>
    <label for="num2">Ingrese el segundo numero:</label>
    <input type="number" id="n2" name="n2"><br>
    <label for="op">Ingrese la operacion a realizar:</label>
    <input type="number" id="op" name="op"><br> 
    <input type="submit" value="Enviar">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $num1 = filter_input(INPUT_GET, 'n1', FILTER_VALIDATE_INT);
        $num2 = filter_input(INPUT_GET, 'n2', FILTER_VALIDATE_INT);
        $op = filter_input(INPUT_GET, 'op', FILTER_VALIDATE_INT);
        echo "<br>Los numeros ingresados son: " . $num1 . " y " . $num2 . "<br><br>";
        switch ($op) {
            case 1:
                echo "La suma de los numeros es: " . sum($num1, $num2) . "<br>";
                break;
            case 2:
                echo "La resta de los numeros es: " . res($num1, $num2) . "<br>";
                break;
            case 3:
                echo "La multiplicacion de los numeros es: " . mul($num1, $num2) . "<br>";
                break;
            case 4:
                echo "La division de los numeros es: " . div($num1, $num2) . "<br>";
                break;
            default:
                echo "Opcion no valida.<br>";
        }
    }
?>
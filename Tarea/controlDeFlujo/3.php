<?php
    $dia = 0;
?>
<h1>
    SELECCIONE UN DIA DE LA SEMANA
    <h2>INGRESE UNA OPCION DEL 1 AL 7</h2>
</h1>

<br>
<form method="get">
    <label for="n">Ingrese dia de la semana:</label>
    <input type="number" id="n" name="n"><br>
    <input type="submit" value="Enviar">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $dia = filter_input(INPUT_GET, 'n',);
        switch ($dia) {
            case 1:
                echo "Lunes" . "<br>";
                break;
            case 2:
                echo "Martes" . "<br>";
                break;
            case 3:
                echo "Miercoles" . "<br>";
                break;
            case 4:
                echo "Jueves" . "<br>";
                break;
            case 5:
                echo "Viernes" . "<br>";
                break;
            case 6:
                echo "Sabado" . "<br>";
                break;
            case 7:
                echo "Domingo" . "<br>";
                break;
            default:
                echo "Opcion no valida.<br>";
        }
    }
?>
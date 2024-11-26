<form action="" method="get">
    <h1>ORDENAMIENTO DE ARRAYS</h1>
    <label for="arr">Ingrese 5 numeros (separados por ",")</label>
    <input type="text" name="arr">
    <input type="submit" value="Enviar">
</form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $arr = explode(",", $_GET["arr"]);
        echo "<h2>Los numeros sin ordenar son:</h2>";
        foreach ($arr as $num) {
            echo $num . "<br>";
        }
        echo "<h2>Array Ordenado:</h2>";
        // aunque tambien podemos usar la funcion sort() de php pero aca miramos un ejemplo de bubble sort
        // pero si que paja ponerse a hacer bubble sort JAJAJA
        // ni idea si leen los comentarios xD
        foreach ($arr as $i => $num) {
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
            echo $arr[$i] . "<br>";
        }
    }
?>

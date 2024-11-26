<h1>FRECUENCIA DE ELEMENTOS</h1>
<?php
    $arr = "pizza, hamburguesa, pizza, pizza, pizza, hamburguesa ,pollo, sushi, pollo, pollo";
    echo "<h2>Lista de elementos:</h2>";
    $i = 1;
    foreach (explode(",", $arr) as $value) {
        //aca no salia bien hasta que aprendi a usar el trim() para quitar los espacios JAJAJA
        echo $i . "). " . trim($value) . "<br>"; 
        $i++;
    }
?>
<form action="" method="get">
    <label for="arr">Ingrese el producto a ver</label>
    <input type="text" name="arr">
    <input type="submit" value="Enviar">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $cont = 0;
        $c = trim(filter_input(INPUT_GET, 'arr')); 
        foreach (explode(",", $arr) as $value) {
            if ($c == trim($value)) { 
                $cont++;
            }
        }
        echo "El producto " . htmlspecialchars($c) . " se repite " . $cont . " veces";
    }
?>

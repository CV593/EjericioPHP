<form action="" method="get">
    <h1>UTILIZACIÓN DEL ARRAY UNIQUE</h1>
    <label for="arr">Ingrese los nombres (separados por ",")</label>
    <input type="text" name="arr">
    <input type="submit" value="Enviar">
</form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $arr = explode(",", filter_input(INPUT_GET, 'arr')); 
        //sin esto no servia JAJJAJA pero se aprendio buscando la documentacion de php xD
        $arr = array_map('trim', $arr); 
        echo "<h2>Los nombres ingresados son:</h2>";
        foreach ($arr as $num) {
            echo $num . "<br>"; 
        }
        $arr = array_unique($arr);
        echo "<h2>Array sin duplicados:</h2>";
        foreach ($arr as $num) {
            echo $num . "<br>";
        }
    }
?>

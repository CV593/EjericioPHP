<?php
    function mayus($cadena){
        return strtoupper($cadena);
    }
    $c = "";
?>

<form action="" method="get">
    <h1>CONVERTIDOR A MAYUSCULAS</h1><br>
    <label for="cadena">Ingrese la cadena:</label>
    <input type="text" name="cadena" id="cadena">
    <input type="submit" value="Enviar">
    <br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $c= filter_input(INPUT_GET, 'cadena',);
            echo "<br>La cadena ingresada es: ".$c."<br>";
            echo "La cadena en mayusculas es: ".mayus($c);
        }
    ?>
</form>
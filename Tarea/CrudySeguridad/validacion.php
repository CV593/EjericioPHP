<?php
session_start();

if (!isset($_SESSION['Usuario'])) {
    echo "Sesión no iniciada. Redirigiendo a login.php";
    header("Location: login.php");
    exit();
} else {
    //esto me estaba dando unos clavos, pero al final lo pude solucionar
    echo "Sesión iniciada como: " . $_SESSION['Usuario'];
}
?>
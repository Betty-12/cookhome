<?php
$mysqli = new mysqli("localhost", "root", "2C1AD039F8", "tiendaonline") or die ("No conexion");
    if (mysqli_connect_errno()) {
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }

?>
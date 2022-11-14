<?php
    session_start();
    $varsesion = $_SESSION['usuario'];

    if ($varsesion == null || $varsesion = '') {
        header("Location:index.php");
        die();
    }
    $conexion = new mysqli("localhost", "root", "2C1AD039F8", "tiendaonline");
    $id_item = $_POST['id_detalles'];
    $sql = "DELETE FROM detalle_venta WHERE id_detalleVenta=".$id_item.";";
    echo $varsesion;

    $conexion->query($sql);

?>

<script type="text/javascript" >
	window.location.href='./html/carrito.php';
</script>
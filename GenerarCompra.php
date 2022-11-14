<?php
    $conexion = new mysqli("localhost", "root", "2C1AD039F8", "tiendaonline");
global $id_client;
global $tam;
    session_start();
    $varsesion = $_SESSION['usuario'];

    if ($varsesion == null || $varsesion = '') {
        header("Location:index.php");
        die();
    }
    $consult = "SELECT * FROM detalle_venta where estatus = 0;";
    $resul=mysqli_query($conexion,$consult);
    while($res4 = mysqli_fetch_array($resul)){
        $tam = sizeof($res4);
    }
    
    
    if($_POST['sizeAr'] <= 0 || $tam == 0){
        ?>
    <script>
        alert("NO HAY ITEMS EN EL CARRITO");
        window.location.href='./html/carrito.php';
    </script>
        <?php
    }

    $id_session = mysqli_query($conexion,"SELECT id_cliente FROM cliente WHERE email='".$_SESSION['usuario']."';");
    while($res = mysqli_fetch_array($id_session)){
        $id_client = $res['id_cliente'];
        $total_Price =  mysqli_query($conexion,"SELECT SUM(precio) AS precio_TOTAL FROM detalle_venta WHERE id_cliente = ".$res['id_cliente']." AND estatus = 0;");
        while($res2 = mysqli_fetch_array($total_Price)){
            $data = $res2['precio_TOTAL'];
            $sql2 = "INSERT INTO venta (id_cliente, id_usuario, fecha, TotalVenta, descuento, pagado, estatus) VALUES 
            (".$res['id_cliente'].",".$res['id_cliente'].",NOW(), ".$res2['precio_TOTAL'].", 0, 1, 1)";
            
        }  
        $sql = "UPDATE detalle_venta SET estatus = 1 WHERE id_cliente = ".$res['id_cliente'].";";  
        
    }

    
    
    
    $conexion->query($sql2);
    $conexion->query($sql);
    

?>

<script type="text/javascript" >
	window.location.href='./html/carrito.php';
</script>
<?php
    $conexion=new mysqli("localhost","root","2C1AD039F8","tiendaonline");
    global $id_client;
?>

<?php
session_start();
$varsesion = $_SESSION['usuario'];

if ($varsesion == null || $varsesion = '') {
    echo "<script>alert('Hay que iniciar sesion')</script>";
    echo "<script>window.location.replace('./index.php')</script>";
    die();
}
$id_session = mysqli_query($conexion,"SELECT id_cliente FROM cliente WHERE email='".$_SESSION['usuario']."';");

while($res = mysqli_fetch_array($id_session)){
    $id_client = $res['id_cliente'];
}
?>


<?php
    $conexion = new mysqli("localhost", "root", "2C1AD039F8", "tiendaonline");
    $id_client = $_POST['id_client'];
    $id_item = $_POST['ID_ITEM'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO detalle_venta (id_inventario, id_cliente, cantidad, precio, estatus) VALUES (".$id_item.",".$id_client.",".$amount.",".$price*$amount.", 0);";
    #echo $sql;
    $conexion->query($sql);


?>

<script type="text/javascript" >
	window.location.href='home.php';
</script>


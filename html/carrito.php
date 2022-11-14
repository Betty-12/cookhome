<?php
    session_start();
    $varsesion = $_SESSION['usuario'];

    if ($varsesion == null || $varsesion = '') {
        header("Location:index.php");
        die();
    }

$conexion=new mysqli("localhost","root","2C1AD039F8","tiendaonline");

$id_session = mysqli_query($conexion,"SELECT id_cliente FROM cliente WHERE email='".$_SESSION['usuario']."';");

while($res = mysqli_fetch_array($id_session)){
    $id_client = $res['id_cliente'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/eb0ce24bc3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cook Home</title>
</head>

<body>
    <div class="contenedor">
        <nav class="nav-main">
            <div class="logo">
                <img src="../assets/logo1.png" alt="error logo" class="nav-log">
            </div>

            <ul class="nav-menu">
                    <li>
                        <a href="/home.php">Home</a>
                    </li>
                    <li>
                        <a href="/about.php">Acerca de nosotros</a>
                    </li>
                    <li>
                        <a href="#contacto">Contactanos</a>
                    </li>
                
                </ul>
                </ul>

                <ul class="nav-manu-raight">

                <li>
        <div class="cont">
            <a href="../cerrarsesion.php"><i class="fas fa-logout" >Cerrar Sesión</i></a>
        </div>
    </li>
    <li>
        <div class="cont">
            <a class="fas fa-envelope" href="mailto:611910494@utsalamanca.edu.mx, ivonne.1919vargas@gmail.com, miriammendoz71@gmail.com,611910341@utsalamana.edu.mx?subject=Cook%20Home"></a>
        </div>
    </li>

    <li>
        <div class="cont" href="">
            <a class="fas fa-user-circle" href="./profile.php"></a>
        </div>
    </li>

    <li>
        <div class="cont">
            <a style="text-decoration: none; color: black;" href="./html/carrito.php"><i class="fas fa-cart-plus"></i></a>
        </div>
    </li>

            </ul>
        </nav>
    </div>

    <header class="hero">
        <div class="container">

            <section class="hero__container">
                <div class="hero__text">
                    <h1 class="hero__title">COOK HOME</h1>
                    <h2 class="hero__subtitle">De la cocina a tu boca</h2>

                </div>
            </section>
        </div>
        <div class="hero__wave" style="overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 351.77,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #F3F0D7 ;"></path>
            </svg></div>
    </header>

    <main>
    <h1>Carrito</h1>
    <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No. Orden</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
    <?php
                $sql="SELECT id_detalleVenta, inventario.nombre , cantidad, precio, detalle_venta.estatus FROM detalle_venta INNER JOIN inventario ON detalle_venta.id_inventario = inventario.id_inventario;";
                $resul=mysqli_query($conexion,$sql);

                while($mostrar=mysqli_fetch_array($resul)){
                    $id_venta = $mostrar['id_detalleVenta'];
                    $nombre = $mostrar['nombre'];
                    $cantidad = $mostrar['cantidad'];
                    $precio = $mostrar['precio'];
                    $status = $mostrar['estatus'];
                    $tam = sizeof($mostrar);

                    if(!$status){
                ?>



           
                    <tr>
                    <th scope="row"><?php echo $id_venta ?></th>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $cantidad?></td>
                    <td><?php echo $precio ?></td>
                    <td>
                        <form action="../borrarItemCarrito.php" method="post">
                            <input type="hidden" name="id_detalles" value="<?php echo $id_venta ?>">
                            <button type="submit" class="btn btn-danger "><i class="fa-solid fa-trash-can col-md-auto"></i></button>
                        </form>                
                    </td>
                    </tr>
        <?php 
                    }
           }
        ?>
          </tbody>
        </table>
        <br>
        <center>
        <form action="../GenerarCompra.php" method="post">
                            <input type="hidden" name="sizeAr" value="<?php echo $tam ?>">       
                            <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_nwnT3kQe93ZX6Gw5AddBSJGO"
                                data-amount=<?php echo str_replace(",","",$precio *100 )?>
                                data-name="<?php echo $nombre?>"
                                data-description="DEMO POR FAVOR NO USAR NUMERO DE TARJETA REAL"
                               
                                data-currency="mxn"
                                data-locale="auto">
                            </script>

        </form>
        </center>
        <h1>Historial de compras</h1>
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No. Orden</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Total</th>
                    
                    <th scope="col">Pagado</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="tablebody">
             
    <?php
                $sql="SELECT DISTINCT venta.id_venta, venta.fecha, venta.TotalVenta, venta.descuento, venta.pagado, venta.estatus
                FROM venta 
                where venta.id_cliente = ".$id_client." ORDER BY venta.id_venta asc;";
                $resul=mysqli_query($conexion,$sql);

                while($mostrar=mysqli_fetch_array($resul)){
                    $id_venta = $mostrar['id_venta'];
                    $fecha = $mostrar['fecha'];
                    $total_venta = $mostrar['TotalVenta'];
                    #$descuento = $mostrar['descuento'];
                    $pagado = $mostrar['pagado'];
                    $status = $mostrar['estatus'];
                ?>



           
                    <tr>
                    <th scope="row"><?php echo $id_venta ?></th>
                    <td><?php echo $fecha ?></td>
                    <td><?php echo $total_venta ?></td>
                    <td><?php echo $descuento ?></td>
                    <?php 
                    if($pagado){
                    ?>
                    <td><i class="fa-solid fa-circle-check"></i></td>
                     <?php 
                        }else{
                     ?>
                    <td><i class="fa-solid fa-circle-xmark"></i></td>
                    <?php 
                        }
                            
                    ?>
                     <?php 
                    if($status){
                    ?>
                    <td><i class="fa-solid fa-envelope-circle-check"></i></td>
                     <?php 
                        }else{
                     ?>
                    <td><i class="fa-solid fa-hourglass"></i></td>
                    <?php 
                        }
                            
                    ?>

                    </tr>
        <?php 
           }
        ?>
          </tbody>
        </table>

       

    </main>
    <footer class="footer">
        <div class="container footer__grid">
            <nav class="nav nav--footer">
                <a href="/home.php" class="nav__items  nav__items--footer">Inicio</a>
                <a href="/about.php" class="nav__items  nav__items--footer">Sobre nosotros</a>
                <a href="#" class="nav__items  nav__items--footer">Más</a>
            </nav>

            <section class="footer__contact" id="contacto">
                <h3 class="footer__title">Contactanos</h3>
                <div class="footer__icons">
                    <span class="footer__container-icon">
                        <a class="fab fa-whatsapp footer__icon" href="https://web.whatsapp.com/send?phone=+524646541036"></a>                        
                    </span>
                    <span class="footer__container-icon">
                    <a class="fa fa-envelope footer__icon" href="mailto:611910494@utsalamanca.edu.mx, ivonne.1919vargas@gmail.com, miriammendoz71@gmail.com,611910341@utsalamana.edu.mx?subject=Cook%20Home"></a>
                    </span>
                    <span class="footer__container-icon">
                        <a class="fab fa-facebook-f footer__icon" href="https://www.facebook.com/profile.php?id=100009727302674"></a>
                    </span>
                </div>
            </section>
        </div>
    </footer>
</body>
</html>
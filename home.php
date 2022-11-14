<?php
    $conexion=new mysqli("localhost","root","2C1AD039F8","tiendaonline");
    global $id_client;
    global $correo;
?>
<?php
    session_start();
    $varsesion = $_SESSION['usuario'];

    if ($varsesion == null || $varsesion = '') {
        header("Location:index.php");
        die();
    }

    $id_session = mysqli_query($conexion,"SELECT id_cliente FROM cliente WHERE email='".$_SESSION['usuario']."';");

    while($res = mysqli_fetch_array($id_session)){
        $id_client = $res['id_cliente'];
        $correo = $res['email'];
    }
    
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/eb0ce24bc3.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./assets/css/estilos.css">
        <title>Cook Home</title>
    </head>

    <body>
        <div class="contenedor">
            <nav class="nav-main">
                <div class="logo">
                    <img src="./assets/logo1.png" alt="error logo" class="nav-log">
                </div>

                <ul class="nav-menu">
                    <li>
                    <a href="./index.php">Home</a>
                    </li>
                    <li>
                        <a href="./about.php">Acerca de nosotros</a>
                    </li>
                    <li>
                        <a href="#menu">Menú</a>
                    </li>
                    <li>
                        <a href="#contacto">Contactanos</a>
                    </li>
                
                </ul>
                </ul>

                <ul class="nav-manu-raight">

    <li>
        <div class="cont">
            <a href="./cerrarsesion.php"><i class="fas fa-logout" >Cerrar Sesión</i></a>
        </div>
    </li>
    <li>
        <div class="cont">
            <a class="fas fa-envelope" href="mailto:611910494@utsalamanca.edu.mx, ivonne.1919vargas@gmail.com, miriammendoz71@gmail.com,611910341@utsalamana.edu.mx?subject=Cook%20Home"></a>
        </div>
    </li>

    <li>
        <div class="cont" href="">
           <a class="fas fa-user-circle" href="./profile.php?id=<?php echo $id_client.'ip='.$_SERVER['REMOTE_ADDR']; ?>"></a>
           
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
            <section class="carusel">
                <div class="slider">
                    <ul>
                        <li><img src="./assets/guisados/carnedepuerco.jpeg" alt=""></li>
                        <li><img src="./assets/salsas/molcajete.jpeg" alt=""></li>
                        <li><img src="./assets/chilesrellenos.jpg" alt=""></li>
                        <li><img src="./assets/tortas/jamon.jpeg" alt=""></li>

                    </ul>
                </div>
            </section>
            <section class="testimony container">
        
                <h2 class="subtitle" id="menu"> Menú</h2>
                <div class="menu__grid">
                <?php
                    $sql="SELECT * FROM inventario";
                    $resul=mysqli_query($conexion,$sql);

                    while($mostrar=mysqli_fetch_array($resul)){
                        $id_item = $mostrar['id_inventario'];
                        $stock = $mostrar['stock'];
                ?>
                    <article class="menu__item">
                        <div class="menu__me">
                            <div class="img">
                                <img src=<?php echo $mostrar['imagen']?> alt="Error de imagen" class="menu__img">
                            </div>
                            <div class="menu__texts">
                                <h3 class="menu__name"><?php echo $mostrar['nombre']?></h3>
                                <p class="testimony__review"><?php echo $mostrar['descripcion']?></p>
                                <div class="button">
                            
                            <!--FORMULARIO DE ENVIO AL CARRITO-->
                                <form action="./AgregarCarrito.php" method='post'>
                                    <input type="hidden" name="ID_ITEM" value="<?php echo $id_item?>">
                                    <div class="form-group">
                                        <label for="amount">Cantidad:</label>
                                        <input class="form-control" id="amount" name="amount">
                                        
                                            <?php  
                                                $values = array();
                                                for($i=1; $i<=$stock; $i++){
                                                    array_push($values, $i);
                                                }  ?>

                                                <?php foreach($values as $value){?>
                                                    <option value="<?php echo intval($value);?>"> <?php echo intval($value);?></option>
                                                <?php } ?>
                                            ?>
                                                </input>
                                    </div>
                                    
                                    <input type="hidden" name="price" value="<?php  echo $mostrar['precio_venta'] ?>">
                                    <input type="hidden" name="id_client" value="<?php  echo $id_client ?>">
                                    <input type="submit" class="botonre" value="$ <?php echo $mostrar['precio_venta']; ?>">
                                    
                                </form>
                                <!--FORMULARIO DE ENVIO AL CARRITO-->

                                </div>
                                <div class="nav">
                                    <nav class="nav-main-menu">

                                    </nav>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php 
                    }
                    ?>	    
                </div>

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

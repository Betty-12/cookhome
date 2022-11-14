<?php
    $conexion=new mysqli("localhost","root","2C1AD039F8","tiendaonline");
    global $id_client;

?>

<?php
session_start();
$varsesion = $_SESSION['usuario'];

if ($varsesion == null || $varsesion = '') {
    //header("Location:index.php");
    //die();
}
else{
    header("Location:home.php");
}
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

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("login").submit();
        }
    </script>
    <link rel="stylesheet" href="./assets/css/estilos.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

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
                <a href="./home.php">Home</a>
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

            
        </nav>
    </div>
    <header class="hero">
        <div class="container">
            
            <section class="hero__container">
                <div>
                <h2>Iniciar Sesion</h2>
                    <form id="login" action="./login.php" method="POST">
                        <div class="menu_me">
                        <div class="input-group-prepend">
                        </div>
                            <input class="form-control" type="text" name="email" placeholder="Usuario">
                        </div>
                        <br>
                        <div class="form-group">
                            <input class="form-control" type="password" name="pass" placeholder="Password">
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="iniciar">Iniciar Sesion</button>


                            <br>
                        </div>
                    </form>
                    <form action="./registro.php" >
                                <div class="form-group">
                                <button type="submit" class="btn btn-success">Crear Cuenta</button>
                                </div>
                            </form>
                    </div>
            </section>
        </div>
    <div class="hero__wave" style="overflow: hidden;" ><svg viewBox="0 0 500 120" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 351.77,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #F3F0D7 ;"></path></svg></div>
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
      
            <h2 class="subtitle" id="menu">Menú</h2>
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
                                <input type="number" name="amount" id="amount">
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
                <a href="./about.php" class="nav__items  nav__items--footer">Sobre nosotros</a>
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

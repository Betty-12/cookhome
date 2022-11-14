<?php
    $conexion=new mysqli("localhost","root","2C1AD039F8","tiendaonline");
    global $id_client;
    global $correo;
    global $nombre;
    global $direccion;
    global $telefono;
?>
<?php
    session_start();
    $varsesion = $_SESSION['usuario'];

    if ($varsesion == null || $varsesion = '') {
        header("Location:index.php");
        die();
    }

    $id_session = mysqli_query($conexion,"SELECT * FROM cliente WHERE email='".$_SESSION['usuario']."';");

    while($res = mysqli_fetch_array($id_session)){
        $id_client = $res['id_cliente'];
        $correo = $res['email'];
        $nombre = $res['nombre'];
        $direccion = $res['direccion'];
        $telefono = $res['telefono'];
    }
    #echo "ID Cliente: " . $id_client . "<br>";
    #echo "Correo: " . $correo . "<br>";
    #echo "Nombre: " . $nombre . "<br>";
    #echo "Direccion: " . $direccion . "<br>";
    #echo "Telefono: " . $telefono . "<br>";
    #echo "IP: " . $_SERVER['REMOTE_ADDR'] . "<br>";
    echo $user_agent = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/eb0ce24bc3.js" crossorigin="anonymous"></script>
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
        </nav>
    </div>
    <header class="hero">
        <div class="container">
            <section class="hero__container">
                <div>
                <h2>Perfil</h2>
                    <form id="form" action="./creando.php" method="POST">
                        <div class="menu_me">
                        <div class="input-group-prepend">
                        </div>
                            <input class="form-control" type="text" name="nombre" placeholder="Nombre Completo" disabled>
                        </div>
                        <br>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Correo Electronico" disabled>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="telefono" placeholder="Numero Telefonico" disabled>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="direccion" placeholder="Domicilio" disabled>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="pass" placeholder="Password" disabled>
                        </div>
                        <br>
                        <div class="form-group">
                            <br>
                        </div>
                    </form>

                    </div>
            </section>
        </div>
    <div class="hero__wave" style="overflow: hidden;" ><svg viewBox="0 0 100 100" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 351.77,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #F3F0D7 ;"></path></svg></div>
    </header>
    
  

    <footer class="footer">
        <div class="container footer__grid">
        </div>
    </footer>

<script type="text/javascript">
    document.forms['form']['nombre'].value = "<?php echo $nombre; ?>";
    document.forms['form']['email'].value = "<?php echo $correo; ?>";
    document.forms['form']['telefono'].value = "<?php echo $telefono; ?>";
    document.forms['form']['direccion'].value = "<?php echo $direccion; ?>";
    document.forms['form']['pass'].value = "<?php echo $telefono; ?>";
</script>
</body>
</html>

telefono; ?>";
</script>
</body>
</html>


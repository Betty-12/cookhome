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
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                <h2>Registrate</h2>
                    <form id="registro" action="./creando.php" method="POST">
                        <div class="menu_me">
                        <div class="input-group-prepend">
                        </div>
                            <input class="form-control" type="text" name="nombre" placeholder="Nombre Completo">
                        </div>
                        <br>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Correo Electronico">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="telefono" placeholder="Numero Telefonico">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="direccion" placeholder="Domicilio">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="pass" placeholder="Password">
                        </div>
                        <br>
                        <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LeadcgiAAAAALMLiYFPfKZAHAXqB9DxHjQLzQJy"></div>
                                <button type="submit" class="btn btn-success" name="iniciar">Crear cuenta</button>
                            <br>
                        </div>
                    </form>

                    </div>
            </section>
        </div>

    </header>   
    
  

    <footer class="footer">
        <div class="container footer__grid">
        </div>
    </footer>
</body>
</html>

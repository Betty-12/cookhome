<!DOCTYPE html>
<html lang="en">

<head>
    <title>Formulario para Registrar Platillos</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery-3.2.1.min.js"></script>

    <style>
        .ventana {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 30px;
            display: none;
            color: #FFF;
            height: 90%;
            left: 120px;
            position: fixed;
            top: 55px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .container{
            padding: 4em;
        }
        .containerdos{
            background-color: rgba(253, 189, 128, 0.8);
            top: 15px;
            padding: 8em;
            padding-top: 2em;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            border-radius: 1em;
        }

    </style>
</head>

<body>
    <div class="contenedor">
        <nav class="nav-main">
            <div class="logo">
                <img src="./assets/logo1.png" alt="error logo" class="nav-log">
            </div>

            <ul class="nav-menu">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Acerca de nosotros</a>
                </li>
                <li>
                    <a href="#">Menú</a>
                </li>
                <li>
                    <a href="#">Noticias</a>
                </li>
                <li>
                    <a href="#">Más</a>
                </li>

            </ul>

            <ul class="nav-manu-raight">

                <li>
                    <div class="cont">
                        <a href="../cerrarsesion.php"><i class="fas fa-logout">Cerrar Sesión</i></a>
                    </div>
                </li>
                <li>
                    <div class="cont">
                        <i class="fas fa-envelope"></i>
                    </div>
                </li>

                <li>
                    <div class="cont" href="#">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </li>

                <li>
                    <div class="cont">
                        <a style="text-decoration: none; color: black;" href="./html/carrito.html"><i class="fas fa-cart-plus"></i></a>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
    <div>
        <div>
            <a href="javascript:openVentana();"><button class="btn btn-primary" style="float: right;">Agregar Categoria</button></a>

        </div>
        <?php
            $conexion=new mysqli("localhost","root","2C1AD039F8","tiendaonline");
        ?>
        <center>
            <form role="form" action="../agregarplatillo.php" method="POST">
                <div class="containerdos" enctype="multipart/form-data">
                    <IMG src="../assets/logo1.png" height="150px"><br>
                    <label for="name">Agregar Nuevo Platillo</label>
                    <input class="form-control" name="NOMBRE" id="NOMBRE" type="text" placeholder="Nombre">
                    <br>
                    <input class="form-control" name="CODIGO" id="CODIGO" type="text" placeholder="Codigo">
                    <br>
                    <input class="form-control" name="PRECIO_VENTA" id="PRECIO_VENTA" type="number" placeholder="Precio de venta al Publico">
                    <br>
                    <input class="form-control" name="STOCK" id="STOCK" type="number" placeholder="Cantidad en almacen">
                    <br>
                    <input class="form-control" name="DESCRIPCION" id="DESCRIPCION" type="text" placeholder="Descripcion del Platillo">
                    <br>

                    
                    <br>
                    <br>
                    <label for="">Categorias</label>
                    <select type="text" class="form-input" name="ID_CATEGORIA" id="ID_CATEGORIA"" size="1">
                    <?php
						$sql="SELECT * FROM categoria";
						$resul=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_array($resul)){
                    ?>
                        <option  value="<?php echo $mostrar['id_categoria']?>"><?php echo $mostrar['id_categoria']?> : <?php echo $mostrar['nombre']?></option>
                        <?php 
						}
                        ?>	
                    </select>

                    <label for="photo">Foto del Platillo</label>
                    <input class="form-control" name="IMAGEN" id="IMAGEN" type="file" placeholder="Imagen">
                    <span class="fa-stack fa-2x">
                        <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                        <i class="fa fa-circle fa-stack-1x top medium"></i>
                        <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
                    </span>
                    <span class="desc">Pulse aquí para añadir la foto</span>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </form>
        </center>
    </div>


    <div class="ventana">
        <div class="">
            <div class="container">
                <a href="javascript:closeVentana();">
                    <img src="img/eliminar.png" id="imageneliminar">
                </a>
                <form action="../agregarcategoria.php" method="POST">
                    <header>
                        <h1 style="color: #FFF;text-align: center;">Agregar Categoria</h1>
                    </header>
                    <div id="datos">
                        <h1>Datos Categoria</h1>
                        <input class="form-control" name="NOMBRE" id="NOMBRE" type="text" placeholder="Nombre" required="">
                        <br>
                        <input class="form-control" name="DESCRIPCION" id="DESCRIPCION" type="text" placeholder="Descripción" required="">
                        <br>
                    </div>

                    <div id="notificacion">

                        <button class="btn btn-primary" type="submit" value="Registrar">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    function openVentana() {
        $(".ventana").slideDown("slow");
    }

    function closeVentana() {
        $(".ventana").slideUp("fast");
    }
</script>
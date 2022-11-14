<?php

$servername = "localhost";
$database = "tiendaonline";
$username = "root";
$password = "2C1AD039F8";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully <br>";


$nombre=$_POST['nombre'];
$user=$_POST['email'];
$pass=$_POST['pass'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$token = sha1($pass);
$status = "1";
$ip = $_SERVER['REMOTE_ADDR'];
$secretkey = "6LeadcgiAAAAAJO1frBMiNy2zzpgVk6ImgvQzh9T";
$Captcha =$_POST['g-recaptcha-response'];

$respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$Captcha&remoteip=$ip");
$atribb = json_decode($respuesta, TRUE);


echo "Usuario: ",$user, "<br>";
echo "Nombre: ",$nombre, "<br>";
echo "Password: ", $token, "<br>";
echo "Numero Telefonico: ", $telefono, "<br>";
echo "Direccion: ", $direccion, "<br>";
echo "Token: ", $token, "<br>";
echo "data: ", $atribb, "<br>";

if($atribb['success']){
    echo "COMPLETADO";


$query = "SELECT * FROM cliente WHERE email='{$_POST['email']}' ";
$result=mysqli_query($conn,$query);
$row=$result->fetch_assoc();
if($user == NULL || $user == ''){
    echo "<script>alert('Falta un dato')</script>";
    echo "<script>window.location.replace('./index.php')</script>";
}
else{
    if($row>0){
        echo "<script>alert('Cuenta ya existente')</script>";
        echo "<script>window.location.replace('./index.php')</script>";
    }
    
    else{
        $sql1 = "INSERT INTO cliente (nombre, direccion, telefono, email, clave, token, estus) VALUES ('{$_POST['nombre']}','{$_POST['direccion']}','{$_POST['telefono']}','{$_POST['email']}','{$_POST['pass']}','$token','1')";
        if (mysqli_query($conn, $sql1)) {
            #echo "New record created successfully";
            echo "<script>alert('Cuenta creada con exito')</script>";
            echo "<script>window.location.replace('./index.php')</script>";
        } else {    
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
    
    
}
else{
    echo "<script>alert('CAPTCHA NO SUPERADO')</script>";
    echo "<script>window.location.replace('./registro.php')</script>";
}
?>

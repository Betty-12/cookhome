<?php

include('conexion.php'); 

 $user=$_POST['email'];
 $pass=$_POST['pass'];
 $long=strlen($user);

    if ($long <= 9  ) {
        $query = "SELECT * FROM cliente WHERE email='$user' and clave= '$pass' ";
        $result=$mysqli->query($query);
        $row=$result->fetch_assoc();
        if($row>0){
            session_start();
            $_SESSION['usuario'] = $user;
            header("location: html/agregarinventario.php");
        }
    }else if ($long !== '') {
        $query = "SELECT * FROM cliente WHERE email='$user' and clave= '$pass' ";
        $result=$mysqli->query($query);
        $row=$result->fetch_assoc();
        if($row>0){
            session_start();
            $_SESSION['usuario'] = $user;
            header("location: home.php");
        }
    }
    
 
?>
<script type="text/javascript">
    alert("Verifica tus datos");
    window.location.href='index.php';
</script>
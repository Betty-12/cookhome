<?php
    insertar($_POST['ID_CATEGORIA'],$_POST['NOMBRE'],$_POST['CODIGO'],$_POST['PRECIO_VENTA'],$_POST['STOCK'],$_POST['DESCRIPCION'],$_POST['IMAGEN']);

    function insertar ($idcat,$nom,$codi,$presventa,$stoc,$desc,$imagen){
        $conexion = new mysqli("localhost", "root", "2C1AD039F8", "tiendaonline"); //Conexion a la base de datos

        $sql = "INSERT INTO inventario (ID_INVENTARIO,ID_CATEGORIA, NOMBRE, CODIGO, PRECIO_VENTA, STOCK, DESCRIPCION, IMAGEN, ESTATUS) 
                VALUES (NULL,'".$idcat."', '".$nom."','".$codi."','".$presventa."','".$stoc."', '".$desc."','".$imagen."', '1')";

        $conexion->query($sql);
    }

?>
<script type="text/javascript" >
	window.location.href='home.php';
</script>

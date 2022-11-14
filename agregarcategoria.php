<?php
    insertar($_POST['NOMBRE'],$_POST['DESCRIPCION']);

    function insertar ($nom,$desc){
        $conexion = new mysqli("localhost", "root", "", "tiendaonline");

        $sql = "INSERT INTO categoria (ID_CATEGORIA, NOMBRE, DESCRIPCION, ESTATUS)
        VALUES (NULL, '".$nom."', '".$desc."', '1')";

        $conexion->query($sql);
        
    }

?>
<script type="text/javascript" >
	window.location.href='html/agregarinventario.php';
</script>

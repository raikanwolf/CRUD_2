<?php

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $eliminar=$conexion->query("delete from  producto where id_producto='$id'");
    if($eliminar){
        echo "<div class='alert alert-success'>producto eliminado</div>";
    }else{
        echo "<div class='alert alert-danger'>error al eliminar</div>";
    }
}
?>

<script>
    //eliminar eso de reenvio de formulario
    window.history.replaceState(null, null, window.location.pathname)
</script>

<?php ?>
<?php 
 if (!empty($_POST['txtmodificar'])){
    $id=$_POST['txtid'];
    $categoria=$_POST['txtcategoria'];
    $nombre=$_POST['txtnombre'];
    $precio=$_POST['txtprecio'];

    if(!empty($categoria) and !empty($nombre) and !empty($precio)){
        $modificar=$conexion->query("UPDATE producto SET id_categoria='$categoria', nombre='$nombre',precio='$precio' where id_producto='$id'");
        if ($modificar){
            echo "<div class='alert alert-success'>producto editado</div>";
        }else{
            echo "<div class='alert alert-danger'>error al modificar</div>";
        }
        
    }else{
        echo "<div class='alert alert-danger'>debes llenar todos los campos</div>";
    }
 }
?>

<script>
    //eliminar eso de reenvio de formulario
    window.history.replaceState(null, null, window.location.pathname)
</script>

<?php ?>
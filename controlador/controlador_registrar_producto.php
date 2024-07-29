<?php 
 if (!empty($_POST['txtregistrar'])){
    $categoria=$_POST['txtcategoria'];
    $nombre=$_POST['txtnombre'];
    $precio=$_POST['txtprecio'];

    if(!empty($categoria) and !empty($nombre) and !empty($precio)){
        $registrar=$conexion->query("INSERT INTO producto(id_categoria,nombre,precio) values('$categoria','$nombre','$precio')");
        if (!$registrar){
            echo "<div class='alert alert-danger'>error al registrar</div>";
        }
        echo "<div class='alert alert-success'>producto registrado</div>";
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
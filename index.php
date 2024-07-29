<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/522d013271.js" crossorigin="anonymous"></script>
    <title>Crud</title>
</head>

<body>
    <script>
        function confirmar(){
            return confirm("¿Desea eliminar el producto?");
        }
    </script>

    <?php include("modelo/conexion.php"); ?>
    <?php include("controlador/controlador_registrar_producto.php"); ?>
    <?php include("controlador/controlador_modificar_producto.php"); ?>
    <?php include("controlador/controlador_eliminar_producto.php"); ?>

    <div class="alert alert-primary">CRUD</div>
<!-----------------------------formulario de productos------------------------------------------------------------------------------------------------------------------->
    <div class="row col-12 p-4">
        <form action="" class="col p-3" method="POST">
            <div class="alert alert-success"> Registro de productos</div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="txtcategoria">
                    <option selected>Seleccionar</option>

                    <?php $categorias = $conexion->query("select * from categoria");
                    while ($datos = $categorias->fetch_object()) { ?>
                        <option value="<?= $datos->id_categoria ?>"><?= $datos->categoria ?></option>

                    <?php }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="txtnombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="number" class="form-control" name="txtprecio" step=0.01>
            </div>

            <div class="mb-3">
                <button type="submit" name="txtregistrar" value="OK" class="btn btn-primary">Registrar</button>
            </div>
        </form>


<!-----------------------------tabla de productos------------------------------------------------------>
        <table class="table col p-3">
            <thead>
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">PRECIO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $productos = $conexion->query("select producto.*,categoria.categoria from producto
                inner join categoria ON
                producto.id_categoria=categoria.id_categoria");

                while ($datos = $productos->fetch_object()) { ?>
                    <tr>
                        <td><?= $datos->id_producto ?></td>
                        <td><?= $datos->categoria ?></td>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->precio ?></td>
                        <td>
                            <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$datos->id_producto?>"><i class="fas fa-edit"></i></a>
                            <a href="index.php?id=<?=$datos->id_producto?>" onclick="return confirmar()" class="btn btn-danger" method="GET"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>

<!---*+*+*+***+*+*+*+*++*-- Modal para editar-->  <!-- EDIT -------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="modal fade" id="exampleModal<?=$datos->id_producto?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Productos</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="col p-3" method="POST">

                                        <input type="hidden" value="<?=$datos->id_producto?>" name="txtid">

                                        <div class="alert alert-success"> Registro de productos</div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Categoria</label>
                                            <select class="form-select" aria-label="Default select example" name="txtcategoria">
                                                <option selected>Seleccionar</option>
                                                <?php $categorias = $conexion->query("select * from categoria");
                                                while ($datosCat = $categorias->fetch_object()) { ?>
                                                    <!-- hay dosvariables llamadas datos, la que estan arriba en los td y la local datosCat, los compara con un if terciario-->
                                                    <option <?= $datos->id_categoria==$datosCat->id_categoria ? "selected" : ""?> value="<?= $datosCat->id_categoria ?>"><?= $datosCat->categoria ?></option>

                                                <?php }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input type="text" class="form-control" name="txtnombre" value="<?= $datos->nombre ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Precio</label>
                                            <input type="number" class="form-control" name="txtprecio" step=0.01 value="<?= $datos->precio ?>">
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" name="txtmodificar" value="OK" class="btn btn-primary">Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
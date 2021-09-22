<?php include '../template/header.php'; ?>

<?php

    if (!isset($_GET['codigo'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once '../model/connection.php';
    $cliente_id = $_GET['codigo'];
    $sentencia = $bd->prepare('SELECT * FROM clientes WHERE cliente_id = ?;');
    $sentencia->execute([$cliente_id]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    // print_r($persona);

?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-5 mb-5">
            <div class="card">
                <div class="card-header bg-warning">
                    Editar datos
                </div>
                <form action="../files/editarProceso.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <labe class="form-label">Documento</labe>
                        <input type="number" class="form-control" name="documento" required value="<?php echo $persona->cliente_documento; ?>">
                    </div>
                    <div class="mb-3">
                        <labe class="form-label">Nombre</labe>
                        <input type="text" class="form-control" name="nombre" required value="<?php echo $persona->cliente_nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <labe class="form-label">Apellido</labe>
                        <input type="text" class="form-control" name="apellido" required value="<?php echo $persona->cliente_apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <labe class="form-label">Dirección</labe>
                        <input type="text" class="form-control" name="direccion" required value="<?php echo $persona->cliente_direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <labe class="form-label">Telefono</labe>
                        <input type="number" class="form-control" name="telefono" required value="<?php echo $persona->cliente_telefono; ?>">
                    </div>
                    <div class="mb-3">
                        <labe class="form-label">Correo</labe>
                        <input type="email" class="form-control" name="correo" required value="<?php echo $persona->cliente_correo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="cliente_id" value="<?php echo $persona->cliente_id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>
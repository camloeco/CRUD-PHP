<?php 

    // HEADER
    include '../template/header.php';

    // BD CONNECTION
    include_once '../model/connection.php';

    // QUERY
    $sentencia = $bd->query('SELECT * FROM clientes');

    // FETCH ARRAY
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    // print_r($persona);

?>

<div class="container mt-5">

    <!-- FILA 1 -->
    <div class="row justify-content-center">

        <!-- COLUMNA 1 -->
        <div class="col-md-10">

            <!-- ALERTS -->
            <?php
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'falta') {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error,</strong> debe competar todos los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado') {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registrado,</strong> los datos fueron registrados correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error') {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error,</strong> vuelve a intentar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'editado') {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Editado,</strong> los datos fueron actualizados correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado') {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Eliminado,</strong> los datos fueron aeliminados correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <!-- /ALERTS -->
            
            <!-- TABLE -->
            <div class="card">

                <div class="card-header bg-primary">
                    Lista de personas
                </div>

                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Documento</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                foreach ($persona as $dato) {
                            ?>

                            <tr>
                                    <td scope="row"><?php echo $dato->cliente_documento ?></td>
                                    <td><?php echo $dato->cliente_nombre ?></td>
                                    <td><?php echo $dato->cliente_apellido ?></td>
                                    <td><?php echo $dato->cliente_direccion ?></td>
                                    <td><?php echo $dato->cliente_telefono ?></td>
                                    <td><?php echo $dato->cliente_correo ?></td>
                                    <td><a class="text-warning" href="../files/editar.php?codigo=<?php echo $dato->cliente_id ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('¿Esta segudo de eliminar los datos?')" class="text-danger" href="../files/eliminar.php?codigo=<?php echo $dato->cliente_id ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
            <!-- /TABLE -->
        </div>
        <!-- /COLUMNA 1 -->
    </div>
    <!-- /FILA 1 -->


    <!-- FILA 2 -->
    <div class="row justify-content-center">
        
        <!-- COLUMNA 1 -->
        <div class="col-md-10 mt-5 mb-5">
            
            <!-- FORMULARIO -->
            <div class="card">

                <div class="card-header bg-warning">
                    Ingresar datos
                </div>

                <form action="../files/registrar.php" class="p-4" method="POST">
                    
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <labe class="form-label">Documento</labe>
                                <input type="number" class="form-control" name="documento" autofocus required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <labe class="form-label">Nombre</labe>
                                <input type="text" class="form-control" name="nombre" autofocus required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <labe class="form-label">Apellido</labe>
                                <input type="text" class="form-control" name="apellido" autofocus required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <labe class="form-label">Dirección</labe>
                        <input type="text" class="form-control" name="direccion" autofocus required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <labe class="form-label">Telefono</labe>
                                <input type="number" class="form-control" name="telefono" autofocus required>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="mb-3">
                                <labe class="form-label">Correo</labe>
                                <input type="email" class="form-control" name="correo" autofocus required>
                            </div>  
                        </div> 
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>

                </form>
            </div>
            <!-- /FORMULARIO -->
        </div>
        <!-- /COLUMNA 1 -->
    </div>
    <!-- /FILA 2 -->
</div>

<?php include '../template/footer.php'; ?>
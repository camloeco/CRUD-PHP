<?php

    if (!isset($_GET['codigo'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include '../model/connection.php';

    $codigo = $_GET['codigo'];
    $sentencia = $bd->prepare('DELETE FROM clientes WHERE cliente_id = ?;');
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    }
    else {
        header('Location: index.php?mensaje=error');
    }

?>
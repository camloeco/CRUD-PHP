<?php

    print_r($_POST);
    if (!isset($_POST['cliente_id'])) {
        header('Location: index.php?mensaje=error');
    }

    include '../model/connection.php';

    
    $codigo = $_POST['cliente_id'];
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sentencia = $bd->prepare('UPDATE clientes SET cliente_documento = ?,cliente_nombre = ?,cliente_apellido = ?,cliente_direccion = ?,cliente_telefono = ?,cliente_correo = ? WHERE cliente_id = ?;');
    $resultado = $sentencia->execute([$documento,$nombre,$apellido,$direccion,$telefono,$correo,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } 
    else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    

?>
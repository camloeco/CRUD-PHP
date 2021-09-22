<?php
    // print_r($_POST);
    if (empty($_POST['oculto']) || empty($_POST['documento']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['correo'])) {
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once '../model/connection.php';
    
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sentencia = $bd->prepare('INSERT INTO clientes(cliente_documento,cliente_nombre,cliente_apellido,cliente_direccion,cliente_telefono,cliente_correo) VALUES (?,?,?,?,?,?);');
    $resultado = $sentencia->execute([$documento,$nombre,$apellido,$direccion,$telefono,$correo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } 
    else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    

?>
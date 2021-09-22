<?php

    $contraseña = '';
    $usuario = 'root';
    $nombreBD = 'php_login_database';

    try {
        $bd = new PDO (
            'mysql:host=localhost;
            dbname='.$nombreBD,
            $usuario,
            $contraseña,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8')
        );
    } catch (Exception $e) {
        echo 'Problema con la conexión',$e->getMessage();
    }

?>
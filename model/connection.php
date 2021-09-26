<?php

    try {
        $bd = new PDO (
            'mysql:host=localhost;dbname=php_login_database','root',"",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8')
        );
    } catch (Exception $e) {
        echo 'Problema con la conexión',$e->getMessage();
        exit();
    }

?>
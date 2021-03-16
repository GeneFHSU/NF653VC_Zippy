<?php
    //$dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    //$username = "root";//'mgs_user';
    //$password = "";//'pa55word';
    $host       = getenv('JAW_HOST');
    $dbname     = getenv('JAW_DB');
    $dsn        = "mysql:host={$host};dbname={$dbname}";
    $username   = getenv('JAW_USER');
    $password   = getenv('JAW_PASS');

    $db = null;

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>
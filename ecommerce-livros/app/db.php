<?php
// app/config.php
define('DB_HOST','127.0.0.1');
define('DB_NAME','ecowoman');
define('DB_USER','seu_usuario');
define('DB_PASS','sua_senha');

// app/db.php
require_once __DIR__.'/config.php';

function getPDO(){
    static $pdo = null;
    if ($pdo === null) {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4";
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    return $pdo;
}

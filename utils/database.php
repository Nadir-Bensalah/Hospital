<?php
require_once (dirname(__FILE__).'/../config/config.php'); // appelle le fichier config 


function databaseConnect() {
try {
    $pdo= new PDO(DSN, USER, PASSWORD,[ 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
}
catch (PDOException $e) { 
    $error = $e ->getMessage(); 
}

return $pdo;

}
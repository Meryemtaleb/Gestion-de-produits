<?php
// Connexion PDO  vers la base de données via SQL
try {
$strConnection = 'mysql:host=localhost;port=3306;dbname=itech';
$pdo = new PDO($strConnection, 'root', '');
} 
// Afficher message si pb de connetion PDO
catch (PDOException $e) {
    $msg = 'ERREUR PDO dans' . $e->getMessage(); 
    die($msg); 
}






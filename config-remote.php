<?php

$host       = "localhost";
$username   = "urmmhg94sj79u";
$password   = "1@6S#2ex1~~b";
$dbname     = "dbzksfd4xmxryf"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

              /* Attempt to connect to MySQL database */
try{
    $pdo_connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
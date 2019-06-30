<?php
$dsn = "mysql:host=localhost;dbname=escola;port=3306";
$user = "root";
$pass = "";

try {
    $conexao = new PDO($dsn,$user,$pass);
} catch(PDOException $ex){
    // echo $ex->getMessage();
    echo "<h1>Desculpe, falha na conexão - entre em contato e informe o problema!</h1>";
    exit;
}


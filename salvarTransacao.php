<?php

include_once "openDB.php";

try {   

    $query = $conexao->prepare('insert into gastos (titulo,tipo,valor) values (?,?,?)');
    $resultado = $query->execute([$_POST['titulo'],$_POST['tipo'],$_POST['valor']]);
    
    if ($resultado){
        header('Location: index.php'); 
    } else {
        echo "<h1>Erro ao cadastrar</h1>";
        exit;
    }
} catch(PDOException $ex){
    echo "Serviço indisponível";
    exit;
}




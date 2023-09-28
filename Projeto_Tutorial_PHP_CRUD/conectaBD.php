<?php

try{
    $pdo = new pdo("mysql:host=127.0.0.1; dbname=crudsimples", "root", "");
    $pdo->setAttribute(pdo::ATTR_ERRMODE, ERRMODE_EXCEPTION);
    $pdo->exec("set names utf8");
}catch (PDOException $erro){
    echo "Erro na conexão: ".$erro->getMessage();
}

?>


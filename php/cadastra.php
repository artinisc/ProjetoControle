<?php

require_once("../php/conecta.php");

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$tel1 = $_POST['telefone1'];
$tel2 = $_POST['telefone2'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$equipamento = $_POST['equipamento'];
$entrada = $_POST['entrada'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO ordem (nome, sobrenome, telefone1, telefone2, email, endereco, equipamento, entrada, descricao) 
        VALUES ('$nome', '$sobrenome', '$tel1', '$tel2', '$email', '$endereco', '$equipamento', '$entrada', '$descricao')";

if(!$sql){
    echo("Erro durante a inserção!");
}else{
    echo("Ordem salva com sucesso!");
}

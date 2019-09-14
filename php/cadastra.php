<?php

include_once("conecta.php");

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$tel1 = $_POST['telefone1'];
$tel2 = $_POST['telefone2'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$equipamento = $_POST['equipamento'];
$entrada = $_POST['entrada'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO ordem (Nome, Sobrenome, Tel1, Tel2, Email, Endereco, Equipamento, Entrada, Descricao) VALUES ('$nome', '$sobrenome', '$tel1', '$tel2', '$email', '$endereco', '$equipamento', '$entrada', '$descricao')";
$salvar = mysqli_query($conecta, $sql);

mysqli_close($conecta);

?>
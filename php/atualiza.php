<?php

include_once("conecta.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$tel1 = $_POST['telefone1'];
$tel2 = $_POST['telefone2'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$equipamento = $_POST['equipamento'];
$entrada = $_POST['entrada'];
$situacao = $_POST['status'];
$valor = $_POST['valor'];
$saida = $_POST['saida'];
$descricao = $_POST['descricao'];

$sql = "UPDATE ordem SET Nome = '$nome', Sobrenome = '$sobrenome', Tel1 = '$tel1', Tel2 = '$tel2', Email = '$email', Endereco = '$endereco', Equipamento = '$equipamento', Entrada = '$entrada', Situacao = '$situacao', Saida = '$saida', Valor = '$valor', Descricao = '$descricao' WHERE ID = '$id'";
$salvar = mysqli_query($conecta, $sql);

mysqli_close($conecta);

header("Location: ../html/principal.html");

?>
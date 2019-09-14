<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "projetocontrole";
$conecta = mysqli_connect($hostname,$user,$password,$database);

if(!$conecta){
    print "falha na conexão";
}

?>
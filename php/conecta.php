<?php
$conexao = mysql_connection(localhost, "root", "");
$db = mysql_selec_db("projetocontrole", $conexao);

if(!$conexao){
    die("Conexão Indisponivel" . mysql_error());
}

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_result=utf8');

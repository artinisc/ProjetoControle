<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "projetocontrole";

$conexao = mysql_connect($severname, $username, $password, $dbname);

$requestData = $_REQUEST;

$columns = array(
    array( '0' => 'ID' ),
    array( '1' => 'Nome' ),
    array( '2' => 'Equipamento' ),
    array( '3' => 'Entrada' ),
    array( '4' => 'Situacao' )
);

$result_ordems = "SELECT ID, Nome, Equipamento, Entrada, Situacao FROM ordem";
$resultado_ordems = mysql_query($conexao, $result_ordems);
$qnt_linhas = mysql_num_rows($resultado_ordems);

$result_ordems = "SELECT ID, Nome, Equipamento, Entrada, Situacao FROM ordem WHERE 1=1";
if( !empty($requestData['search']['value'])){
    $resultado_usuarios.=" AND (ID LIKE '".$requestData['search']['value']."%' ";
    $resultado_usuarios.=" OR Nome LIKE '".$requestData['search']['value']."%' ";
    $resultado_usuarios.=" OR Equipamento LIKE '".$requestData['search']['value']."%' ";
    $resultado_usuarios.=" OR Entrada LIKE '".$requestData['search']['value']."%' ";
    $resultado_usuarios.=" OR Situacao LIKE '".$requestData['search']['value']."%' )";
}

$resultado_ordems = mysql_query($conexao, $result_ordems);
$totalFiltered = mysql_num_rows($resultado_ordems);

$result_ordems.="ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order']
                [0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_ordems=mysql_query($onexao, $result_ordems);

$dados = array();
while( $row_ordem = mysql_fetch_array($resultado_usuarios)){
    $dado = array();
    $dado[] = $row_ordem["ID"];
    $dado[] = $row_ordem["Nome"];
    $dado[] = $row_ordem["Equipamento"];
    $dado[] = $row_ordem["Entrada"];
    $dado[] = $row_ordem["Situacao"];

    $dados[] = $dado;
}

$json_data = array(
    "draw" => intval($requestData['draw']),
    "recordsTotal": => intval( $qnt_linhas),
    "recordsFiltered": => intval($totalFiltered);
    "data" => $dados

);

echo json_encode($json_data);
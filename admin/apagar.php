<?php
include_once "conexao.php";

$ID_parceiro = filter_input(INPUT_GET, "ID_parceiro", FILTER_SANITIZE_NUMBER_INT);

if (!empty($ID_parceiro)) {

    $query_parceiro = "DELETE FROM parceiro WHERE ID_parceiro=:ID_parceiro";
    $result_parceiro = $conn->prepare($query_parceiro);
    $result_parceiro->bindParam(':ID_parceiro', $ID_parceiro);

    if($result_parceiro->execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Empresa Parceira apagada com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Empresa não apagada com sucesso!</div>"];
    }

} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma empresa encontrada!</div>"];
}

echo json_encode($retorna);
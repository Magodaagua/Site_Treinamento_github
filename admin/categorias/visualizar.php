<?php
include_once "conexao.php";

$Nome_cat = filter_input(INPUT_GET, "Nome", FILTER_SANITIZE_NUMBER_INT);

if (!empty($Nome_cat)) {

    $query_categoria = "SELECT Nome_cat, imagem FROM categoria WHERE Nome_cat=:Nome_cat LIMIT 1";
    $result_categoria = $conn->prepare($query_categoria);
    $result_categoria->bindParam(':Nome_cat', $Nome_cat);
    $result_categoria->execute();

    $row_categoria = $result_categoria->fetch(PDO::FETCH_ASSOC);

    $retorna = ['erro' => false, 'dados' => $row_categoria];    
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma categoria encontrada!</div>"];
}

echo json_encode($retorna);
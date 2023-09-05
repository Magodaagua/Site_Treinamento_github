<?php
    include_once "conexao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (empty($dados['Nome'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
    } elseif (empty($dados['Descricao'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo descrição!</div>"];
    } elseif (empty($dados['link'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Link!</div>"];
    }else{
        $query_parceiro = "INSERT INTO parceiro (Nome, Descricao, link) VALUES (:Nome, :Descricao, :link)";
        $cad_parceiro = $conn->prepare($query_parceiro);
        $cad_parceiro ->bindParam(':Nome', $dados['Nome']);
        $cad_parceiro ->bindParam(':Descricao', $dados['Descricao']);
        $cad_parceiro ->bindParam(':link', $dados['link']);
        $cad_parceiro ->execute();

        if($cad_parceiro->rowCount()){
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso!</div>"];
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
        }
    }
    echo json_encode($retorna);

?>
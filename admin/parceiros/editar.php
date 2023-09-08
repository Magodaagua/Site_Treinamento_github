<?php
    include_once "conexao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (empty($dados['ID_parceiro'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Erro tente mais tarde!</div>"];
    } elseif (empty($dados['Nome'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
    } elseif (empty($dados['Descricao'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo descrição!</div>"];
    } elseif (empty($dados['link'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Link!</div>"];
    /*} elseif (empty($dados['imagem'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Imagem!</div>"];
    */}else{
        $query_parceiro= "UPDATE parceiro SET Nome=:Nome, Descricao=:Descricao, link=:link WHERE ID_parceiro=:ID_parceiro";
        
        $edit_parceiro = $conn->prepare($query_parceiro);
        $edit_parceiro ->bindParam(':ID_parceiro', $dados['ID_parceiro']);
        $edit_parceiro ->bindParam(':Nome', $dados['Nome']);
        $edit_parceiro ->bindParam(':Descricao', $dados['Descricao']);
        $edit_parceiro ->bindParam(':link', $dados['link']);
        //$edit_parceiro ->bindParam(':imagem', $dados['imagem']);
        $edit_parceiro ->execute();
    
        if($edit_parceiro ->rowCount()){
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Empresa Parceira editada com sucesso!</div>"];
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Empresa Parceira não editada com sucesso!</div>"];
        }
    }
    echo json_encode($retorna);

?>
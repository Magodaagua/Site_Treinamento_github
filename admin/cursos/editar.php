<?php
    include_once "conexao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

   
    if (empty($dados['ID_curso'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Erro tente mais tarde!</div>"];
    } elseif (empty($dados['Nome'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
    } elseif (empty($dados['Categoria'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo categoria!</div>"];
    } elseif (empty($dados['Subcategoria'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo subcategoria!</div>"];
    } elseif (empty($dados['Descricao'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo descrição!</div>"];
    } elseif (empty($dados['Datadecriacao'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo data de criação!</div>"];
    /*} elseif (empty($dados['imagem'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Imagem!</div>"];
    */}else{
        $query_curso = "UPDATE curso SET ID_curso=:ID_curso, Nome=:Nome, Categoria=:Categoria, Subcategoria=:Subcategoria, Descricao=:Descricao, Datadecriacao=:Datadecriacao WHERE ID_curso=:ID_curso";
       
        $edit_curso = $conn->prepare($query_curso);
        $edit_curso ->bindParam(':ID_curso', $dados['ID_curso']);
        $edit_curso ->bindParam(':Nome', $dados['Nome']);
        $edit_curso ->bindParam(':Categoria', $dados['Categoria']);
        $edit_curso ->bindParam(':Subcategoria', $dados['Subcategoria']);
        $edit_curso ->bindParam(':Descricao', $dados['Descricao']);
        $edit_curso ->bindParam(':Datadecriacao', $dados['Datadecriacao']);
        //$cad_parceiro ->bindParam(':imagem', $arquivo['name'], PDO::PARAM_STR);
        $edit_curso ->execute();

        if($edit_curso->rowCount()){
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Curso editado com sucesso!</div>"];
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Curso não editado com sucesso!</div>"];
        }
    }
    echo json_encode($retorna);

?>
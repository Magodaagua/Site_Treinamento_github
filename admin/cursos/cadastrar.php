<?php
    session_start();
    ob_start();
    include_once "conexao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (empty($dados['Nome'])) {
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
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo imagem!</div>"];
    */}else{
        $query_curso = "INSERT INTO curso (Nome, Categoria, Subcategoria, Descricao, Datadecriacao) VALUES (:Nome, :Categoria, :Subcategoria, :Descricao, :Datadecriacao)";
        $cad_curso = $conn->prepare($query_curso);
        $cad_curso ->bindParam(':Nome', $dados['Nome']);
        $cad_curso ->bindParam(':Categoria', $dados['Categoria']);
        $cad_curso ->bindParam(':Subcategoria', $dados['Subcategoria']);
        $cad_curso ->bindParam(':Descricao', $dados['Descricao']);
        $cad_curso ->bindParam(':Datadecriacao', $dados['Datadecriacao']);
        //$cad_parceiro ->bindParam(':imagem', $arquivo['name'], PDO::PARAM_STR);
        $cad_curso ->execute();

        if($cad_curso->rowCount()){
            /*if((isset($arquivo['name'])) and (!empty($arquivo['name']))){
                $ultimo_id = $conn->lastInsertId();

                $diretorio = "imagens/$ultimo_id/";

                mkdir($diretorio, 0755);

                $nome_arquivo = $arquivo['name'];

                move_uploaded_file($arquivo['tmp_name'], $diretorio . $arquivo['name']);

                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Imagem cadastrada com sucesso</div>"];
            }else{
                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Empresa parceira cadastrada com sucesso!</div>"];
            }*/
            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Curso cadastrado com sucesso!</div>"];
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Curso não cadastrado com sucesso!</div>"];
        }
    }
    echo json_encode($retorna);

?>
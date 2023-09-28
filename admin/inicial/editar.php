<?php
    include_once "conexao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $arquivo = $_FILES['imagem1'];
    $arquivo2 = $_FILES['imagem2'];
    $arquivo3 = $_FILES['imagem3'];

   
    if (empty($dados['ID_menu'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Erro tente mais tarde!</div>"];
    } elseif (empty($dados['texto1'])) {
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
        $query_curso = "UPDATE curso SET ID_curso=:ID_curso, Nome=:Nome, Categoria=:Categoria, Subcategoria=:Subcategoria, Descricao=:Descricao, Datadecriacao=:Datadecriacao, imagem=:imagem, pdf=:pdf, video=:video, prova=:prova WHERE ID_curso=:ID_curso";

        $edit_curso = $conn->prepare($query_curso);
        $edit_curso ->bindParam(':ID_curso', $dados['ID_curso']);
        $edit_curso ->bindParam(':Nome', $dados['Nome']);
        $edit_curso ->bindParam(':Categoria', $dados['Categoria']);
        $edit_curso ->bindParam(':Subcategoria', $dados['Subcategoria']);
        $edit_curso ->bindParam(':Descricao', $dados['Descricao']);
        $edit_curso ->bindParam(':Datadecriacao', $dados['Datadecriacao']);
        $edit_curso ->bindParam(':imagem', $arquivo['name'], PDO::PARAM_STR);
        $edit_curso ->bindParam(':pdf', $arquivo2['name'], PDO::PARAM_STR);
        $edit_curso ->bindParam(':video', $arquivo3['name'], PDO::PARAM_STR);
        $edit_curso ->bindParam(':prova', $dados['prova']);
        $edit_curso ->execute();

        if($edit_curso->rowCount()){

            $id = $dados['ID_curso'];
            $diretorio = "../imagem/$id/";
            $diretorio2 = "../pdf/$id/";
            $diretorio3 = "../video/$id/";

            if((!file_exists($diretorio))){
                mkdir($diretorio, 0755);
            }

            if((!file_exists($diretorio2))){
                mkdir($diretorio2, 0755);
            }

            if((!file_exists($diretorio3))){
                mkdir($diretorio3, 0755);
            }

            $nome_arquivo = $arquivo['name'];
            $nome_arquivo2 = $arquivo2['name'];
            $nome_arquivo3 = $arquivo3['name'];

            //atualiza a imagem
            if(move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo)){

                /*if(((!empty($edit_curso['imagem'])))){
                    $endereco_imagem = "../imagem/$ID_curso/". $row_usuario['']
                }
                $endereco_imagem = "../imagem/$id/". $nome_arquivo;
                if(file_exists($endereco_imagem)){
                    unlink($endereco_imagem);
                }*/

                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Foto editada com sucesso!</div>"];
            } else {
                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Foto não editada com sucesso!</div>"];
            }

            //atualiza o pdf
            if(move_uploaded_file($arquivo2['tmp_name'], $diretorio2 . $nome_arquivo2)){

                /*if(((!empty($edit_curso['imagem'])))){
                    $endereco_imagem = "../imagem/$ID_curso/". $row_usuario['']
                }
                $endereco_imagem = "../imagem/$id/". $nome_arquivo;
                if(file_exists($endereco_imagem)){
                    unlink($endereco_imagem);
                }*/

                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>PDF editada com sucesso!</div>"];
            } else {
                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: PDF não editada com sucesso!</div>"];
            }

            //atualiza o video
            if(move_uploaded_file($arquivo3['tmp_name'], $diretorio3 . $nome_arquivo3)){

                /*if(((!empty($edit_curso['imagem'])))){
                    $endereco_imagem = "../imagem/$ID_curso/". $row_usuario['']
                }
                $endereco_imagem = "../imagem/$id/". $nome_arquivo;
                if(file_exists($endereco_imagem)){
                    unlink($endereco_imagem);
                }*/

                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Video editada com sucesso!</div>"];
            } else {
                $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Video não editada com sucesso!</div>"];
            }


            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Curso editado com sucesso!</div>"];
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Curso não editado com sucesso!</div>"];
        }
    }
    echo json_encode($retorna);

?>
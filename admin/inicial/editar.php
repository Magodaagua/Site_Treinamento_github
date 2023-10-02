<?php
    include_once "conexao.php";

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $arquivo = $_FILES['imagem1'];
    $arquivo2 = $_FILES['imagem2'];
    $arquivo3 = $_FILES['imagem3'];
    $arquivo4 = $_FILES['carrosel1'];
    $arquivo5 = $_FILES['carrosel2'];
    $arquivo6 = $_FILES['carrosel3'];
   
    if (empty($dados['ID_menu'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Erro tente mais tarde!</div>"];
    } elseif (empty($dados['texto1'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
    } elseif (empty($dados['texto2'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo categoria!</div>"];
    } elseif (empty($dados['texto3'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo subcategoria!</div>"];
    } elseif (empty($dados['titulo1'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo descrição!</div>"];
    } elseif (empty($dados['titulo2'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo data de criação!</div>"];
    } elseif (empty($dados['titulo3'])) {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo data de criação!</div>"];
    }else{
        $query_menu = "UPDATE menu SET ID_menu=:ID_menu, texto1=:texto1, texto2=:texto2, texto3=:texto3, titulo1=:titulo1, titulo2=:titulo2, titulo3=:titulo3, imagem1=:imagem1, imagem2=:imagem2, imagem3=:imagem3, carosel1=:carosel1, carosel2=:carosel2, carosel3=:carosel3 WHERE ID_menu=:ID_menu";

        $edit_menu = $conn->prepare($query_menu);
        $edit_menu ->bindParam(':ID_menu', $dados['ID_menu']);
        $edit_menu ->bindParam(':texto1', $dados['texto1']);
        $edit_menu ->bindParam(':texto2', $dados['texto2']);
        $edit_menu ->bindParam(':texto3', $dados['texto3']);
        $edit_menu ->bindParam(':titulo1', $dados['titulo1']);
        $edit_menu ->bindParam(':titulo2', $dados['titulo2']);
        $edit_menu ->bindParam(':titulo3', $dados['titulo3']);
        $edit_menu ->bindParam(':imagem1', $arquivo['name'], PDO::PARAM_STR);
        $edit_menu ->bindParam(':imagem2', $arquivo2['name'], PDO::PARAM_STR);
        $edit_menu ->bindParam(':imagem3', $arquivo3['name'], PDO::PARAM_STR);
        $edit_menu ->bindParam(':carrosel1', $arquivo4['name'], PDO::PARAM_STR);
        $edit_menu ->bindParam(':carrosel2', $arquivo5['name'], PDO::PARAM_STR);
        $edit_menu ->bindParam(':carrosel3', $arquivo6['name'], PDO::PARAM_STR);
        $edit_menu ->execute();

        if($edit_menu->rowCount()){

            $diretorio = "../logo/menu";

            if((!file_exists($diretorio))){
                mkdir($diretorio, 0755);
            }

            $nome_arquivo = $arquivo['name'];
            $nome_arquivo2 = $arquivo2['name'];
            $nome_arquivo3 = $arquivo3['name'];
            $nome_arquivo4 = $arquivo4['name'];
            $nome_arquivo5 = $arquivo5['name'];
            $nome_arquivo6 = $arquivo6['name'];

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

            //atualiza a imagem
            if(move_uploaded_file($arquivo2['tmp_name'], $diretorio . $nome_arquivo2)){

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

            //atualiza a imagem
            if(move_uploaded_file($arquivo3['tmp_name'], $diretorio . $nome_arquivo3)){

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

            //atualiza a imagem
            if(move_uploaded_file($arquivo4['tmp_name'], $diretorio . $nome_arquivo4)){

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

            //atualiza a imagem
            if(move_uploaded_file($arquivo5['tmp_name'], $diretorio . $nome_arquivo5)){

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

            //atualiza a imagem
            if(move_uploaded_file($arquivo6['tmp_name'], $diretorio . $nome_arquivo6)){

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


            $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Curso editado com sucesso!</div>"];
        } else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Curso não editado com sucesso!</div>"];
        }
    }
    echo json_encode($retorna);

?>
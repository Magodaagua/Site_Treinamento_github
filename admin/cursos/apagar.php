<?php
include_once "conexao.php";

$ID_curso = filter_input(INPUT_GET, "ID_curso", FILTER_SANITIZE_NUMBER_INT);

if (!empty($ID_curso)) {

    $query_curso = "DELETE FROM curso WHERE ID_curso=:ID_curso";
    $result_curso = $conn->prepare($query_curso);
    $result_curso->bindParam(':ID_curso', $ID_curso);

    if($result_curso->execute()){

        //$imagem = $ID_curso["imagem"];
        //$row_curso = $resulta_curso->fetch(PDO::FETCH_ASSOC);
        //extract($row_curso);

        //if(!empty($imagem)){

           // $caminho = "../imagem/$ID_curso/$imagem";

            /* Apagar a imagem
            if(file_exists($caminho)){
                unlink($caminho);
            }*/

            // Apagar o diretorio
            //if(file_exists($diretorio)){
                //unlink($diretorio);
            //}
            
            //$retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Imagem apagada com sucesso!</div>"];
        /*} else {
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Imagem não apagada com sucesso!</div>"];
        }*/

        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Curso apagado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Curso não apagado com sucesso!</div>"];
    }

} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhuma curso encontrado!</div>"];
}

echo json_encode($retorna);
<?php
    include_once "conexao.php";

    $pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($pagina)){
        //Calcular o inicio visualização
        $qnt_result_pg = 10;
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

        $query_curso = "SELECT ID_curso, Nome, Categoria, Subcategoria, Descricao, Datadecriacao, imagem FROM curso ORDER BY ID_curso DESC LIMIT $inicio, $qnt_result_pg ";
        $result_curso = $conn->prepare($query_curso);
        $result_curso->execute();

        $dados = "<div class='table-responsive'>
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th>ID do Curso</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Subcategoria</th>
                                <th>Descricao</th>
                                <th>Datadecriacao</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

        while($row_curso = $result_curso->fetch(PDO::FETCH_ASSOC)){
            extract($row_curso);
            $dados .= "<tr>
                            <td>$ID_curso</td>
                            <td>$Nome</td>
                            <td>$Categoria</td>
                            <td>$Subcategoria</td>
                            <td>$Descricao</td>
                            <td>$Datadecriacao</td>
                            <td>
                                <button id='$ID_curso' class='btn btn-outline-primary btn-sm' onclick='visInterno($ID_curso)'>Visualizar</button>
                                <button id='$ID_curso' class='btn btn-outline-warning btn-sm' onclick='editInternoDados($ID_curso)'>Editar</button>
                                <button id='$ID_curso' class='btn btn-outline-danger btn-sm' onclick='apagarInternoDados($ID_curso)'>Apagar</button>
                            </td>
                        </tr>";
        }

        $dados .= "         </tbody>
                        </table>
                    </div>";

        //Paginação - Somar a quantidade de usuários
        $query_pg = "SELECT COUNT(ID_curso) AS num_result FROM curso";
        $result_pg = $conn->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        $max_links = 2;

        $dados .="<nav aria-label='Page navigation example'> <ul class='pagination pagination-sm justify-content-center'>";
        $dados .="<li class='page-item'><a class='page-link'onClick='listarInterno(1)' href='#'>Previous</a></li>";
        
        for($pag_ant = $pagina -$max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                $dados .= "<li class='page-item'><a class='page-link' onclick='listarInterno($pag_ant)' href='#'>$pag_ant</a></li>";
            }
        }

        $dados .="<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                $dados .="<li class='page-item'><a class='page-link' href='#' onclick='listarInterno($pag_dep)'>$pag_dep</a></li>";
            }
        }
        
        
        $dados .="<li class='page-item'><a class='page-link' href='#' onClick='listarInterno($quantidade_pg)'>Última</a></li>";
        $dados .='</ul></nav>'; 

        echo $dados;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Nenhuma empresa parceira encontrada!</div>";
    }

?>
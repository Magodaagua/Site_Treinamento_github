<?php
    include_once "conexao.php";

    $pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($pagina)){

        //Calcular o inicio visualização
        $qnt_result_pg = 10;
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

        $query_usuarios = "SELECT ID_usuario, Nome, CPF, RG, Cargo, email, senha FROM usuario ORDER BY ID_usuario DESC LIMIT $inicio, $qnt_result_pg ";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        $dados = "<div class='table-responsive'>
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th>ID do Usuário</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>RG</th>
                                <th>Cargo</th>
                                <th>Email</th>
                                <th>Senha</th>
                            </tr>
                        </thead>
                        <tbody>";

        while($row_usuarios = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            extract($row_usuarios);
            $dados .= "<tr>
                            <td>$ID_usuario</td>
                            <td>$Nome</td>
                            <td>$CPF</td>
                            <td>$RG</td>
                            <td>$Cargo</td>
                            <td>$email</td>
                            <td>$senha</td>
                        </tr>";
        }

        $dados .= "         </tbody>
                        </table>
                    </div>";

        //Paginação - Somar a quantidade de usuários
        $query_pg = "SELECT COUNT(ID_usuario) AS num_result FROM usuario";
        $result_pg = $conn->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        $max_links = 2;

        $dados .="<nav aria-label='Page navigation example'> <ul class='pagination pagination-sm justify-content-center'>";
        $dados .="<li class='page-item'><a class='page-link'onClick='listarUsuarios(1)' href='#'>Previous</a></li>";
        
        for($pag_ant = $pagina -$max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                $dados .= "<li class='page-item'><a class='page-link' onclick='listarUsuarios($pag_ant)' href='#'>$pag_ant</a></li>";
            }
        }

        $dados .="<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                $dados .="<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_dep)'>$pag_dep</a></li>";
            }
        }
        
        
        $dados .="<li class='page-item'><a class='page-link' href='#' onClick='listarUsuarios($quantidade_pg)'>Última</a></li>";
        $dados .='</ul></nav>'; 

        echo $dados;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Nenhuma empresa parceira encontrada!</div>";
    }

?>
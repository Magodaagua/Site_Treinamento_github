<?php
    include_once "conexao.php";

    $pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($pagina)){
        //Calcular o inicio visualização
        $qnt_result_pg = 10;
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

        $query_admin = "SELECT ID_admin, email, senha FROM administrador ORDER BY ID_admin DESC LIMIT $inicio, $qnt_result_pg ";
        $result_admin = $conn->prepare($query_admin);
        $result_admin->execute();

        $dados = "<div class='table-responsive'>
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>email</th>
                                <th>senha</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>";

        while($row_admin = $result_admin->fetch(PDO::FETCH_ASSOC)){
            extract($row_admin);
            /*if ((!empty($imagem))) {
                $img = "<center><img src='../logo/$id/$imagem' width='100'></center> <br>";
                $img2 = "<center><button class='btn btn-outline-primary btn-sm'><a href='../logo/$id/$imagem' download>Download</a></button></center><br>";
            } else {
                $img = "";
                $img2 = "";
            }*/
            $dados .= "<tr>
                            <td>$id</td>
                            <td>$Nome_cat</td>
                            <td>
                                <button id='$id' class='btn btn-outline-primary btn-sm' onclick='visCategoria($id)'>Visualizar</button>
                                <button id='$id' class='btn btn-outline-warning btn-sm' onclick='editCategoriaDados($id)'>Editar</button>
                                <button id='$id' class='btn btn-outline-danger btn-sm' onclick='apagarCategoriaDados($id)'>Apagar</button>
                            </td>
                        </tr>";
        }

        $dados .= "         </tbody>
                        </table>
                    </div>";

        //Paginação - Somar a quantidade de usuários
        $query_pg = "SELECT COUNT(ID_admin) AS num_result FROM administrador";
        $result_pg = $conn->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        $max_links = 2;

        $dados .="<nav aria-label='Page navigation example'> <ul class='pagination pagination-sm justify-content-center'>";
        $dados .="<li class='page-item'><a class='page-link'onClick='listarCategoria(1)' href='#'>Previous</a></li>";
        
        for($pag_ant = $pagina -$max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                $dados .= "<li class='page-item'><a class='page-link' onclick='listarCategoria($pag_ant)' href='#'>$pag_ant</a></li>";
            }
        }

        $dados .="<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                $dados .="<li class='page-item'><a class='page-link' href='#' onclick='listarCategoria($pag_dep)'>$pag_dep</a></li>";
            }
        }
        
        
        $dados .="<li class='page-item'><a class='page-link' href='#' onClick='listarCategoria($quantidade_pg)'>Última</a></li>";
        $dados .='</ul></nav>'; 

        echo $dados;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Nenhuma empresa parceira encontrada!</div>";
    }

?>
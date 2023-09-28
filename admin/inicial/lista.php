<?php
    include_once "conexao.php";

    $pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($pagina)){
        //Calcular o inicio visualização
        $qnt_result_pg = 10;
        $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

        $query_menu = "SELECT ID_menu, texto1, texto2, texto3, titulo1, titulo2, titulo3 FROM menu ORDER BY ID_menu DESC LIMIT $inicio, $qnt_result_pg ";
        $result_menu = $conn->prepare($query_menu);
        $result_menu->execute();

        $dados = "<div class='table-responsive'>
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th>ID_menu</th>
                                <th>Texto 1</th>
                                <th>Texto 2</th>
                                <th>Texto 3</th>
                                <th>Titulo 1</th>
                                <th>Titulo 2</th>
                                <th>Titulo 3</th>
                                <th>Imagem 1</th>
                                <th>Imagem 2</th>
                                <th>Imagem 3</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

        while($row_menu = $result_menu->fetch(PDO::FETCH_ASSOC)){
            extract($row_menu);
            //$data = date('d/m/Y', strtotime($Datadecriacao));

            //colocar imagem na tela do admin
            if ((!empty($imagem))) {
                $img = "<img src='../imagem/$ID_curso/$imagem' width='150'> <br>";
                $img2 = "<center><button class='btn btn-outline-primary btn-sm'><a href='../imagem/$ID_curso/$imagem' download>Download</a></button></center><br>";
            } else {
                $img = "";
                $img2 = "";
            }

            //colocar pdf na tela do admin
            if ((!empty($pdf))) {
                $pdf1 = "<img src='../pdf/arquivo.png' width='150'> <br>";
                $pdf2 = "<center><button class='btn btn-outline-primary btn-sm'><a href='../pdf/$ID_curso/$pdf' download>Download</a></button></center><br>";
            } else {
                $pdf1 = "";
                $pdf2 = "";
            }

            //colocar video na tela do admin
            if ((!empty($video))) {
                $vid = "<img src='../video/play.png' width='150'> <br>";
                $vid2 = "<center><button class='btn btn-outline-primary btn-sm'><a href='../video/$ID_curso/$video' download>Download</a></button></center><br>";
            } else {
                $vid = "";
                $vid2 = "";
            }
            
            $dados .= "<tr>
                            <td>$ID_menu</td>
                            <td>$texto1</td>
                            <td>$texto2</td>
                            <td>$texto3</td>
                            <td>$titulo1</td>
                            <td>$titulo2</td>
                            <td>$titulo3</td>
                            <td>
                                $img <br> $img2
                            </td>
                            <td>
                                $vid <br> $vid2  
                            </td>
                            <td>
                                $pdf1 <br> $pdf2
                            </td>
                            <td>
                                <button id='$ID_menu' class='btn btn-outline-primary btn-sm' onclick='visMenu($ID_menu)'>Visualizar</button>
                                <button id='$ID_menu' class='btn btn-outline-warning btn-sm' onclick='editMenuDados($ID_menu)'>Editar</button>
                            </td>
                        </tr>";
        }

        $dados .= "         </tbody>
                        </table>
                    </div>";

        //Paginação - Somar a quantidade de usuários
        $query_pg = "SELECT COUNT(ID_menu) AS num_result FROM menu";
        $result_pg = $conn->prepare($query_pg);
        $result_pg->execute();
        $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        $max_links = 2;

        $dados .="<nav aria-label='Page navigation example'> <ul class='pagination pagination-sm justify-content-center'>";
        $dados .="<li class='page-item'><a class='page-link'onClick='listarMenu(1)' href='#'>Previous</a></li>";
        
        for($pag_ant = $pagina -$max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                $dados .= "<li class='page-item'><a class='page-link' onclick='listarMenu($pag_ant)' href='#'>$pag_ant</a></li>";
            }
        }

        $dados .="<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                $dados .="<li class='page-item'><a class='page-link' href='#' onclick='listarMenu($pag_dep)'>$pag_dep</a></li>";
            }
        }
        
        
        $dados .="<li class='page-item'><a class='page-link' href='#' onClick='listarMenu($quantidade_pg)'>Última</a></li>";
        $dados .='</ul></nav>'; 

        echo $dados;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Nenhuma empresa parceira encontrada!</div>";
    }

?>
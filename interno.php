<!doctype html>
<html lang="pt-br">
    <!-- Conexão com o banco de dados -->
	<?php
        include_once("conexao.php");
        $result_usuario = "SELECT * FROM usuario WHERE email = '$email' ";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
            $row_usuario['ID_usuario']."<br>";		
            $row_usuario['senha']."<br>";

        //Selecionar todos os cursos da tabela
        $result_categoria = "SELECT * FROM categoria";
        $resultado_categoria = mysqli_query($conn, $result_categoria);

        //Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

        $categoria = $_GET['Nome_cat'];

        //$categoria = $conn->real_escape_string($_GET['Nome_cat']); // Sanitize the input

        // Contar o total de cursos na categoria
        $result_contagem = "SELECT COUNT(*) AS total FROM categoria WHERE Nome_cat = '$categoria'";
        $contagem_resultado = mysqli_query($conn, $result_contagem);
        $contagem = mysqli_fetch_assoc($contagem_resultado);
        $total_cursos = $contagem['total'];

        //Contar o total de cursos
        //$total_cursos = mysqli_num_rows($resultado_categoria);

        //Seta a quantidade de cursos por pagina
        $quantidade_pg = 9;

        //calcular o número de pagina necessárias para apresentar os cursos
        $num_pagina = ceil($total_cursos/$quantidade_pg);

        //Calcular o inicio da visualizacao
        $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

        //Selecionar os cursos a serem apresentado na página
        $result_categoria = "SELECT * FROM categoria WHERE Nome_cat = '$categoria' OR tipo = 'Pública' limit $inicio, $quantidade_pg";
        $resultado_categoria = mysqli_query($conn, $result_categoria);
        $total_cursos = mysqli_num_rows($resultado_categoria);

	?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Site de Treinamento - interno</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/carousel/">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--coloca o icone na aba da tela-->
        <link rel="icon" type="png" href="img/logo_copi.png">

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        .page-item.active {
            background-color: #007bff; /* Cor azul de destaque */
            color: #fff; /* Cor do texto em destaque */
        }

        </style>
        <!-- Custom styles for this template -->
        <link href="css/carousel.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #483D8B">
                <img class="navbar-brand" src="img/logo_copi.png" width="50px" height="60px"></img>
                <a class="navbar-brand" href="menu.php">COPIMAQ</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="interno.php?Nome_cat=<?php echo $row_usuario['Cargo']?>">Treinamentos Internos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="provas_externas.php">Treinamentos Externos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#sairModal">Sair da conta</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="navbar-brand" href="pagina_usuario.php?id=<?php echo $row_usuario['ID_usuario']; }?>"> <center>
                    <img src="img/usuario.png" width="40px" height="40px"> <br> </center>
                    Minha conta
                    </a>
                </form>
                </div>
            </nav>
            <!-- Modal para sair -->
            <div class="modal fade" id="sairModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo sair de sua conta?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar na conta</button>
                                <a class="btn btn-primary" href="logout.php"> Sair da conta </a>
                        </div>
                    </div>
                </div>
            </div> 
            <!--fim modal para sair-->
        </header>
        <main role="main">
        <br><br><br><br>
            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->
            <div class="container">
                <h1> <center>Treinamento Interno </center></h1>
            </div>
            <br><br><br><br>
            <div class="container marketing">
                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <?php while($rows_categoria = mysqli_fetch_assoc($resultado_categoria)){?>
                    <div class="col-lg-4">
                    <img src="admin/logo/<?php echo $rows_categoria['id'];?>/<?php echo $rows_categoria['imagem'];?>" class="bd-placeholder-img rounded-square" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <h2><?php echo $rows_categoria['Nome_cat'];?></h2>
                        <p><a class="btn btn-primary" href="curso.php?Nome_cat=<?php echo $rows_categoria['Nome_cat'];?>">Clique para ver o site &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <?php }?>    
                </div><!-- /.row -->
                <?php
                            //Verificar a pagina anterior e posterior
                            $pagina_anterior = $pagina - 1;
                            $pagina_posterior = $pagina + 1;
                        ?>
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <?php
                                    if($pagina_anterior != 0){ ?>
                                        <a class="page-link" href="interno.php?pagina=<?php echo $pagina_anterior; ?>&Nome_cat=<?php echo $categoria;?>" aria-label="Previous">
                                            <!--<span aria-hidden="true">&laquo;</span>--> Previous
                                        </a>
                                    <?php }else{ ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="interno.php?pagina=<?php echo $pagina_posterior; ?>&Nome_cat=<?php echo $categoria;?>" aria-label="Next">
                                                <!--<span aria-hidden="true">&raquo;</span>--> Previous
                                            </a>
                                        </li>
                                <?php }  ?>
                                </li>
                                <?php 
                                //Apresentar a paginacao
                                //for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                                    <!--<li class="page-item active">
                                        <a class="page-link" href="interno.php?pagina=<?php //echo $i; ?>/<?php //echo $rows_categoria['Nome_cat'];?>"><?php //echo $i; ?></a>
                                    </li>-->

                                <?php for ($i = 1; $i <= $num_pagina; $i++) : ?>
                                <li class="page-item <?php echo ($i == $pagina) ? 'active' : ''; ?>">
                                    <a class="page-link" href="interno.php?pagina=<?php echo $i; ?>&Nome_cat=<?php echo $categoria;?>"><?php echo $i; ?></a>
                                </li>
                                <?php endfor; ?>

                                <?php //} ?>
                                <li class="page-item">
                                    <?php
                                    if($pagina_posterior <= $num_pagina){ ?>
                                        <a class="page-link" href="interno.php?pagina=<?php echo $pagina_posterior; ?>&Nome_cat=<?php echo $categoria;?>" aria-label="Next">
                                            <!--<span aria-hidden="true">&raquo;</span>--> Next
                                        </a>
                                    <?php }else{ ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="interno.php?pagina=<?php echo $pagina_posterior; ?>&Nome_cat=<?php echo $categoria;?>" aria-label="Next">
                                                <!--<span aria-hidden="true">&raquo;</span>--> Next
                                            </a>
                                        </li>
                                <?php }  ?>
                                </li>
                            </ul>
                        </nav>
            </div>
            <!--inicio Botão de voltar ao topo-->
            <?php 
                require("Botaodevoltaraotopo.php");
            ?>
            <!--Fim Botão de voltar ao topo-->
            <!-- FOOTER -->
            <?php
                require("footer.php"); 
	        ?>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="javascript/jquery.slim.min.js"><\/script>')</script><script src="javascript/bootstrap.bundle.min.js"></script>  
    </body>
</html>
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

        //Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

        //Selecionar todos os cursos da tabela
        $result_curso = "SELECT * FROM parceiro";
        $resultado_curso = mysqli_query($conn, $result_curso);

        //Contar o total de cursos
        $total_cursos = mysqli_num_rows($resultado_curso);

        //Seta a quantidade de cursos por pagina
        $quantidade_pg = 10;

        //calcular o número de pagina necessárias para apresentar os cursos
        $num_pagina = ceil($total_cursos/$quantidade_pg);

        //Calcular o inicio da visualizacao
        $incio = ($quantidade_pg*$pagina)-$quantidade_pg;

        //Selecionar os cursos a serem apresentado na página
        $result_parceiro = "SELECT * FROM parceiro limit $incio, $quantidade_pg";
        $resultado_parceiro = mysqli_query($conn, $result_parceiro);
        $total_parceiros = mysqli_num_rows($resultado_parceiro);
	?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Site de Treinamento - externo</title>

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
        </style>
        <!-- Custom styles for this template -->
        <link href="css/carousel.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
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
                            <li class="nav-item">
                                <a class="nav-link" href="interno.php">Treinamentos Internos</a>
                            </li>
                            <li class="nav-item active">
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
            <br><br><br>
            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->
            <div class="container marketing">
                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <?php while($rows_parceiro = mysqli_fetch_assoc($resultado_parceiro)){?>
                    <div class="col-lg-4">
                        <img src="img/<?php echo $rows_parceiro['ID_parceiro'];?>.png" class="bd-placeholder-img rounded-square" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <h2><?php echo $rows_parceiro['Nome'];?></h2>
                        <p><?php echo $rows_parceiro['Descricao'];?></p>
                        <p><a class="btn btn-secondary" href="<?php echo $rows_parceiro['link'];?>">Clique para ver o site &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <?php }?>    
                </div><!-- /.row -->
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
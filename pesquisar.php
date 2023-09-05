<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
<?php 
    include_once("conexao.php");
    $result_usuario = "SELECT * FROM usuario WHERE email = '$email' ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
        $row_usuario['ID_usuario']."<br>";		
        $row_usuario['senha']."<br>";
    //Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
    if(!isset($_GET['pesquisar'])){
        header("Location: index.php");
    }else{
        $valor_pesquisar = $_GET['pesquisar'];
    }

    //Selecionar todos os cursos da tabela
    $result_curso = "SELECT * FROM curso WHERE Nome LIKE '%$valor_pesquisar%'";
    $resultado_curso = mysqli_query($conn, $result_curso);

    //Contar o total de cursos
    $total_cursos = mysqli_num_rows($resultado_curso);

    //Seta a quantidade de cursos por pagina
    $quantidade_pg = 6;

    //calcular o número de pagina necessárias para apresentar os cursos
    $num_pagina = ceil($total_cursos/$quantidade_pg);

    //Calcular o inicio da visualizacao
    $incio = ($quantidade_pg*$pagina)-$quantidade_pg;

    //Selecionar os cursos a serem apresentado na página
    $result_cursos = "SELECT * FROM curso WHERE Nome LIKE '%$valor_pesquisar%' limit $incio, $quantidade_pg";
    $resultado_cursos = mysqli_query($conn, $result_cursos);
    $total_cursos = mysqli_num_rows($resultado_cursos);
?>
<!doctype html>
<html lang="pt-br">
    <!-- Conexão com o banco de dados -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Site de Treinamento - informatica</title>
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
        <link href="css/informatica.css" rel="stylesheet">
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
                        <li class="nav-item active">
                            <a class="nav-link" href="interno.php">Treinamentos Internos</a>
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
            <div class="container">
                <h1> <center>Treinamento de informática</center></h1>
            </div>
            <br><br><br><br>
            <div class="container theme-showcase" role="main">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <h1>Cursos</h1>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <form class="form-inline" method="GET" action="pesquisar.php">
                                <div class="form-group">
                                    <label for="exampleInputName2">Pesquisar:   </label>
                                    <input type="text" name="pesquisar" class="form-control" id="exampleInputName2" placeholder="Digitar...">
                                </div>
                                <button type="submit" class="btn btn-primary">Pesquisar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="album py-5 bg-light">
                    <div class="container">
			            <div class="row">
                            <?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)) { ?>
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img src="logo/<?php echo $rows_cursos['ID_curso']; ?>.png" width="100%" height="225">
                                    <div class="card-body">
                                        <a href="detalhes.php?ID_curso=<?php echo $rows_cursos['ID_curso']; ?>"><p class="card-text"><?php echo $rows_cursos['Nome']; ?></p></a>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="detalhes.php?ID_curso=<?php echo $rows_cursos['ID_curso']; ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Começar</button> </a>
                                                <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                                            </div>
                                            <small class="text-muted">Data de criação <br><?php echo $rows_cursos['Datadecriacao']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php
                            //Verificar a pagina anterior e posterior
                            $pagina_anterior = $pagina - 1;
                            $pagina_posterior = $pagina + 1;
                        ?>
                        <nav class="text-center">
                            <ul class="pagination">
                                <li>
                                    <?php
                                    if($pagina_anterior != 0){ ?>
                                        <a href="pesquisar.php?pagina=<?php echo $pagina_anterior; ?>&pesquisar=<?php echo $valor_pesquisar; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    <?php }else{ ?>
                                        <span aria-hidden="true">&laquo;</span>
                                <?php }  ?>
                                </li>
                                <?php 
                                //Apresentar a paginacao
                                for($i = 1; $i < $num_pagina + 1; $i++){ ?>
                                    <li><a href="pesquisar.php?pagina=<?php echo $i; ?>&pesquisar=<?php echo $valor_pesquisar; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>
                                <li>
                                    <?php
                                    if($pagina_posterior <= $num_pagina){ ?>
                                        <a href="pesquisar.php?pagina=<?php echo $pagina_posterior; ?>&pesquisar=<?php echo $valor_pesquisar; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    <?php }else{ ?>
                                        <span aria-hidden="true">&raquo;</span>
                                <?php }  ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="javascript/bootstrap.min.js"></script>                                
    </body>
</html>
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

        $categoria = $_GET['Nome_cat'];

        //Selecionar todos os cursos da tabela
        $result_curso = "SELECT * FROM curso WHERE Categoria = '$categoria'";
        $resultado_curso = mysqli_query($conn, $result_curso);

        //Contar o total de cursos
        $total_cursos = mysqli_num_rows($resultado_curso);

        //Seta a quantidade de cursos por pagina
        $quantidade_pg = 9;

        //calcular o número de pagina necessárias para apresentar os cursos
        $num_pagina = ceil($total_cursos/$quantidade_pg);

        //Calcular o inicio da visualizacao
        $inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

        //$categoria = $_GET['Nome_cat'];

        //Selecionar os cursos a serem apresentado na página
        $result_cursos = "SELECT ID_curso, Nome, Categoria, Subcategoria, Descricao, Datadecriacao, imagem FROM curso WHERE Categoria = '$categoria' limit $inicio, $quantidade_pg";
        $resultado_cursos = mysqli_query($conn, $result_cursos);
        $total_cursos = mysqli_num_rows($resultado_cursos);

	?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Site de Treinamento - <?php echo $categoria ?></title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/carousel/">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <div class="container">
                <h1> <center>Treinamento de <?php echo $categoria ?></center></h1>
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
                                    <label for="exampleInputName2">Pesquisar:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" name="pesquisar" class="form-control" id="exampleInputName2" placeholder="Digitar...">
                                    <input type="hidden" name="categoria" id="categoria">
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" onclick="preencherCategoria()">Pesquisar</button>
                            </form>
                            <script>
                                function preencherCategoria() {
                                    // Obtemos o valor da categoria (exemplo: "algum_valor")
                                    const categoria = "<?php echo $categoria ?>";  // Substitua pelo valor desejado ou crie a lógica para obtê-lo

                                    // Preenchemos o campo categoria com o valor obtido
                                    document.getElementById('categoria').value = categoria;
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)) { ?>
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img src="admin/imagem/<?php echo $rows_cursos['ID_curso'];?>/<?php echo $rows_cursos['imagem'];?>" width="100%" height="225">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $rows_cursos['Nome']; ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="detalhes.php?ID_curso=<?php echo $rows_cursos['ID_curso']; ?>"><button type="button" class="btn btn-sm btn-outline-primary">Começar</button> </a>
                                                <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                                            </div>
                                            <small class="text-muted">Data de criação <br><?php echo date('d/m/Y', strtotime($rows_cursos['Datadecriacao'])); ?></small>
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
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <?php
                                    if($pagina_anterior != 0){ ?>
                                        <a class="page-link" href="curso.php?Nome_cat=<?php echo $categoria?>&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
                                            <!--<span aria-hidden="true">&laquo;</span>--> Previous
                                        </a>
                                    <?php }else{ ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="curso.php?Nome_cat=<?php echo $categoria?>&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                                                <!--<span aria-hidden="true">&raquo;</span>--> Previous
                                            </a>
                                        </li>
                                <?php }  ?>
                                </li>
                                <?php 
                                //Apresentar a paginacao
                                for($i = 1; $i < $num_pagina+1; $i++){ ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="curso.php?Nome_cat=<?php echo $categoria?>&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php } ?>
                                <li class="page-item">
                                    <?php
                                    if($pagina_posterior <= $num_pagina){ ?>
                                        <a class="page-link" href="curso.php?Nome_cat=<?php echo $categoria?>&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                                            <!--<span aria-hidden="true">&raquo;</span>--> Next
                                        </a>
                                    <?php }else{ ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="curso.php?Nome_cat=<?php echo $categoria?>&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
                                                <!--<span aria-hidden="true">&raquo;</span>--> Next
                                            </a>
                                        </li>
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
		<!--<script src="javascript/bootstrap.min.js"></script>-->
        <script src="javascript/bootstrap.bundle.min.js"></script>                                
    </body>
</html>
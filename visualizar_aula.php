<?php

    // Incluir a conexao com o BD
    include_once "conexao.php";
    $pdo = new PDO('mysql:host=localhost;dbname=testes', 'root', '');

    // Receber o ID da aula
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    //var_dump($id);
    //$id =100;

    // Receber o ID do curso
    //$curso_id = filter_input(INPUT_GET, 'id_curso', FILTER_SANITIZE_NUMBER_INT);

    $result_usuario = "SELECT * FROM usuario WHERE email = '$email' ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
        $row_usuario['ID_usuario']."<br>";		
        $row_usuario['senha']."<br>";
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <script src="javascript/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Site de Treinamento - Detalhes do Curso</title>
        <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/carousel/">-->
        <!-- Bootstrap core CSS -->
        <!--<link href="css/bootstrap5/bootstrap.min.css" rel="stylesheet">-->
        <!--coloca o icone na aba da tela-->
        <link rel="icon" type="png" href="img/logo_copi.png">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/jumbotron/">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/menumob.css"><!--novo botão menu lateral-->
        <title>Site de Treinamento - Aula</title>

        <!--coloca o icone na aba da tela-->
        <link rel="icon" type="png" href="img/logo_copi.png">
        <style>
            .modulo {
                cursor: pointer;
                padding: 10px;
                background-color: gray;
                border: 1px solid #ccc;
                margin: 5px;
                position: relative;
                width: 100%; /* Largura dos módulos */
            }

            .nome-mdu {
                display: inline-block;
                word-break: break-word; /* Adiciona a quebra de palavra */
            }

            .aulas {
                display: none;
                padding: 10px;
                border: 1px solid #ddd;
                margin: 5px;
                margin-top: -6px;
                width: 100%; /* Largura das aulas */
            }

            .seta {
                position: absolute;
                top: 25px;
                right: 15px;
                transition: transform 0.3s;
            }

            .seta.aberta {
                transform: rotate(90deg);
            }

            #menu-lateral {
                position: fixed;
                top: 50px; /* Adicione uma margem superior para evitar cortes */
                right: -300px; /* Ajuste o valor para a largura desejada */
                height: calc(100vh - 20px); /* Deduz a margem superior para manter a altura correta */
                width: 400px; /* Largura desejada */
                background-color: #343a40; /* Cor de fundo desejada */
                color: #fff;
                overflow-y: auto; /* Adiciona uma barra de rolagem vertical */
                transition: right 0.3s; /* Adicione uma transição suave à animação */
            }

            #menu-lateral.show {
                right: 0;
            }

            #button1{
                justify-content: left;
                align: left;
                margin-right: 30px;
            }

            #toggle-menu{
                justify-content: right;
                align: right;
                margin-left: 30px;
            }

            #teste{
                display:inline-block;
                width: 100px;
            }

        </style>

    </head>

    <body>
        <header>
            <!--<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">-->
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
        </header> <br>
        <br><br><br>
        <div class="container my-5">
            <div class="btn-group">
                <input id="button1" type="button" class="btn btn-primary" value="Voltar" onClick="history.go(-1)"> <br>
                <!--<button id="toggle-menu" class="btn btn-primary">Mostrar Menu</button><br>-->
            </div>
            <div class="p-5 text-center bg-body-tertiary rounded-3">

                <?php
                    $query_aula = "SELECT aul.titulo, aul.conteudo, aul.pdf, aul.resumo,
                                mdu.curso_id
                                FROM aulas aul
                                INNER JOIN modulos AS mdu ON mdu.id=aul.modulo_id
                                WHERE aul.id=:id
                                LIMIT 1";
                    $result_aula = $pdo->prepare($query_aula);
                    $result_aula->bindParam(':id', $id);
                    $result_aula->execute();

                    // Acessa o IF quando encontrar a aula no BD
                    if (($result_aula) and ($result_aula->rowCount() != 0)) {
                        $row_aula = $result_aula->fetch(PDO::FETCH_ASSOC);
                        //var_dump($row_aula);
                        extract($row_aula);
                        echo "<h1 class='text-body-emphasis'>Título da aula: $titulo </h1><br>";
                        echo "<h3> Conteúdo da aula: $conteudo <br>";
                        echo "</h3>";
                ?>
                <hr>
                <div class="container theme-showcase" role="main">
                    <div>
                        <div class="container my-5">
                                <!-- Nav tabs -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#resumo" role="tab" aria-controls="home" aria-selected="true">Resumo da Aula</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#pdf" role="tab" aria-controls="dados_de_acesso" aria-selected="false">Pdf da Aula</a>
                                    </div>
                                </nav>
                            <div class="position-relative p-2 text-justify text-muted bg-body border rounded-5">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="resumo" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div style="padding-top:20px;">
                                            <form class="form-horizontal" action="" method="POST">
                                                <div class="form-group">
                                                    <h1 class="text-body-emphasis">&nbsp;Resumo</h1><br>
                                                    <div class="col-sm-12">
                                                        <?php
                                                            if($resumo != ''){
                                                            echo "$resumo";
                                                            }else{
                                                                echo "Não há resumo cadastrado nesta aula";
                                                            };
                                                        ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div style="padding-top:20px;">
                                        <form class="form-horizontal"  action="" method="POST">
                                                <div class="form-group">
                                                    <h1 class="text-body-emphasis">&nbsp;PDF</h1><br>
                                                    <div class="col-sm-10">
                                                        <?php 
                                                            if($pdf != ''){
                                                                echo "$pdf";
                                                            }else{
                                                                echo "Não há pdf cadastrado nesta aula";
                                                            };
                                                        ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="messages">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="checkbox" id="check">
                <label for="check">
                    <div class="menu" >
                        <span class="hamburguer"></span>
                    </div>
                </label>
                <div class="barra">
                <br><br><br><br><br><br>
                <!--<div id="menu-lateral" class="position-fixed top-0 end-0 vh-100 bg-dark text-white p-4">-->
                    <!--<p class="col-lg-6 mx-auto mb-4">-->
                        <!--<div class="position-fixed top-0 end-0 vh-100 bg-dark text-white p-4">-->
                            <font color="white">
                                <h2>Módulos e Aulas</h2>
                                <br>
                                <ul class="list-unstyled">
                                    <?php
                                        // Recuperar as aulas do curso do BD
                                        $query_aulas = "SELECT aul.id id_aul, aul.titulo, aul.ordem, 
                                                    mdu.id id_mdu, mdu.nome nome_mdu
                                                    FROM aulas aul
                                                    INNER JOIN modulos AS mdu ON mdu.id=aul.modulo_id
                                                    WHERE mdu.curso_id=:curso_id
                                                    ORDER BY mdu.ordem, aul.ordem ASC";
                                        $result_aulas = $pdo->prepare($query_aulas);
                                        $result_aulas->bindParam(':curso_id', $curso_id);
                                        $result_aulas->execute();
                                        // Acessa o IF quando encontrar alguma aula do curso no BD
                                        $id_modulo_cont = 0;
                                        if (($result_aulas) and ($result_aulas->rowCount() != 0)) {
                                            $modulo_anterior = null;
                                            while ($row_aula = $result_aulas->fetch(PDO::FETCH_ASSOC)) {
                                                //var_dump($row_aula);
                                                extract($row_aula);

                                                if ($modulo_anterior!= $id_mdu) {
                                                    if (!is_null($modulo_anterior)) {
                                                        echo "</div>";
                                                    }
                                                    echo "<div class='modulo'>
                                                            <h3>Nome do módulo: <span class='nome-mdu'>$nome_mdu</span></h3>
                                                            <img class='seta' src='img/direita.png' width='40' height='40'>
                                                        </div>";
                                                    echo "<div class='aulas' style='display: none'>";
                                                }
                                                echo "<div class='aula'>
                                                <div class='aula-inner'>
                                                    <p class='aula-titulo'>Título da aula: $titulo</p>
                                                    <p class='aula-ordem'>Ordem da aula: $ordem</p>
                                                    <a class='btn btn-primary' href='visualizar_aula.php?id=$id_aul'>Detalhes da aula</a>
                                                </div>
                                            </div><hr>";

                                            $modulo_anterior = $id_mdu;
                                            }
                                        } else {
                                            echo "<p style='color: #f00;'>Erro: Nenhuma aula encontrada!</p>";
                                        }
                                    } else {
                                        echo "<p style='color: #f00;'>Erro: Aula não encontrada!</p>";
                                    }
                                    ?>
                                </ul>
                            </font>
                        </div>
                    </p>
                <!--</div>-->
                </div>
            </div>
        </div>

    <!--<script>
        $(document).ready(function() {
            // Ocultar o menu lateral inicialmente
            $("#menu-lateral").addClass("d-none");

            // Evento de clique no botão "Mostrar/Esconder Menu"
            $("#toggle-menu").click(function() {
                $("#menu-lateral").toggleClass("d-none");
                if ($("#menu-lateral").hasClass("d-none")) {
                    $(this).text("Mostrar Menu");
                } else {
                    $(this).text("Esconder Menu");
                }
            });
        });
    </script>-->

        <br><br>
		<!--inicio Botão de voltar ao topo-->
		<?php 
            require("Botaodevoltaraotopo.php");
        ?>
        <!--Fim Botão de voltar ao topo-->
        <!-- FOOTER -->
        <?php
            require("footer.php"); 
        ?><br><br>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="javascript/jquery.slim.min.js"><\/script>')</script><script src="javascript/bootstrap.bundle.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="javascript/bootstrap5/bootstrap.bundle.min.js"></script>
        <script src="javascript/menu.js" defer></script>
        <script src="javascript/bootstrap.min.js"></script>
    </body>
</html>
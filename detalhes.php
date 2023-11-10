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
	$id_curso = $_GET['ID_curso'];
	$result_cursos = "SELECT * FROM curso WHERE ID_curso='$id_curso'";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	$row_cursos = mysqli_fetch_assoc($resultado_cursos);
?>
<!DOCTYPE html>
<html lang="pt-br">
	 <!-- Conexão com o banco de dados -->
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
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }

            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }
            .bd-mode-toggle {
                z-index: 1500;
            }

            .modulo {
                cursor: pointer;
                padding: 10px;
                background-color: #f0f0f0;
                border: 1px solid #ccc;
                margin: 5px;
                position: relative;
                width: 1000px; /* Defina a largura desejada */
            }

            .aulas {
                display: none;
                padding: 10px;
                border: 1px solid #ddd;
                margin: 5px;
                margin-top: -6px;
                width: 1000px; /* Largura igual à dos módulos */
            }

            .seta {
                position: absolute;
                top: 13px;
                right: 15px;
                transition: transform 0.3s;
            }

            .seta.aberta {
                transform: rotate(90deg);
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="css/carousel.css" rel="stylesheet">
        <link href="css/informatica.css" rel="stylesheet">
        <link href="css/heroes.css" rel="stylesheet">
        <link href="css/jumbotrons.css" rel="stylesheet">
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
        <!--TESTE-->
        <div class="container my-5">
            <input type="button" class="btn btn-primary" value="Voltar" onClick="history.go(-1)">
            <div class="p-5 text-center bg-body-tertiary rounded-3">
                <img src="admin/imagem/<?php echo $row_cursos['ID_curso'];?>/<?php echo $row_cursos['imagem'];?>" class="bi mt-4 mb-3" style="color: var(--bs-indigo);" width="200px" height="200px">
                <h1 class="text-body-emphasis"><?php echo $row_cursos['Nome']; ?></h1>
                <p class="col-lg-8 mx-auto fs-5 text-muted">
                    <?php echo $row_cursos['Descricao']; ?>
                </p>
            </div>
        </div>
    <div class="b-example-divider"></div>
    <div class="container my-5">
        <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
            <img src="img/arquivo.png" class="bi mt-5 mb-3" width="120px" height="120px">
            <use xlink:href="#check2-circle"/>
            </img>
            <h1 class="text-body-emphasis">Aulas</h1>
            <p class="col-lg-6 mx-auto mb-4">
                <!-- Aqui você pode inserir o código PHP que exibe as aulas e módulos de acordo com a estrutura anterior -->
                <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=testes', 'root', '');

                    // Recupere as aulas e módulos do curso no BD
                    $query_aulas = "SELECT aul.id id_aul, aul.titulo, aul.ordem, 
                                    mdu.id id_mdu, mdu.nome nome_mdu
                                    FROM aulas aul 
                                    INNER JOIN modulos AS mdu ON mdu.id = aul.modulo_id 
                                    WHERE mdu.curso_id=:curso_id 
                                    ORDER BY mdu.ordem, aul.ordem ASC";
                    $result_aulas = $pdo->prepare($query_aulas);
                    $result_aulas->bindParam(':curso_id', $id_curso);
                    $result_aulas->execute();

                    // Use um loop para exibir os módulos e aulas
                    $id_modulo_cont = 0;

                    if (($result_aulas) and ($result_aulas->rowCount() != 0)) {
                        $modulo_anterior = null;
                        while ($row_aula = $result_aulas->fetch(PDO::FETCH_ASSOC)) {
                            extract($row_aula);

                            if ($modulo_anterior != $nome_mdu) {
                                if (!is_null($modulo_anterior)) {
                                    echo "</div>";
                                }
                                echo "<div class='modulo'>
                                        <h2>Nome do módulo: $nome_mdu</h2>
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
                            $modulo_anterior = $nome_mdu;
                        }
                        echo "</div>"; // Fecha o último módulo
                    } else {
                        echo "<p style='color: #f00;'>Erro: Nenhuma aula encontrada!</p>";
                    }
                ?>
            </p>
        </div>
    </div><br><br>
		<!--inicio Botão de voltar ao topo-->
		<?php 
            require("Botaodevoltaraotopo.php");
        ?>
        <!--Fim Botão de voltar ao topo-->
        <!-- FOOTER -->
        <?php
            require("footer.php"); 
        ?>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="javascript/jquery.slim.min.js"><\/script>')</script><script src="javascript/bootstrap.bundle.min.js"></script>  
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!--<script src="javascript/bootstrap.min.js"></script>   -->
        <script src="javascript/bootstrap5/bootstrap.bundle.min.js"></script>
        <script src="javascript/menu.js" defer></script>
	</body>
</html>
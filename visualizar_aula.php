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
        <title>Site de Treinamento - Aula</title>

        <!--coloca o icone na aba da tela-->
        <link rel="icon" type="png" href="img/logo_copi.png">
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
        <br><br><br><br><br><br>
        <input type="button" class="btn btn-primary" value="Voltar" onClick="history.go(-1)"> <br>

        <h2>Visualizar a aula</h2>

        <?php
        $query_aula = "SELECT aul.titulo, aul.conteudo,
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
            echo "Título da aula: $titulo <br>";
            echo "Conteúdo da aula: $conteudo <br>";
            echo "<hr>";

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
                while ($row_aula = $result_aulas->fetch(PDO::FETCH_ASSOC)) {
                    //var_dump($row_aula);
                    extract($row_aula);

                    if ($id_modulo_cont != $id_mdu) {
                        echo "<h2>Nome do módulo: $nome_mdu</h2>";
                    }
                    echo "ID da aula: $id_aul <br>";
                    echo "Título da aula: $titulo <br>";
                    echo "Ordem da aula: $ordem <br>";
                    //echo "Nome do módulo: $nome_mdu <br>";
                    echo "<a href='visualizar_aula.php?id=$id_aul&id_curso=$id'>Acessar a aula</a>";
                    echo "<hr>";

                    $id_modulo_cont = $id_mdu;
                }
            } else {
                echo "<p style='color: #f00;'>Erro: Nenhuma aula encontrada!</p>";
            }
        } else {
            echo "<p style='color: #f00;'>Erro: Aula não encontrada!</p>";
        }
        ?>

        <br><br>
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
    </body>
</html>
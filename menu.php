<!doctype html>
<html lang="pt-br">
  <!--coloca o icone na aba da tela-->
  <link rel="icon" type="png" href="img/logo_copi.png">
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

      //Seta a quantidade de cursos por pagina
      $quantidade_pg = 6;

      //calcular o número de pagina necessárias para apresentar os cursos
      //$num_pagina = ceil($total_cursos/$quantidade_pg);

      //Calcular o inicio da visualizacao
      $incio = ($quantidade_pg*$pagina)-$quantidade_pg;

      //Selecionar os cursos a serem apresentado na página
      $result_parceiro = "SELECT * FROM parceiro ORDER BY ID_parceiro DESC limit $incio, $quantidade_pg";
      $resultado_parceiro = mysqli_query($conn, $result_parceiro);
      $total_parceiros = mysqli_num_rows($resultado_parceiro);

      //Selecionar as informacoes de menu
      $result_menu = "SELECT * FROM menu"; 
	    $resultado_menu = mysqli_query($conn, $result_menu);
	    $row_menu = mysqli_fetch_assoc($resultado_menu);

	?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Site de Treinamento - Menu</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/carousel/">-->

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #483D8B">
        <img class="navbar-brand" src="img/logo_copi.png" width="50px" height="60px"></img>
        <a class="navbar-brand" href="menu.php">COPIMAQ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
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
            <a class="navbar-brand" href="pagina_usuario.php?id=<?php echo $row_usuario['ID_usuario']; }?>"> 
            <center>
              <img src="img/usuario.png" width="40px" height="40px"> <br> 
            </center>
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
      <br><br>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="admin/logo/menu/<?php echo $row_menu['carrosel1'];?>" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></img>

            <!--<div class="container">
              <div class="carousel-caption text-left">
                <h1>Example headline.</h1>
                <p>Some representative placeholder content for the first slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
              </div>
            </div>-->
          </div>
          <div class="carousel-item">
            <img src="admin/logo/menu/<?php echo $row_menu['carrosel2'];?>" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg>

            <!--<div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Some representative placeholder content for the second slide of the carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
              </div>
            </div>-->
          </div>
          <div class="carousel-item">
            <img src="admin/logo/menu/<?php echo $row_menu['carrosel3'];?>" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label=" :  " preserveAspectRatio="xMidYMid slice" focusable="false"><title> </title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"> </text></svg>

            <!--<div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Some representative placeholder content for the third slide of this carousel.</p>
                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
              </div>
            </div>-->
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      <div class="container marketing">
        <h1> <center> Novas Empresas Parceiras </center> </h1>
        <br><br>
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <?php while($rows_parceiro = mysqli_fetch_assoc($resultado_parceiro)){?>
            <div class="col-lg-4">
              <img src="admin/externo/<?php echo $rows_parceiro['ID_parceiro'];?>/<?php echo $rows_parceiro['imagem'];?>" class="bd-placeholder-img rounded-square" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
              <h2><?php echo $rows_parceiro['Nome'];?></h2>
              <p><?php echo $rows_parceiro['Descricao'];?></p>
            </div><!-- /.col-lg-4 -->
          <?php }?>    
        </div><!-- /.row -->

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading"><?php echo $row_menu['titulo1']?></h2>
            <p class="lead"><?php echo $row_menu['texto1']?></p>
          </div>
          <div class="col-md-5">
            <img src="admin/logo/menu/<?php echo $row_menu['imagem1'];?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading"><?php echo $row_menu['titulo2']?></h2>
            <p class="lead"><?php echo $row_menu['texto2']?></p>
          </div>
          <div class="col-md-5 order-md-1">
            <img src="admin/logo/menu/<?php echo $row_menu['imagem2'];?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading"><?php echo $row_menu['titulo3']?></h2>
            <p class="lead"><?php echo $row_menu['texto3']?></p>
          </div>
          <div class="col-md-5">
            <img src="admin/logo/menu/<?php echo $row_menu['imagem3'];?>" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
      <!--inicio Botão de voltar ao topo-->
      <?php 
        require("Botaodevoltaraotopo.php");
      ?>
      <!--Fim Botão de voltar ao topo-->
      <?php
        require("footer.php"); 
	    ?>
    </main>  

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <!--<script>window.jQuery || document.write('<script src="javascript/jquery.slim.min.js"><\/script>')</script><script src="javascript/bootstrap.bundle.min.js"></script> -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--<script src="javascript/bootstrap.min.js"></script>-->
    <script src="javascript/bootstrap.bundle.min.js"></script>

  </body>
</html>

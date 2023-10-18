<!doctype html>
<html lang="pt-br">
  <!-- Conexão com o banco de dados -->
  <?php
	  include_once ("conexao.php");
    //$resulta_usuario = "SELECT * FROM usuario WHERE email = '$email' ";
    $id = $_GET['id'];
    $result_usuario = "SELECT * FROM usuario WHERE ID_usuario='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
	?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Site de Treinamento - usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--coloca o icone na aba da tela-->
    <link rel="icon" type="png" href="img/logo_copi.png">

    <style>
      table, th, td {
        border: 1px solid black;
        width: 50%;
        height: 50px;
        text-align: center;
      }

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
    </style>

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
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
            <a class="navbar-brand" href="pagina_usuario.php?id=<?php echo $row_usuario['ID_usuario'];?>"> <center>
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
      <div class="container">
        <!-- Mensagem de boas vindas -->
        <center>
          <img src="img/logo_copi.png" width="200px" height="200px"><br>
          <h1>
            <p class="display-4" id="boas_vindas"> Olá <?php echo $_SESSION['Nome']?>, boas vindas ao Portal de Treinamento! </p>
          </h1>

            <h2>Ficha</h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Nome:</th>
                <th scope="col">RG:</th>
                <th scope="col">CPF:</th>
                <th scope="col">Cargo:</th>
                <th scope="col">E-mail:</th>
                <th scope="col">Senha:</th>
              </tr>
            </thead>
            <tr>
              <td><?php echo $row_usuario['Nome']?></td>
              <td><?php echo $row_usuario['RG']?></td>
              <td><?php echo $row_usuario['CPF']?></td>
              <td><?php echo $row_usuario['Cargo']?></td>
              <td><?php echo $row_usuario['email']?></td>
              <td><?php echo $row_usuario['senha']?></td>
            </tr>
          </table>

          <script>                        
            function show() {
              var senha = document.getElementById("inputPassword3");
              if (senha.type === "password") {
                senha.type = "text";
              } else {
                senha.type = "password";
              }
            }
          </script>
          <br>
          <div class="container theme-showcase" role="main">
            <form method="POST" action="alteracao.php">
              <label for="InputPassword3">Password:&nbsp;&nbsp;</label>
              <input type="password" id="inputPassword3" placeholder="Preencha o campo">
              <input type="checkbox" onclick="show()">&nbsp;&nbsp;
              <input type="hidden" name="id" value="<?php echo $row_usuario['ID_usuario']; ?>">
              <button type="submit" class="btn btn-danger">Alterar</button>  
            </form>

<!--
            <h1>Alterar senha</h1>
            <form  method="POST" action="alteracao.php" display="inline-block">
              <div class="form-group">
                <label for="InputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $row_usuario['ID_usuario']; ?>">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Alterar</button>
                </div>  
              </div>
            </form>
    -->
          </div>
        </center>
      </div>
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
    </main>
    <!--<script src="https://ajax,googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="javascript/jquery.slim.min.js"><\/script>')</script><script src="javascript/bootstrap.bundle.min.js"></script>  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="javascript/bootstrap.min.js"></script>-->
    <script src="javascript/bootstrap.bundle.min.js"></script>
  </body>
</html>
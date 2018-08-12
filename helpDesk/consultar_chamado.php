<?php 
  require_once ('validador_acesso.php');
  $chamados = array();
  $conn = mysqli_connect('127.0.0.1', 'root', '', 'crud');
  $sql = "select * from chamados;";
  $consuta = mysqli_query($conn, $sql);
  mysqli_close($conn);
  while ($linha = $consuta->fetch_assoc()) {
    $chamados[] = $linha;
  }
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">
            SAIR
          </a>
        </li>
      </ul>
    </nav>
    <div class="container">
      <div class="row">
        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            <div class="card-body">
              <?php foreach ($chamados as $chamado){
                  if($_SESSION['perfil_id'] == '2'){
                    if($_SESSION['id'] != $chamado['id_usuario']){
                      continue;
                    }
                  }
                ?>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="col-2 float-right">
                    <br>
                    <a href="../scripts/excluir_chamado.php?id_chamado=<?php echo $chamado['id_chamado']; ?>">
                    <button class="btn btn-danger">X</button> </a>
                  </div>
                  <div class="col-8 float-letf">
                    <h5 class="card-title">
                      <?php echo $chamado['titulo']; ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                      <?php echo $chamado['categoria']; ?>
                    </h6>
                    <p class="card-text">
                      <?php echo $chamado['descricao']; ?>
                    </p>
                  </div>
                </div>
              </div>
              <?php }?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
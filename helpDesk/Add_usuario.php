<?php 
  require_once ('validador_acesso.php');
  if($_SESSION['perfil_id'] != '1'){
    header ("location: home.php?notadm=1");
  }
?>
<html>
<head>
  <meta charset="utf-8"/>
  <title>App Help Desk</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    .card-abrir-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> Help Desk
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
      <div class="card-abrir-chamado">
        <div class="card">
          <div class="card-header">
            Adicionar Usuario
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form method="post" action="../scripts/add_user.php">
                  <div class="form-group">
                    <label>E-mail</label>
                    <input name="email" type="email" class="form-control" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <label>Senha</label>
                    <input name="senha" type="text" class="form-control" placeholder="Senha">
                  </div>
                  <div class="form-group">
                    <label>Tipo Usuario</label>
                    <select name="tipo" class="form-control">
                      <option>Selecione o tipo do usuario</option>
                      <option value="1">Administrador</option>
                      <option value="2">Usuario</option>
                    </select>
                  </div>
                  <div class="row mt-5">
                    <div class="col-6">
                      <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
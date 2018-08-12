<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
    
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form method="post" action="../scripts/autentica_Usuario.php">
                <div class="form-group" >
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <?php if(isset($_GET['login'])) { if($_GET['login'] == 'erro'){ ?>
                  <div class="text-danger">
                    Usuario ou senha invalido
                  </div>
                <?php }} ?> 
                <?php if(isset($_GET['login'])) { if($_GET['login'] == 'erro2'){ ?>
                  <div class="text-danger">
                    E necesario fazer login antes
                  </div>
                <?php }} ?> 
                <button  class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
              <?php if(isset($_GET['logoff'])) { if($_GET['logoff'] == 'ok'){ ?>
                  <div class="text-center text-success">
                    Logoff realizado!
                  </div>
                <?php }} ?> 
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
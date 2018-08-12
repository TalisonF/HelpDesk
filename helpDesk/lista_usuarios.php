<?php 
  require_once('validador_acesso.php');
  if($_SESSION['perfil_id'] != '1'){
    header ("location: home.php?notadm=1");
  }
  $usuarios = array();
  $conn = mysqli_connect('127.0.0.1', 'root', '', 'crud');
  $sql = "select * from usuarios;";
  $consuta = mysqli_query($conn, $sql);
  while ($linha = $consuta->fetch_assoc()) {
      $usuarios[] = $linha;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.6">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Consulta Usuarios</title>
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
      <h1 class="p-3 text-primary">
        Lista de Usuarios
      </h1>
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Email</th>
          <th>Privilegios</th>
          <th> Alterar </th>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $user){?>
          <tr>
            <form method="POST" action="../scripts/alterar_privilegios.php?id_usuario=<?php echo $user['id_usuario']; ?>">
              <td><?php echo $user['id_usuario']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td>
                <select name="Privilegios">
                  <option  value="1"> Adiministrador </option>
                  <option <?php if($user['privilegios'] == 2) {echo "selected ";} ?>value="2"> Usuario </option>
                </select>
              </td>
              <td>
                <input type="submit" value="Alterar" class="btn btn-success">
              </form>
                <a href="../scripts/excluir_usuario.php?id_usuario=<?php echo $user['id_usuario'];?>"><button class="btn btn-danger">X</button></a>
              </td>
              </tr>
            </form>
          <?php }?>
        </tbody>
      </table>

    </div>
      <div class="row mt-5">
          <div class="col-6">
            <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
          </div>
        </div>
      

  </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
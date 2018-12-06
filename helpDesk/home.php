<?php 
  require_once ('validador_acesso.php');
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>App Help Desk</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">
	<style>
		.card-home {
			padding: 30px 0 0 0;
			width: 100%;
			margin: 0 auto;
		}
		.menu {
			display: inline;
			margin-top: 10px;
			maru
		}
		.menu>li{
			color: white;			
		}
		.menu>li>a{
			color: rgb(23,162,184);
		}		
		.menu>li>a:hover{
			color: rgb(0,86,179);
			text-decoration: none;
		}
		</style>
</head>
<body>

	<!--<a class="nav-link" href="logoff.php">
					Sair					
		</a>
	-->
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="home.php">
			<img src="logo.png"  height="30" class="d-inline-block align-top" alt=""> App Help Desk
		</a>
		<ol class="nav-item menu">
			<li class="menu nav-item"> <?php echo($_SESSION['nome'])?></li>
			<li class="menu nav-item"> <a href="logoff.php">Logoff</a></li>
		</ol>
	</nav>
	<div class="container">
		<div class="row">
			<div class="card-home">
					<?php if(isset($_GET['notadm'])){?>
						<h1 class="text-danger">
							Acesso não permitido para usuarios comuns!
						</h1>
					<?php }?>
					<div class="card">
					<div class="card-header">
						Menu
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-6 d-flex justify-content-center">
								<a href="abrir_chamado.php">
									<i class="fas fa-edit fa-5x"></i>
								</a>
							</div>
							<div class="col-6 d-flex justify-content-center">
								<a href="consultar_chamado.php">
									<i class="fas fa-search fa-5x"></i>
								</a>
							</div>
						</div>
						<?php if($_SESSION['perfil_id'] == 1){ ?>
							<div class="row mt-3">
								<div class="col-6 d-flex justify-content-center">
									<a href="Add_usuario.php">
										<i class="fas fa-user-plus fa-5x"></i>
									</a>
								</div>
								<div class="col-6 d-flex justify-content-center">
									<a href="lista_usuarios.php">
										<i  class="fas fa-users fa-5x"></i>
									</a>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
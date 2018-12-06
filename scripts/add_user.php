<?php 
    require_once('../helpDesk/validador_acesso.php');
    $connc = mysqli_connect('127.0.0.1', 'root' , '','crud');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $privilegio = $_POST['tipo'];
    $nome = $_POST['nome'];
    $sql = "insert into usuarios (email , senha , privilegios, nome) values ('$email' , '$senha' , '$privilegio' , '$nome');";
    
    echo $sql;
    if(mysqli_query($connc , $sql)){
        header('Location: ../helpDesk/home.php');
    }else {
        echo mysqli_error($connc);
    }

?>


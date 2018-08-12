<?php 
    session_start();
    
    $conn = mysqli_connect('127.0.0.1', 'root','','crud');
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao =$_POST['descricao'];
    $id_usuario = $_SESSION['id'];

    $sql = "insert into chamados (id_usuario,titulo,categoria,descricao,status_chamados) values ('$id_usuario','$titulo' ,'$categoria' , '$descricao' , 'aberta');";
    mysqli_query($conn,$sql);

    header('Location: ../helpDesk/abrir_chamado.php');
?>
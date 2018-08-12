<?php 
    session_start();
    
    $conn = mysqli_connect('127.0.0.1', 'root','','crud');
    $titulo = str_replace('#' , '-' , $_POST['titulo']);
    $categoria = str_replace('#' , '-' , $_POST['categoria']);
    $descricao = str_replace('#' , '-' , $_POST['descricao']);
    $id_usuario = $_SESSION['id'];

    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao .'#' . 'aberta' . PHP_EOL;
    
    $sql = "insert into chamados (id_usuario,titulo,categoria,descricao,status_chamados) values ('$id_usuario','$titulo' ,'$categoria' , '$descricao' , 'aberta');";
    mysqli_query($conn,$sql);

    $arquivo = fopen('../scripts/arquivo.txt' , 'a');
    
    fwrite($arquivo , $texto);
    fclose($arquivo);
    header('Location: ../helpDesk/abrir_chamado.php');
?>
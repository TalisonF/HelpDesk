<?php 
    $id_usuario = $_GET['id_usuario'];
    print_r($_GET);

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'crud');
    $sql = "delete from usuarios where id_usuario='$id_usuario';";
    mysqli_query($conn, $sql);
    header("Location: ../helpDesk/lista_usuarios.php");

?>
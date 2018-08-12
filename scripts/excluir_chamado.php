<?php 
    $idchamado = $_GET['id_chamado'];
    print_r($_GET);

    $conn = mysqli_connect('127.0.0.1', 'root', '', 'crud');
    $sql = "delete from chamados where id_chamado='$idchamado';";
    mysqli_query($conn, $sql);
    header("Location: ../helpDesk/consultar_chamado.php");

?>
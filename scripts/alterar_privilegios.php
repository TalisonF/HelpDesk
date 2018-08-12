<?php 
    print_r($_GET);
    print_r($_POST);
    $conn = mysqli_connect('127.0.0.1','root', '','crud');
    $idalterar = $_GET['id_usuario'];
    $previlegio = $_POST['Privilegios'];

    $sql = "update usuarios set privilegios='$previlegio' where id_usuario='$idalterar';";
    mysqli_query($conn,$sql);

    header("Location: ../helpDesk/lista_usuarios.php");
?>

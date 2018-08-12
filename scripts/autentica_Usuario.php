<?php
    session_start();
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;
    $usuario_nome;
    
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'crud');
       
    $email_post = $_POST['email'];
    $sql = "select * from usuarios where email='$email_post';";
    echo $sql;
    $consuta = mysqli_query($conn, $sql);

    mysqli_close($conn);
    while ($linha = $consuta->fetch_assoc()) {
        $usuarios[] = $linha;
    }

    echo '<pre>';
    print_r($usuarios);
    echo '</pre>';

    foreach($usuarios as $user){
        if ($_POST['email'] == $user['email'] && $_POST['senha'] == $user['senha'] ){
            $usuario_autenticado = true;
            $usuario_id = $user['id_usuario'];
            $usuario_perfil_id = $user['privilegios'];
            $usuario_nome = $user['email'];
        }
    }

    if($usuario_autenticado){         
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        $_SESSION['email'] = $usuario_nome;

        header('Location: ../helpDesk/home.php');
    }else{
        echo 'não deu';
        $_SESSION['autenticado'] = 'NAO';
        header('Location: ../helpDesk/index.php?login=erro');
    }

?>
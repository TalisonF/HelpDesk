<?php 
    session_start();
    $_SESSION['autenticado'] = 'nao';
    session_destroy();
    
    header('Location: index.php?logoff=ok')
?>
<?php
namespace App\Controllers;


use MF\Controller\Action;
use MF\Controller\AutenticaSesssao;
use MF\Model\Container;
use App\Models\Usuario;

class AuthController extends Action{
    
    
    public function autentica_usuario(){
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $usuario = Container::getModel('Usuario');
   
        $usuario->__set('email', $email);
        $usuario->__set('senha', $senha);
        
        $usuario->autenticar();

        if($usuario->__get('id_usuario') != '' && $usuario->__get('nome') != '' && $usuario->__get('privilegios') != '' ){        
            session_start();
            $_SESSION['id_usuario'] = $usuario->__get('id_usuario');
            $_SESSION['nome'] = $usuario->__get('nome');
            $_SESSION['email'] = $usuario->__get('email');
            $_SESSION['privilegios'] = $usuario->__get('privilegios');
            \header("Location: /home");
        }else {
            \header("Location: /?login=erro");
        }
    }

    public function sair(){
        session_start();
        session_destroy();
        \header("Location: /");
    }
}

?>
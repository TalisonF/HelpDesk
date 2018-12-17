<?php
namespace App\Controllers;


use MF\Controller\Action;
use MF\Controller\AutenticaSesssao;
use MF\Model\Container;

use App\Models\Usuario;

class LoginController extends Action{
    
    public function login(){
        @$this->view->dados = array('talison'=> 'aa');
        $this->render('login', 'layout');
    }
    public function autentica_usuario(){
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $usuario = Container::getModel('Usuario');

        $usuario = $usuario->getUsuario($email,$senha);

        print_r($usuario);

        if(count($usuario) > 0){
            AutenticaSesssao::valida_sessao($usuario[0]['id_usuario'],$usuario[0]['nome'], $usuario[0]['privilegios']);     
        }else {
            echo('usuario invalido');
        }
        



    }
}

?>
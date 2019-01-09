<?php
namespace App\Controllers;

use MF\Controller\Action;
use MF\Controller\AutenticaSesssao;
use MF\Model\Container;
use App\Models\Usuario;

class UserController extends Action{
        
    public function add_usuario(){  
        $this->validaAutenticacao();

        $this->render('Add_usuario','layout2');
        
    }

    public function cadastrar_user(){        
        $this->validaAutenticacao();
        $this->userAdm();
        $usuario = Container::getModel('usuario');

        $usuario->__set('email' , $_POST['email']);
        if(count($usuario->getUserEmail())>0){
            header("Location: /Add_usuario?criou=false");
        }else {
            $usuario->__set('nome' , $_POST['nome']);
            $usuario->__set('senha' , md5($_POST['senha']));
            $usuario->__set('privilegios' , $_POST['tipo']);

            $usuario->cadastrar();

            header("Location: /Add_usuario?criou=true");
        }
    }

    public function lista_usuarios(){      
        $this->validaAutenticacao();
        $this->userAdm();

        $usuarios = Container::getModel('usuario');

        $this->view->usuarios = $usuarios->getAll();

        $this->render('lista_usuarios','layout2');

    }

    public function alterarPrivilegios(){
        $this->validaAutenticacao();
        $this->userAdm();
        $usuario = Container::getModel('usuario');
        $usuario->__set('id_usuario', $_GET['id_usuario']);
        $usuario->__set('privilegios', $_POST['Privilegios']);
        $usuario->alterarPrivilegios();

        header("Location: /lista_usuarios");

    }

    public function excluir_usuario(){
        $this->validaAutenticacao();
        $this->userAdm();
        $usuario = Container::getModel('usuario');
        if(\count($usuario->temChamado())> 0){
            $usuario->__set('id_usuario', $_GET['id_usuario']);
            $usuario->excluir_usuario();
            header("Location: /lista_usuarios");
        }else{
            header("Location: /lista_usuarios?excluir=temchamado&usuario=".  $_GET['id_usuario']  );
        }
    }
    


    public function validaAutenticacao(){
        session_start();
        
		if(!isset($_SESSION['id_usuario']) ){
            header("Location: /?login=erro");
        }
        if($_SESSION['privilegios'] == 2){
            header("Location: /home?notadm=true");
        }
	}

    public function userAdm(){
        session_start();
        
		if(!isset($_SESSION['privilegios']) && $_SESSION['privilegios'] == 2 ){
            header("Location: /?home=notadm");
        }
	}

}

?>
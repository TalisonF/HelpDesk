<?php
namespace App\Controllers;

use MF\Controller\Action;
use MF\Controller\AutenticaSesssao;
use MF\Model\Container;
use App\Models\Usuario;

class AppController extends Action{
        
    public function home(){  
        $this->validaAutenticacao();

        $this->render('home','layout2');
        
    }

    public function abrir_chamado(){
        $this->validaAutenticacao();
        $this->render('abrir_chamado','layout2');
    }
    public function registra_chamado(){
        $this->validaAutenticacao();
        $chamado = Container::getModel('chamado');

        $chamado->__set('id_usuario', $_SESSION['id_usuario']);
        $chamado->__set('titulo', $_POST['titulo']);
        $chamado->__set('categoria', $_POST['categoria']);
        $chamado->__set('descricao', $_POST['descricao']);

        $chamado->salvar();

        header("Location: /abrir_chamado?chamado_aberto=true");

    }


    public function validaAutenticacao(){
        session_start();
        
		if(!isset($_SESSION['id_usuario']) ){
            header("Location: /?login=erro");
		}
	}


}

?>
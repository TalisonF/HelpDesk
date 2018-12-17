<?php
namespace MF\Controller\AutenticaSesssao;

class AutenticaSesssao{
    public static function valida_sessao($id_usuario,$nome,$privilegios){
        session_start();

        $_SESSION['usuario_autenticado'] = True; 
        $_SESSION['usuario_id'] = $id_usuario;
        $_SESSION['usuario_nome'] = $nome;
        $_SESSION['usuario_privilegios'] = $privilegios;

    }

    public static function verificar_sessao(){
        if(cont($_SESSION) > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>
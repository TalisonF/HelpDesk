<?php
namespace App\Models;

use MF\Model\Model;

class Usuario extends Model{

    private $id_usuario;
    private $email;
    private $senha;
    private $privilegios;
    private $nome;


    public function __get($atributo)
    {
        return $this->$atributo; 
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    
    public function autenticar(){
        $query = "select id_usuario,email,nome,privilegios from usuarios where email = :email and senha= :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->bindValue(':senha',$this->__get('senha'));
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($usuario['id_usuario'] != '' && $usuario['nome'] != '' && $usuario['privilegios'] != '' ){
            $this->__set('id_usuario', $usuario['id_usuario'] );
            $this->__set('nome', $usuario['nome'] );
            $this->__set('privilegios', $usuario['privilegios'] );
        }

        return $this;
    }

}

?>
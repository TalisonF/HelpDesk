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

    public function cadastrar(){
        $query = "insert into usuarios (email,senha,privilegios,nome) values (:email,:senha,:privilegios, :nome)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->bindValue(':senha',$this->__get('senha'));
        $stmt->bindValue(':privilegios',$this->__get('privilegios'));
        $stmt->bindValue(':nome',$this->__get('nome'));

        $stmt->execute();
        return $this;
    }

    public function getUserEmail(){
        $query = "select email from usuarios where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();
        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    public function getAll(){
        $query = "select * from usuarios";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }

    public function alterarPrivilegios(){
        $query = "update usuarios set privilegios= :privilegios where id_usuario= :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));        
        $stmt->bindValue(':privilegios',$this->__get('privilegios'));
        $stmt->execute();

        return $this;
    }

    public function excluir_usuario(){
        $query = "delete from usuarios where id_usuario=:id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));   
        $stmt->execute();     
       
    }
}

?>
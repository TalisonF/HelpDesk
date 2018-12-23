<?php
namespace App\Models;

use MF\Model\Model;

class Chamado extends Model{
    
    private $id_chamado;
    private $id_usuario;
    private $titulo;
    private $categoria;
    private $descricao;
    private $status_chamado;

    public function __get($atributo)
    {
        return $this->$atributo; 
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function salvar(){
        $query = "insert into chamados (id_usuario,titulo,categoria,descricao,status_chamados) values(:id_usuario, :titulo, :categoria, :descricao , :status_chamado)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':titulo', $this->__get('titulo'));
        $stmt->bindValue(':categoria', $this->__get('categoria'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':status_chamado', 'aberto');
        $stmt->execute();
        return $this;
    }

    public function getAll(){
        $query = "
        select 
            chamados.id_chamado ,chamados.titulo,chamados.categoria, chamados.descricao , usuarios.nome 
        from 
            chamados, usuarios 
        where 
            chamados.id_usuario = usuarios.id_usuario
        ";

            $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function excluirChamado(){
        $query = "delete from chamados where id_chamado = :id_chamado";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_chamado', $this->__get('id_chamado'));
        $stmt->execute();
    }
    
}

?>
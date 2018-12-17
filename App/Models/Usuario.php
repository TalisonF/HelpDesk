<?php
namespace App\Models;

use MF\Model\Model;

class Usuario extends Model{

    public function getUsuario($email,$senha){
        $query = "select * from usuarios where email='$email' and senha='$senha'";
        return $this->db->query($query)->fetchAll();       
    }

}

?>
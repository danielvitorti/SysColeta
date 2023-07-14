<?php

class Turno_model extends CI_Model
{

    public $Id;
    public $Nome;
    
    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('turno', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('turno', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('turno',$data);
        //return $this->db->delete('turno', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->get('turno');
    }

    public function buscarTodos()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('turno');
    }

    public function buscarPorNome()
    {
        $this->db->where('Excluido', '0');
        $this->db->like('Nome', $this->Nome);
        return $this->db->get('turno');
    }

    

}
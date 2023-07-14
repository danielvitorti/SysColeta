<?php

class TipoPagamento_model extends CI_Model
{

    public $Id;
    public $Nome;
    
    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('tipopagamento', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('tipopagamento', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('tipopagamento',$data);
        
        //return $this->db->delete('tipopagamento', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('tipopagamento');
    }

    public function buscarTodos()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('tipopagamento');
    }

    public function buscarPorNome()
    {
        $this->db->like('Nome', $this->Nome);
        return $this->db->get('tipopagamento');
    }
    
  
}
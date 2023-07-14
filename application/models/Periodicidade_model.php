<?php

class Periodicidade_model extends CI_Model
{

    public $Id;
    public $Nome;
    
    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('periodicidade', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('periodicidade', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('periodicidade',$data);
        
        //return $this->db->delete('periodicidade', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('periodicidade');
    }

    public function buscarTodas()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('periodicidade');
    }

    public function buscarPorNome()
    {
        $this->db->like('Nome', $this->Descricao);
        return $this->db->get('periodicidade');
    }   
}
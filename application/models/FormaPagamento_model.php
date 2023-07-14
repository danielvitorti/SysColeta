<?php

class formapagamento_model extends CI_Model
{
    public $Id;
    public $Nome;
    public $Valor;

    

    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('formapagamento', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('formapagamento', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('formapagamento',$data);
        
        //return $this->db->delete('formapagamento', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('formapagamento');
    }

    public function buscarTodas()
    {
        $this->db->where('Excluido', '0');
        $this->db->order_by("Nome", "asc");
        return $this->db->get('formapagamento');
    }

    public function buscar()
    {
        $this->db->like('Nome', $this->Nome);
        return $this->db->get('formapagamento');
    }

}
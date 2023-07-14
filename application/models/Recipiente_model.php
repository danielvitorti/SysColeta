<?php

class recipiente_model extends CI_Model
{


    public $Id;
    public $Nome;
    public $Capacidade;
    
    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('recipiente', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('recipiente', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('recipiente',$data);
        //return $this->db->delete('recipiente', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('recipiente');
    }

    public function buscarTodos()
    {
        $this->db->where('Excluido', '0');
        $this->db->order_by("Nome", "asc");
        return $this->db->get('recipiente');
    }

    public function buscar()
    {
        $this->db->where('Excluido', '0');
        $this->db->like('Nome', $this->Nome);
        $this->db->like('Capacidade', $this->Capacidade);
        return $this->db->get('recipiente');
    }
	
	public function countAll()
    {
        return $this->db->where('Excluido','0')->from('recipiente')->count_all_results();
    }

}
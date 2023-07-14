<?php

class Veiculo_model extends CI_Model
{


    public $Id;
    public $Nome;
    public $Placa;
    public $Capacidade;

    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('veiculo', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        $this->db->where('Excluido', '0');
        return $this->db->update('veiculo', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('veiculo',$data);
        
        //return $this->db->delete('veiculo', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->get('veiculo');
    }

    public function buscarTodos()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('veiculo');
    }

    public function buscar()
    {
        $this->db->where('Excluido', '0');
        $this->db->like('Nome', $this->Nome);
        $this->db->like('Placa', $this->Placa);
        return $this->db->get('veiculo');
    }

}
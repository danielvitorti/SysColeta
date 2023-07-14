<?php

class Etiqueta_model extends CI_Model
{

    public $Id;
    public $Descricao;
    
    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('etiqueta', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('etiqueta', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('etiqueta',$data);
        
        //return $this->db->delete('etiqueta', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->get('etiqueta');
    }

    public function buscarTodas()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('etiqueta');
    }

    public function buscarPorDescricao()
    {
        $this->db->where('Excluido', '0');
        $this->db->like('Descricao', $this->Descricao);
        return $this->db->get('etiqueta');
    }

    

}
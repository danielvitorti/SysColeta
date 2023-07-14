<?php

class RecipienteColeta_model extends CI_Model
{

    public $Id;
    public $IdRecipiente;
    public $IdColeta;
    public $DataCadastro;


    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('recipientecoleta', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('recipientecoleta', $this);
    }

    public function excluir()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->delete('recipientecoleta', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('recipientecoleta');
    }

    public function buscarTodos()
    {
        return $this->db->get('recipientecoleta');
    }
    
    public function buscarPorColeta()
    {
        $this->db->where('IdColeta', $this->IdRota);
        return $this->db->get('recipientecoleta');
    }

    public function excluirPorColeta()
    {
        $this->db->where('IdColeta', $this->IdRota);
        return $this->db->delete('recipientecoleta', $this);
    }


}
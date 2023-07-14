<?php

class Coleta_model extends CI_Model
{


    public $Id;
    public $IdCliente;
	public $IdMotorista;
    public $Quantidade;
    public $Pagamento;
    public $DataCadastro;

    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        $this->db->insert('coleta', $this);
        return $this->db->insert_id();
    }

    public function alterar()
    {      
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->update('coleta', $this);
    }

    public function excluir()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->delete('coleta', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->get('coleta');
    }

    public function buscarTodas()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('coleta');
    }

    public function totalColetado()
    {
        $this->db->where('Excluido', '0');
        $this->db->select_sum('Quantidade');
        return $this->db->get('coleta')->row();
    }

    


}
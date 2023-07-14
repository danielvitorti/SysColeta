<?php

class Motorista_model extends CI_Model
{

    public $Id;
    public $Nome;
    public $Habilitacao;
    public $Telefone;
    public $Observacao;
    public $DataCadastro;


    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('motorista', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('motorista', $this);
    }

    public function excluir()
    {

        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('motorista',$data);
        //return $this->db->delete('motorista', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        $this->db->where('Excluido', '0');
        return $this->db->get('motorista');
        
    }

    public function buscarTodos()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('motorista');
    }

    public function totalMotorista()
    {
        $this->db->select_sum('Quantidade');
        $this->db->select('Quantidade');
        return $this->db->get('coleta')->row();
    }

    public function countAll()
    {
       
        return $this->db->where('Excluido','0')->from('motorista')->count_all_results();
    }


    

}
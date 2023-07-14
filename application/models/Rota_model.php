<?php

class Rota_model extends CI_Model
{

    public $Id;
    public $Nome;
    public $IdMotorista;
    public $DataRota;
    public $Turno; 
    public $Perimetro; 
    public $Observacao;
    public $Status;
    public $Liberada;
    public $IdVeiculo;


    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        $result = $this->db->insert('rota', $this);
        return $this->db->insert_id();
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('rota', $this);
    }

    public function excluir()
    {
       
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('rota',$data);
        // return $this->db->delete('rota', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->get('rota');
    }

    public function buscarTodas()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('rota');
    }
    
    public function buscarPorMotorista()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('IdMotorista', $this->IdMotorista);
        return $this->db->get('rota');
    }

    public function alterarStatus()
    {
        $status = array('Status' => $this->Status);
        $this->db->where('Id', $this->Id);
        return $this->db->update('rota', $status);
    }

    public function countAll()
    {
        return $this->db->where('Excluido','0')->from('rota')->count_all_results();
    }
	
	public function countPorStatus()
	{
		return $this->db->where('Excluido','0')->
						  where('Status', $this->Status)->	
						  from('rota')->count_all_results();		
	}
	
	public function buscarMaxIdPorNome()
	{
		$this->db->select("max(rota.Id) Id");
		$this->db->where("nome",$this->Nome);
		return $this->db->get('rota');
	}


}
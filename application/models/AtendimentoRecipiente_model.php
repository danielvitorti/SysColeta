<?php

class AtendimentoRecipiente_model extends CI_Model
{

    public $Id;
    public $IdAtendimento;
    public $IdRecipiente;
    public $DataCadastro;
    public $Quantidade;
	public $IdCliente;
	public $IdRota;
	
    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('atendimentorecipiente', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('atendimentorecipiente', $this);
    }

    public function excluir()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->delete('atendimentorecipiente', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('atendimentorecipiente');
    }

    public function buscarTodos()
    {
        return $this->db->get('atendimentorecipiente');
    }


    public function buscarPorAtendimento()
    {
        $this->db->where('IdAtendimento', $this->IdAtendimento);
        return $this->db->get('atendimentorecipiente');
    }

    public function buscarPorRecipiente()
    {
        $this->db->where('IdRecipiente', $this->IdRecipiente);
        return $this->db->get('atendimentorecipiente');
    }

    
    public function excluirPorAtendimento()
    {
	
    	$data = array("IdAtendimento" => $this->IdAtendimento);
      
        return $this->db->delete('atendimentorecipiente',$data);
    }
	
	public function buscarPorAtendimentoCliente()
	{
		$this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
		return $this->db->get('atendimentorecipiente');
	}

	public function buscarPorAtendimentoRotaCliente()
	{
		$this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
		$this->db->where('IdRota', $this->IdRota);
		
		return $this->db->get('atendimentorecipiente');
	}
	
	public function excluirPorAtendimentoRotaCliente()
	{
		$this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
		$this->db->where('IdRota', $this->IdRota);
		
	    return $this->db->delete('atendimentorecipiente', $this);
    }
    
	public function excluirPorRota()
	{
		$rotas = array("IdRota" => $this->IdRota);
		$this->db->where_in('IdRota', $rotas);
	    return $this->db->delete('atendimentorecipiente', $rotas);
    }

	public function buscarPorRota()
	{
		$this->db->where('IdRota', $this->IdRota);
	    return $this->db->get('atendimentorecipiente');
	}
}
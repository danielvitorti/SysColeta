<?php

class AtendimentoFormaPagamento_model extends CI_Model
{

    public $Id;
    public $IdFormaPagamento;
    public $IdAtendimento;
    public $DataCadastro;
    public $Quantidade;
    public $ValorPago;
	public $ValorPagamento;
	public $IdCliente;
	public $IdRota;
	
    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('atendimentoformapagamento', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('atendimentoformapagamento', $this);
    }

    public function excluir()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->delete('atendimentoformapagamento', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('atendimentoformapagamento');
    }

    public function buscarTodos()
    {
        return $this->db->get('atendimentoformapagamento');
    }

    public function buscarPorAtendimento()
    {
        $this->db->where('IdAtendimento', $this->IdAtendimento);
        return $this->db->get('atendimentoformapagamento');
    }

    public function buscarPorFormaPagamento()
    {
        $this->db->where('IdFormaPagamento', $this->IdFormaPagamento);
        return $this->db->get('atendimentoformapagamento');
    }
	
    public function excluirPorAtendimento()
    {
		$data = array("IdAtendimento" => $this->IdAtendimento);
      
        return $this->db->delete('atendimentoformapagamento', $data);
    }
	
	public function buscarPorAtendimentoCliente()
    {
        $this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('atendimentoformapagamento');
    }
	
	public function buscarPorRota()
	{

		$this->db->where('IdRota', $this->IdRota);
	    return $this->db->get('atendimentoformapagamento');
	}
	

	public function buscarPorAtendimentoRotaCliente()
	{
		$this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
		$this->db->where('IdRota', $this->IdRota);
		
		return $this->db->get('atendimentoformapagamento');
	}
    
	public function excluirPorAtendimentoRotaCliente()
	{
		$this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
		$this->db->where('IdRota', $this->IdRota);
		
	    return $this->db->delete('atendimentoformapagamento', $this);
    }

	public function excluirPorRota()
	{
		$rotas = array("IdRota" => $this->IdRota);
		//$this->db->where('IdRota', $rotas);
	    return $this->db->delete('atendimentoformapagamento', $rotas);
    }
    
}
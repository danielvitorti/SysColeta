<?php

class AtendimentoTipoPagamento_model extends CI_Model{

    public $Id;
    public $IdTipoPagamento;
    public $IdAtendimento;
    public $DataCadastro;
	public $IdCliente;
	public $IdRota;
	
    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('atendimentotipopagamento', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('atendimentotipopagamento', $this);
    }

    public function excluir()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->delete('atendimentotipopagamento', $this);
    }

    public function buscarPorAtendimento()
    {
        $this->db->where('IdAtendimento', $this->IdAtendimento);
        return $this->db->get('atendimentotipopagamento');
    }

    public function excluirPorAtendimento()
    {
		$data = array("IdAtendimento" => $this->IdAtendimento);
       
        return $this->db->delete('atendimentotipopagamento', $data);
    }
	
	public function buscarPorAtendimentoCliente()
	{
		$this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
		return $this->db->get('atendimentotipopagamento');
	}
	
	public function buscarPorAtendimentoRotaCliente()
	{
		$this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
		$this->db->where('IdRota', $this->IdRota);
		
		return $this->db->get('atendimentotipopagamento');
	}

	public function excluirPorAtendimentoRotaCliente()
	{
		$this->db->where('IdAtendimento', $this->IdAtendimento);
		$this->db->where('IdCliente', $this->IdCliente);
		$this->db->where('IdRota', $this->IdRota);
		
	    return $this->db->delete('atendimentotipopagamento', $this);
    }
	
	
	public function excluirPorRota()
	{
		$rotas = array($this->IdRota);
		$this->db->where_in('IdRota', $rotas);
	    return $this->db->delete('atendimentotipopagamento', $this);
    }
	
		public function buscarPorRota()
	{
		$this->db->where('IdRota', $this->IdRota);
	    return $this->db->get('atendimentotipopagamento');
	}
}
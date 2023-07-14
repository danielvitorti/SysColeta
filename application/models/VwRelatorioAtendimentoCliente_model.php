<?php

class VwRelatorioAtendimentoCliente_model extends CI_Model
{

    public $Nome;
    public $CnpjCpf;
    public $NomeResponsavel;
    public $Email;
    public $QuantidadeAtendimentos;
    public $Id;
    public $IdRota;
    public $QuantidadeColetada;
    public $Observacao;
    public $Status;
    public $DataAtendimento;
    public $IdCliente;
	public $Cidade;
	public $inicio;
	public $fim;
	public $StatusRota;
	public $DataRota;
	
    public function __construct() 
    {
        parent::__construct();
    }

	public function buscarPeriodoCidade()
	{
		
		$this->db->where("Cidade='".$this->Cidade."'");
		
		$this->db->where('DataRota >=', $this->inicio." 00:00:00 '");
		$this->db->where('DataRota <=', $this->fim." 23:59:59 '");
		
		
		return $this->db->get('vwrelatorioatendimentocliente');
	}	
}
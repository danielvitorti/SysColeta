<?php

class Atendimento_model extends CI_Model
{

    public $Id;
    public $IdRota;
    public $QuantidadeColetada;
    public $Observacao;
    public $Status;
    public $DataCadastro;
    public $IdCliente;
    public $Excluido;
    public $TipoColetado;
    

    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        $result = $this->db->insert('atendimento', $this);
        return $this->db->insert_id();
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('atendimento', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('atendimento',$data);
        
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('atendimento');
    }

    public function buscarTodos()
    {
        return $this->db->get('atendimento');
    }


    public function buscarPorRota()
    {
        $this->db->where('IdRota', $this->IdRota);		
        return $this->db->get('atendimento');
    }
	
    public function alterarStatus()
    {
        $status = array('Status' => $this->Status);
        $this->db->where('Id', $this->Id);
        return $this->db->update('atendimento', $status);
    }

    public function buscarPorCliente()
    {
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('atendimento');
    }

    public function buscarPorRotaCliente()
    {
        $this->db->where('IdRota', $this->IdRota);
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('atendimento');        
    }
	
	public function buscarPorRotaClienteDistinct()
	{
		$this->db->where('IdRota', $this->IdRota);
        $this->db->where('IdCliente', $this->IdCliente);
		$this->db->order_by('DataCadastro', 'desc');
		$this->db->limit(1);
        return $this->db->get('atendimento');        
	}

    public function buscarPorAtendimentoECliente()
    {
        $this->db->where('Id', $this->Id);
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('atendimento');        
    }
	
	public function buscarPorClientePeriodo($inicio,$fim)
	{
		
		$this->db->where('IdCliente', $this->IdCliente);		
		$this->db->where("DataCadastro between '".date('Y-m-d',strtotime($inicio))."' and '".date('Y-m-d',strtotime($fim))."'");				
		return $this->db->get('atendimento');        
	}
	
	public function buscarUltimoAtendimentoComOleo()
	{
		$this->db->select_max('DataCadastro');
		$this->db->where('IdCliente', $this->IdCliente);
		return $this->db->get('atendimento');
	}
	
	
	public function excluirPorRota()
	{
		
        $data = array("Excluido" => "1");
        $this->db->where('IdRota', $this->IdRota);
        return $this->db->update('atendimento',$data);    
	}
	
	public function excluirPorRota2()
	{
		
        $data = array("IdRota" => $this->IdRota);
        return $this->db->delete('atendimento',$data);    
	}
	
	public function buscarPorRotaAgrupadoPorCliente()
    {
        $this->db->where('IdRota', $this->IdRota);		
		$this->db->group_by(array("IdCliente"));
        return $this->db->get('atendimento');
    }
	
	public function totalLitrosColetados()
	{
		$this->db->select_sum('QuantidadeColetada','QuantidadeColetada');
        $this->db->where('Excluido', '0');
		return $this->db->get('atendimento');
	}
	
	public function buscarDadosRelatorioDestinacaoFinal($inicio,$fim)
	{
		
		/*$this->db->distinct("DATE_FORMAT(atendimento.DataCadastro,'%Y-%m-%d') DataCadastro");
		$this->db->select("(Select nome from rota where rota.Id in(atendimento.IdRota) and excluido = 0) rota, atendimento.QuantidadeColetada,DATE_FORMAT(atendimento.DataCadastro,'%Y-%m-%d') DataCadastro");
		
		$this->db->where('IdCliente', $this->IdCliente);
		$this->db->where("atendimento.DataCadastro between '".date('Y-m-d',strtotime($inicio))."' and '".date('Y-m-d',strtotime($fim))."'");
		$this->db->where('Excluido', 0);
		//$CI->db->join('user_email', 'user_email.user_id = emails.id', 'left');
		//echo $this->db->get_compiled_select('atendimento');		
		return $this->db->get('atendimento');*/
		
		
		$this->db->distinct("rota.Nome,rota.Id as IdRota");
		$this->db->select("atendimento.QuantidadeColetada,DATE_FORMAT(rota.DataRota,'%Y-%m-%d') DataCadastro,rota.Nome as rota");
		$this->db->join("rota","rota.Id = atendimento.IdRota",'left');
		$this->db->where('atendimento.IdCliente', $this->IdCliente);
		$this->db->where("rota.DataRota between '".date('Y-m-d',strtotime($inicio))."' and '".date('Y-m-d',strtotime($fim))."'");
		$this->db->where('rota.Excluido', 0);
		//$CI->db->join('user_email', 'user_email.user_id = emails.id', 'left');
		//echo $this->db->get_compiled_select('atendimento');		
		return $this->db->get('atendimento');
		
	}
	

}
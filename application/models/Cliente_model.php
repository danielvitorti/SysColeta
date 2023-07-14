<?php

class Cliente_model extends CI_Model
{

    public $Id;
    public $CnpjCpf;
    public $Email;
    public $EnderecoColeta;
    public $HorarioColeta;
    public $Instagram;
    public $Nome;
    public $NomeResponsavel;
    public $TipoDocumento;
    public $IdEtiqueta;
    public $IdStatus;
    public $Cep;
    public $Rua;
    public $Bairro;
    public $Cidade;
    public $PeriodicidadeColeta;
    public $Numero;
    public $Telefone;
    public $TelefoneFixo;
    public $Etiqueta;

    public function __construct() 
    {
        parent::__construct();
    }

    public function inserir()
    {
        $result = $this->db->insert('cliente', $this);
        return $this->db->insert_id();
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('cliente', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('cliente',$data);
        /*return $this->db->delete('cliente', $this); */
    }

    public function buscarPorId()
    {
		$this->db->where('Excluido','0'); 
        $this->db->where('Id', $this->Id);
        return $this->db->get('cliente');
    }

    public function buscarPorCnpjCpf()
    {
        $this->db->where('CnpjCpf', $this->CnpjCpf);
        return $this->db->get('cliente');
    }

    public function buscarTodos()
    {
        $this->db->where('Excluido', '0');
        $this->db->order_by("Nome", 'ASC', FALSE);
        return $this->db->get('cliente');
    }

    public function buscar()
    {
		$this->db->where('Excluido','0');  
        $this->db->like('Nome', $this->Nome);
        $this->db->or_like('CnpjCpf', $this->CnpjCpf);
        $this->db->or_like('NomeResponsavel', $this->NomeResponsavel);      
        return $this->db->get('cliente');
    }

    public function countAll()
    {
        return $this->db->where('Excluido','0')->from('cliente')->count_all_results();
    }
	
	public function buscarPorNome()
	{
		$this->db->where('Excluido','0');  
        $this->db->like('Nome', $this->Nome);
		return $this->db->get('cliente');
	}
	
	public function buscarPorParametros()
	{
		$this->db->where('Excluido','0');
		
		if($this->Nome != "")
		{
			$this->db->like('Nome', $this->Nome);
		}
		if($this->IdStatus != "")
		{
			$this->db->where('IdStatus', $this->IdStatus);
		}
		if($this->Etiqueta != "")
		{
			$this->db->join('etiquetacliente','etiquetacliente.IdCliente = cliente.Id','INNER');
            $this->db->where('etiquetacliente.IdEtiqueta',$this->Etiqueta);   
		}
		
		return $this->db->get('cliente');
		
	}
   
}
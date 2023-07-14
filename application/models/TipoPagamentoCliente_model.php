<?php

class TipoPagamentoCliente_model extends CI_Model
{

    public $Id;
    public $IdTipoPagamento;
    public $IdCliente;
    public $DataCadastro;
    public $Excluido;
    public $Quantidade;
    public $Descricao;

    public function __construct() 
    {
        parent::__construct();
    }

    public function inserir()
    {
        $result = $this->db->insert('tipopagamentocliente', $this);
        return $this->db->insert_id();
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('tipopagamentocliente', $this);
    }

    public function excluir()
    {
        //$data = array("Excluido" => "1");
		$array = array('Id' => $this->Id);
        //$this->db->where('Id', $array);
        //return $this->db->update('tipopagamentocliente',$data);
        return $this->db->delete('tipopagamentocliente', $array);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('tipopagamentocliente');
    }

    public function buscarPorCliente()
    {   
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('tipopagamentocliente');
    }


    public function excluirPorCliente()
    {
        $array = array('IdCliente' => $this->IdCliente);
        return $this->db->delete('tipopagamentocliente', $array);
    }

   
}
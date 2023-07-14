<?php

class FormaPagamentocliente_model extends CI_Model
{

    public $Id;
    public $IdFormaPagamento;
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
        $result = $this->db->insert('formapagamentocliente', $this);
        return $this->db->insert_id();
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('formapagamentocliente', $this);
    }

    public function excluir()
    {
        //$data = array("Excluido" => "1");
      
		$array = array('Id' => $this->Id);
        //return $this->db->update('formapagamentocliente',$data);
        return $this->db->delete('formapagamentocliente', $array);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('formapagamentocliente');
    }

    public function buscarPorCliente()
    {   
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('formapagamentocliente');
    }


    public function excluirPorCliente()
    {
        $array = array('IdCliente' => $this->IdCliente);
        return $this->db->delete('formapagamentocliente', $array);
    }

   
}
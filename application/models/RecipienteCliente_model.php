<?php

class RecipienteCliente_model extends CI_Model
{

    public $Id;
    public $IdRecipiente;
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
        $result = $this->db->insert('recipientecliente', $this);
        return $this->db->insert_id();
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('recipientecliente', $this);
    }

    public function excluir()
    {
        //$data = array("Excluido" => "1");
		$array = array('Id' => $this->Id);
        //$this->db->where('Id', $array);
        //return $this->db->update('recipientecliente',$data);
        return $this->db->delete('recipientecliente', $array);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('recipientecliente');
    }

    public function buscarPorCliente()
    {
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('recipientecliente');
    }


    public function excluirPorCliente()
    {
        $array = array('IdCliente' => $this->IdCliente);
        return $this->db->delete('recipientecliente', $array);
    }

   
}
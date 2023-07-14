<?php

class Documento_model extends CI_Model
{


    public $Id;
    public $Titulo;
    public $Texto;
    public $IdCliente;
    public $DataCadastro;
    public $Arquivo;
    public $DataValidade;
   

    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('documento', $this);
    }

    public function alterar()
    {      
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->update('documento', $this);
    }

    public function excluir()
    {
        $data = array("Excluido" => "1");
        $this->db->where('Id', $this->Id);
        return $this->db->update('documento',$data);
    }

    public function buscarPorId()
    {
        $this->db->where('Excluido', '0');
        $this->db->where('Id', $this->Id);
        return $this->db->get('documento');
    }

    public function buscarTodas()
    {
        $this->db->where('Excluido', '0');
        return $this->db->get('documento');
    }

}
<?php

class RotaCliente_model extends CI_Model
{

    public $Id;
    public $IdCliente;
    public $IdRota;
    public $DataCadastro;
    public $ordem;


    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('rotacliente', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('rotacliente', $this);
    }

    public function excluir()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->delete('rotacliente', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('rotacliente');
    }

    public function buscarTodas()
    {
        return $this->db->get('rotacliente');
    }
    
    public function buscarPorRota()
    {
        $this->db->where('IdRota', $this->IdRota);
        return $this->db->get('rotacliente');
    }

    public function buscarPorCliente()
    {
        $this->db->where('IdCliente', $this->IdRota);
        $this->db->order_by("ordem", 'ASC', FALSE);
        return $this->db->get('rotacliente');
    }

    public function excluirPorRota()
    {
        $this->db->where('IdRota', $this->IdRota);
        return $this->db->delete('rotacliente', $this);
    }

    public function excluirPorRotaCliente()
    { 
        $array = array('IdRota' => $this->IdRota, 'IdCliente' => $this->IdCliente);
        return $this->db->delete('rotacliente', $array);
    }
    
    public function buscarPorRotaECliente()
    {
        $this->db->where('IdRota', $this->IdRota);
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('rotacliente');
        
    }

    public function ultimaRotaPorCliente()
    {
        $this->db->select_max('IdRota');
        $this->db->where('IdCliente', $this->IdCliente);
        return $this->db->get('rotacliente');
    }

    


}
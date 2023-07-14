<?php

class RotaTurno_model extends CI_Model
{

    public $Id;
    public $IdTurno;
    public $DataCadastro;


    public function __construct() 
    {
        parent::__construct();
    }


    public function inserir()
    {
        return $this->db->insert('rotaturno', $this);
    }

    public function alterar()
    {      
        $this->db->where('Id', $this->Id);
        return $this->db->update('rotaturno', $this);
    }

    public function excluir()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->delete('rotaturno', $this);
    }

    public function buscarPorId()
    {
        $this->db->where('Id', $this->Id);
        return $this->db->get('rotaturno');
    }

    public function buscarTodas()
    {
        return $this->db->get('rotaturno');
    }
    
    public function buscarPorRota()
    {
        $this->db->where('IdRota', $this->IdRota);
        return $this->db->get('rotaturno');
    }

    public function buscarPorTurno()
    {
        $this->db->where('IdTurno', $this->IdRota);
        return $this->db->get('rotaturno');
    }

    public function excluirPorRota()
    {
        $this->db->where('IdRota', $this->IdRota);
        return $this->db->delete('rotaturno', $this);
    }


}
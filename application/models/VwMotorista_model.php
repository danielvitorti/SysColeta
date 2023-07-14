<?php

class VwMotorista_model extends CI_Model
{

    public $Id;
    public $Nome;
    public $Habilitacao;
    public $Telefone;
    public $Observacao;
    public $Veiculo;


    public function __construct() 
    {
        parent::__construct();
    }

    public function buscar()
    {
        $this->db->like('Nome', $this->Nome);
        $this->db->like('Veiculo', $this->Veiculo);
        $this->db->like('Observacao', $this->Observacao);
        return $this->db->get('vwmotorista');
    }

    

}
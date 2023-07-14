<?php

class VwRotaMotorista_model extends CI_Model
{

    public $Id;
    public $IdMotorista;
    public $DataRota;
    public $Turno;
    public $Perimetro;
    public $DataCadastro;
    public $Observacao;
    public $Motorista;
    public $QuantidadeClientes;
    public $QuantidadeAtendimentos;


    public function buscarPorId()
    {
        $this->db->where('Id',$this->Id);
        return $this->db->get('vwrotamotorista');
    }

}


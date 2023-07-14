<?php

class VwRotaClienteMotorista2_model extends CI_Model
{

    public $Id;
    public $IdMotorista;
    public $DataRota;
    public $Turno;
    public $Perimetro;
    public $DataCadastro;
    public $Observacao;
    public $Motorista;
    public $Cliente;
    public $CnpjCpf;
    public $NomeResponsavel;
    public $Email;
    public $EnderecoColeta;
    public $HorarioColeta;
    public $Instagram;
    public $IdRota;
    public $IdCliente;
    public $IdAtendimento;

    public function buscarPorRota()
    {
        $this->db->where('IdRota',$this->IdRota);
        return $this->db->get('vwrotaclientemotorista2');
    }

}